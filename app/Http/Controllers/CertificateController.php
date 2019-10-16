<?php

namespace App\Http\Controllers;

use App\Certificate;
use App\Services\Certificaties\CertificateService;
use Illuminate\Http\Request;

class CertificateController extends ParentController
{
    public function __construct(Certificate $certificate, CertificateService $certificateService)
    {
        $this->model = $certificate;
        $this->service = $certificateService;
    }

    public function index()
    {
        return view('pages.certificates.index');
    }

    public function all()
    {

        return parent::all();
    }

    public function store(Request $request)
    {
        return parent::store($request);
    }

    public function getById(Request $request)
    {
        $skill = $this->service->getById($request->id);
        if ($skill instanceof $this->model) {
            return success($skill);
        } else {
            return error_notFound($skill);
        }
    }

    public function destroy(Request $request)
    {
        return parent::delete($request);
    }
}
