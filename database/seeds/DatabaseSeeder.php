<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call([
             UsersTableSeeder::class,
             SocialTableSeeder::class,
             ExperiencesTableSeeder::class,
             CertificateTableSeeder::class,
             SkillTableSeeder::class,
             InterestTableSeeder::class,
             EducationTableSeeder::class
         ]);
    }
}
