<?php
namespace App\Http\Controllers;

use App\Models\Genero;
use App\Models\Livros;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class LivrosController extends Controller
{
    public function listaLivros(Request $request)
    {
        $listaLivros = Livros::all();

        $mensagem = $request->session()->get('mensagem');
       
        $request->session()->remove('mensagem');

        return view('lista-livros', [
            'listaLivros' => $listaLivros,
            'mensagem' => $mensagem
        ]);
    }

    public function cadastroLivros()
    {
        $listaGenero = Genero::all();
        return view('cadastro-livros', [
            'listaGenero' => $listaGenero
        ]);
    }

    public function excluir(Request $request)
    {
        $livros = Livros::find($request->id);
        $livros->delete();

        $request->session()->put('mensagem', "Livro {$livros->id} excluido!");

        return redirect('/lista-livros');
    }

    public function salvarLivros(Request $request)
    {
        // Validação dos campos
        $validator = Validator::make($request->all(), [
            'codigoGenero' => 'required|min:1|max:20',
            'codigoLivro' => 'required|min:1|max:20',
            'titulo' => 'required|min:1|max:250',
            'descricao' => 'required|min:1|max:250',
            'imgCapa' => 'required'
        ], [
            'required' => 'O campo :attribute é obrigatório',
            'min' => 'O campo :attribute precisa ter no mínimo :min caracteres',
            'max' => 'O campo :attribute precisa ter no máximo :max caracteres'
        ]);
 
        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);
        }

        // Upload da Imagem
        if($request->hasFile('imgCapa')){
            // Obtém o nome de arquivo com a extensão
            $nomeArquivoComExt = $request->file('imgCapa')->getClientOriginalName();

            // Obtém apenas o nome do arquivo
            $nomeArquivo = pathinfo($nomeArquivoComExt, PATHINFO_FILENAME);

            // Obtém apenas a extenção
            $extensao = $request->file('imgCapa')->getClientOriginalExtension();

            // Nome do arquivo para armazenar
            $imgCapa= $nomeArquivo.'_'.time().'.'.$extensao;

            // Upload da Imagem
            $path = $request->file('imgCapa')->storeAs('public/imgCapa', $imgCapa);
        } else {
            $imgCapa = 'semImage.png';
        }
        
        
        if ($request->id != null) {
            $livros = Livros::find($request->id);
            $livros->codigoGenero = $request->codigoGenero;
            $livros->codigoLivro = $request->codigoLivro;
            $livros->titulo = $request->titulo;
            $livros->descricao = $request->descricao;
            $livros->imgCapa = $request->imgCapa;
            
            $livros->save();

            $request->session()->put('mensagem', "Livro {$livros->id} atualizado!");
            
        } else {
            $livros = Livros::create([
                'codigoGenero' => $request->codigoGenero,
                'codigoLivro' => $request->codigoLivro,
                'titulo' => $request->titulo,
                'descricao' => $request->descricao,
                'imgCapa' =>$imgCapa,
            ]);

            $request->session()->put('mensagem', "Livro {$livros->id} criado!");
        }

        return redirect('/lista-livros');
    }
}
