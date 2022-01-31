<?php

namespace App\Http\Controllers;

use App\Conta;
use App\Pessoa;
use Illuminate\Http\Request;


class ContaController extends BaseController
{
    public function __construct()
    {
        $this->classe = Conta::class;
        $this->view = 'contas';
    }

    public function salvar(Request $req)
    {
        $contaCriada = $this->classe::find($req->num_conta);

        $pessoas = Pessoa::all();
        $pessoas = $this->parseObj($pessoas);

        if (empty($contaCriada)) {

            $novaConta = new Conta();
            $novaConta->id = $req->num_conta;
            $novaConta->vl_saldo = 0.00;
            $novaConta->id_pessoa = $req->nm_pessoa_cpf;
            $novaConta->conta_iniciada = 0;
            $novaConta->save();
        }

        $contas = $this->classe::all();
        if (!empty($contas)) {
            for ($i = 0; $i < count($contas); $i++) {
                $pessoa = Pessoa::find($contas[$i]->id_pessoa);
                $pessoa->cpf = $this->mask($pessoa->cpf, '###.###.###-##');
                $contas[$i]->nm_pessoa = $pessoa->nm_pessoa;
                $contas[$i]->cpf = $pessoa->cpf;
            }
        }

        $mensagem = $req->session()
        ->flash(
            'mensagem',
            "Adicionado com sucesso"
        );
        
        return view("$this->view.index", compact('contas', 'pessoas', 'mensagem'));
    }

    public function listar(Request $req)
    {
        $pessoas = Pessoa::all();
        $pessoas = $this->parseObj($pessoas);

        $contas = $this->classe::all();
        if (!empty($contas)) {
            for ($i = 0; $i < count($contas); $i++) {
                $pessoa = Pessoa::find($contas[$i]->id_pessoa);
                $pessoa->cpf = $this->mask($pessoa->cpf, '###.###.###-##');
                $contas[$i]->nm_pessoa = $pessoa->nm_pessoa;
                $contas[$i]->cpf = $pessoa->cpf;
            }
        }

        $mensagem = $req->session()->get('mensagem');
        return view("$this->view.index", compact('contas', 'pessoas', 'mensagem'));
    }

    public function editar($id)
    {
        $pessoas = Pessoa::all();
        $pessoas = $this->parseObj($pessoas);

        $contas = $this->classe::all();
        if (!empty($contas)) {
            for ($i = 0; $i < count($contas); $i++) {
                $pessoa = Pessoa::find($contas[$i]->id_pessoa);
                $pessoa->cpf = $this->mask($pessoa->cpf, '###.###.###-##');
                $contas[$i]->nm_pessoa = $pessoa->nm_pessoa;
                $contas[$i]->cpf = $pessoa->cpf;
            }
        }
        
        $item = $this->classe::find($id);
        $pessoas = Pessoa::all();
        return view("$this->view.editar", compact('contas', 'pessoas'));
    }
}
