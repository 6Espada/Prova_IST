<?php

namespace App\Http\Controllers\api;

use App\Tabeliao;

class TabeliaoController extends BaseController
{
    public function __construct()
    {
        $this->classe = Tabeliao::class;
    }
}
