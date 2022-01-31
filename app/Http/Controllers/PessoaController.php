<?php

namespace App\Http\Controllers;

use App\Pessoa;

class PessoaController extends BaseController
{
   public function __construct()
   {
        $this->classe = Pessoa::class;
        $this->view = 'pessoas';
   }
}
