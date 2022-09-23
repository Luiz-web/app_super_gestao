<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MotivoContato;
use App\SiteContato;

class ContatoController extends Controller
{
    public function contato(Request $request) {

        $motivo_contatos = MotivoContato::all();
        
        return view('site.contato', ['titulo' => 'Contato (teste)', 'motivo_contatos' => $motivo_contatos]);
    }
    
    public function salvar(request $request) {
        //realizar a validação de dados antes de persistir no banco de dadosS
        $regras = [
            'nome' => 'required|min:3|max:40|unique:site_contatos',
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:2000',
        ];
    
        $feedback = [
            'nome.min' => 'O nome precisa ter no mínimo 3 caracteres',
            'nome.max' => 'O nome precisa ter no máximo 40 caracteres',
            'nome.unique' => 'Este nome já está cadastrado no banco de dados. Favor inserir outro nome',
            'required' => 'Preencha este campo para proseguir',
            'email.email' => 'O email digitado não é válido',
            'mensagem.max' => 'A mensagem deve conter no máximo 2000 caracteres',
        ];
        
        
        $request->validate($regras, $feedback);
        SiteContato::create($request->all());
        return redirect()->route('site.index');
    }
}
