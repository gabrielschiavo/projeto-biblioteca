<?php
namespace App\Http\Controllers;

use App\Models\Pessoa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class PessoaController extends Controller
{
    public function listaPessoas(Request $request)
    {
        $listaPessoas = Pessoa::all();

        $mensagem = $request->session()->get('mensagem');
        $request->session()->remove('mensagem');

        return view('lista-pessoas', [
            'listaPessoas' => $listaPessoas,
            'mensagem' => $mensagem
        ]);
    }

    public function cadastroPessoas()
    {
        return view('cadastro-pessoas');
    }

    public function excluir(Request $request)
    {
        $pessoas = Pessoa::find($request->id);
        $pessoas->delete();

        $request->session()->put('mensagem', "Pessoa {$pessoas->id} excluida!");

        return redirect('/lista-pessoas');
    }

    public function salvarPessoas(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'codigo' => 'required|min:1|max:20',
            'nome' => 'required|min:1|max:100',
            'endereco' => 'required|min:1|max:250',
            'telefone' => 'required|min:1|max:15',
            'email' => 'required|min:1|max:100',
        ], [
            'required' => 'O campo :attribute é obrigatório',
            'min' => 'O campo :attribute precisa ter no mínimo :min caracteres',
            'max' => 'O campo :attribute precisa ter no máximo :max caracteres'
        ]);
 
        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);
        }

        if ($request->id != null) {
            $pessoas = Pessoa::find($request->id);
            $pessoas->codigo = $request->codigo;
            $pessoas->nome = $request->nome;
            $pessoas->endereco = $request->endereco;
            $pessoas->telefone = $request->telefone;
            $pessoas->email = $request->email;
            $pessoas->save();

            $request->session()->put('mensagem', "Pessoa {$pessoas->id} atualizada!");
        } else {
            $pessoas = Pessoa::create([
                'codigo' => $request->codigo,
                'nome' => $request->nome,
                'endereco' => $request->endereco,
                'telefone' => $request->telefone,
                'email' => $request->email,
            ]);

            $request->session()->put('mensagem', "Pessoa {$pessoas->id} criada!");
        }

        return redirect('/lista-pessoas');
    }
}
