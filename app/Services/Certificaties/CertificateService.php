<?php

namespace App\Services\Certificaties;

use App\Certificate;
use App\Services\BaseService;

class CertificateService extends BaseService
{
    public function __construct(Certificate $certificate)
    {
        $this->model = $certificate;
    }
}
