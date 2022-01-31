<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

abstract class BaseController extends Controller
{
    protected $classe;
    protected $view;

    public function index(Request $req)
    {
        $pessoas = $this->classe::all();
        $pessoas = $this->parseObj($pessoas);
        $mensagem = $req->session()->get('mensagem');
        return view("$this->view.index", compact('pessoas', 'mensagem'));
    }

    public function adicionar()
    {
        return view("$this->view.adicionar");
    }

    public function salvar(Request $req)
    {
        $item = $req->all();

        $this->classe::create($item);

        $req->session()
            ->flash(
                'mensagem',
                "Adicionado com sucesso"
            );

        return redirect()->route("$this->view");
    }

    public function editar($id)
    {
        $pessoas = $this->classe::all();
        $pessoas = $this->parseObj($pessoas);
        $item = $this->classe::find($id);

        return view("$this->view.editar", compact('item', 'pessoas'));
    }

    public function atualizar(Request $req, $id)
    {
        $item = $req->all();

        $itemSelecionado = $this->classe::find($id);
        $itemSelecionado->update($item);

        $req->session()
            ->flash(
                'mensagem',
                "Atualizado com sucesso"
            );

        return redirect()->route("$this->view");
    }

    public function deletar(Request $req, $id)
    {
        $item = $this->classe::find($id);

        if (!(empty($item))) {
            $item->delete();

            $req->session()
                ->flash(
                    'mensagem',
                    "Removido com sucesso"
                );

            return redirect()->route("$this->view");
        }

        return redirect()->route("$this->view");
    }

    protected function mask($val, $mask)
    {
        $maskared = '';
        $k = 0;
        for ($i = 0; $i <= strlen($mask) - 1; ++$i) {
            if ($mask[$i] == '#') {
                if (isset($val[$k])) {
                    $maskared .= $val[$k++];
                }
            } else {
                if (isset($mask[$i])) {
                    $maskared .= $mask[$i];
                }
            }
        }

        return $maskared;
    }

    protected function parseObj(Object $obj)
    {
        for ($i = 0; $i < count($obj); $i++) {
            $obj[$i]->cpf = $this->mask($obj[$i]->cpf, '###.###.###-##');
            $obj[$i]->nome_cpf = $obj[$i]->nm_pessoa . " - " . $obj[$i]->cpf;
        }

        return $obj;
    }
}
