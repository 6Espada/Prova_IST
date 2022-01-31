<?php

namespace App\Http\Controllers\api;

use App\Certidao;

class CertidaoController extends BaseController
{
    public function __construct()
    {
        $this->classe = Certidao::class;
    }
}
