<?php

namespace App\Http\Controllers;

use App\Movimentacao;
use App\Pessoa;
use App\Conta;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MovimentacaoController extends BaseController
{
    public function __construct()
    {
        $this->classe = Movimentacao::class;
        $this->view = 'movimentacoes';
    }

    public function adicionar()
    {
        $pessoas = Pessoa::all();
        return view("$this->view.adicionar", compact('pessoas'));
    }

    public function salvar(Request $req)
    {
        $idPessoa = $req->num_pessoa;
        $idConta = $req->num_conta;

        if ($req->tp_transacao == 0) {
            $contaAtualizada = Conta::find($idConta);
            $contaAtualizada->vl_saldo = $contaAtualizada->vl_saldo + $req->vl_transacao;
            $contaAtualizada->conta_iniciada = 1;
            $contaAtualizada->save();

            $transacao = new Movimentacao();
            $transacao->vl_movimentacao = $req->vl_transacao;
            $transacao->id_conta = $idConta;

            $transacao->save();
        } else {
            $contaAtualizada = Conta::find($idConta);
            $contaAtualizada->vl_saldo = $contaAtualizada->vl_saldo - $req->vl_transacao;
            $contaAtualizada->conta_iniciada = 1;
            $contaAtualizada->save();

            $transacao = new Movimentacao();
            $transacao->vl_movimentacao = $req->vl_transacao * -1;
            $transacao->id_conta = $idConta;

            $transacao->save();
        }

        $pessoas = Pessoa::all();
        $pessoas = $this->parseObj($pessoas);

        $contas = Conta::where('id_pessoa', '=', $idPessoa)
            ->select('*')
            ->get();

        if (!empty($contas)) {
            for ($i = 0; $i < count($contas); $i++) {
                $contas[$i]->num_conta_saldo = $contas[$i]->id . ' - R$: ' . number_format($contas[$i]->vl_saldo, 2, ',', '.');
            }
        }

        $movimentacoes = Movimentacao::where('id_conta', '=', $idConta)
            ->select('*')
            ->get();

        for ($i = 0; $i < count($movimentacoes); $i++) {
            $movimentacoes[$i]->vl_movimentacao = number_format($movimentacoes[$i]->vl_movimentacao, 2, ',', '.');
        }

        return view("$this->view.index", compact('contas', 'pessoas', 'movimentacoes', 'idPessoa', 'idConta'));
    }

    public function listar(Request $req)
    {
        $pessoas = Pessoa::all();
        $pessoas = $this->parseObj($pessoas);

        $movimentacoes = [];
        $idPessoa = 0;
        $idConta = 0;

        $contas = Conta::all();
        if (!empty($contas)) {
            for ($i = 0; $i < count($contas); $i++) {
                $pessoa = Pessoa::find($contas[$i]->id_pessoa);
                $pessoa->cpf = $this->mask($pessoa->cpf, '###.###.###-##');
                $contas[$i]->nm_pessoa = $pessoa->nm_pessoa;
                $contas[$i]->cpf = $pessoa->cpf;
            }
        }

        $mensagem = $req->session()->get('mensagem');
        return view("$this->view.index", compact('contas', 'pessoas', 'movimentacoes', 'mensagem', 'idPessoa', 'idConta'));
    }

    public function listarContas(Request $req, $idPessoa, $idConta)
    {
        $pessoas = Pessoa::all();
        $pessoas = $this->parseObj($pessoas);

        $movimentacoes = [];

        $contas = Conta::where('id_pessoa', '=', $idPessoa)
            ->select('*')
            ->get();

        if (!empty($contas)) {
            for ($i = 0; $i < count($contas); $i++) {
                $contas[$i]->num_conta_saldo = $contas[$i]->id . ' - R$: ' . number_format($contas[$i]->vl_saldo, 2, ',', '.');
            }

            $movimentacoes = Movimentacao::where('id_conta', '=', $idConta)
                ->select('*')
                ->get();
            
                for ($i = 0; $i < count($movimentacoes); $i++) {
                    $movimentacoes[$i]->vl_movimentacao = number_format($movimentacoes[$i]->vl_movimentacao, 2, ',', '.');
                }
        }

        $mensagem = $req->session()->get('mensagem');
        return view("$this->view.index", compact('contas', 'pessoas', 'movimentacoes', 'mensagem', 'idPessoa', 'idConta'));
    }
}
