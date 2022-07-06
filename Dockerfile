FROM php:7.2-fpm
ENV WEBROOT=resume
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

RUN apt-get update && apt-get install -y curl && apt-get install -y libpq-dev
RUN curl -sL https://deb.nodesource.com/setup_16.x | bash -
RUN apt-get update && apt-get install -y nodejs  \
    && apt-get install -y vim  \
    && docker-php-ext-install pdo  \
    && docker-php-ext-install pdo_pgsql \
    && docker-php-ext-install pgsql

# Set working directory
WORKDIR /var/www/html/${WEBROOT}

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Add user for laravel application
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

# adding node and npm and use nvm
ENV NODE_VERSION=6.9.1
RUN curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.39.0/install.sh | bash
ENV NVM_DIR=/root/.nvm
RUN . "$NVM_DIR/nvm.sh" && nvm install ${NODE_VERSION}
RUN . "$NVM_DIR/nvm.sh" && nvm use v${NODE_VERSION}
RUN . "$NVM_DIR/nvm.sh" && nvm alias default v${NODE_VERSION}
ENV PATH="/root/.nvm/versions/node/v${NODE_VERSION}/bin/:${PATH}"
RUN node --version
RUN npm --version

# Copy existing application directory contents
COPY . .
RUN npm cache clean
RUN composer install
RUN php artisan key:generate
#RUN php artisan optimize
RUN php artisan config:clear
RUN php artisan route:clear
RUN php artisan optimize

#Open Permission derictory
RUN chown -R www:www \
        /var/www/html/${WEBROOT} \
        /var/www/html/${WEBROOT}/storage \
        /var/www/html/${WEBROOT}/storage/logs \
        /var/www/html/${WEBROOT}/vendor \
        /var/www/html/${WEBROOT}/bootstrap/cache
RUN chmod -R 777 \
        /var/www/html/${WEBROOT}/ \
        /var/www/html/${WEBROOT}/storage \
        /var/www/html/${WEBROOT}/storage/logs \
        /var/www/html/${WEBROOT}/vendor \
        /var/www/html/${WEBROOT}/bootstrap/cache
RUN composer dumpautoload
RUN php artisan config:cache
RUN php artisan cache:clear
RUN php artisan view:clear
RUN php artisan route:clear
RUN php artisan optimize:clear
#RUN php artisan migrate
RUN npm install --prefix public
#RUN php artisan db:seed
# Change current user to www
USER www

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]
