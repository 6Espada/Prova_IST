<?php

namespace App\Http\Controllers\api;

use App\Contrato;

class ContratoController extends BaseController
{
    public function __construct()
    {
        $this->classe = Contrato::class;
    }
}
