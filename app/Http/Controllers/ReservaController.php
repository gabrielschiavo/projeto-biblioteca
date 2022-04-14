<?php
namespace App\Http\Controllers;

use App\Models\Reserva;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ReservaController extends Controller
{
    public function listaReservas(Request $request)
    {
        $listaReservas = Reserva::all();

        $mensagem = $request->session()->get('mensagem');
        $request->session()->remove('mensagem');

        return view('lista-reservas', [
            'listaReservas' => $listaReservas,
            'mensagem' => $mensagem
        ]);
    }

    public function cadastroReservas()
    {
        return view('cadastro-reservas');
    }

    public function excluir(Request $request)
    {
        $reservas = Reserva::find($request->id);
        $reservas->delete();

        $request->session()->put('mensagem', "Reserva {$reservas->id} excluida!");

        return redirect('/lista-reservas');
    }

    public function salvarReservas(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'codigo' => 'required|min:1|max:20',
            'dataRetirada' => 'required|min:1|max:100',
            'dataDevolucao' => 'required|min:1|max:250',
            'pessoa' => 'required|min:1|max:15',
            'livro' => 'required|min:1|max:100',
        ], [
            'required' => 'O campo :attribute é obrigatório',
            'min' => 'O campo :attribute precisa ter no mínimo :min caracteres',
            'max' => 'O campo :attribute precisa ter no máximo :max caracteres'
        ]);
 
        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);
        }

        if ($request->id != null) {
            $reserva = Reserva::find($request->id);
            $reserva->codigo = $request->codigo;
            $reserva->dataRetirada = $request->dataRetirada;
            $reserva->dataDevolucao = $request->dataDevolucao;
            $reserva->codigo = $request->codigo;
            $reserva->codigo = $request->codigo;
            $reserva->save();

            $request->session()->put('mensagem', "Reserva {$reserva->id} atualizada!");
        } else {
            $reserva = Reserva::create([
                'codigo' => $request->codigo,
                'dataRetirada' => $request->dataRetirada,
                'dataDevolucao' => $request->dataDevolucao,
                'pessoa' => $request->pessoa,
                'livro' => $request->livro,
            ]);

            $request->session()->put('mensagem', "Reserva {$reserva->id} criada!");
        }

        return redirect('/lista-reservas');
    }
}
