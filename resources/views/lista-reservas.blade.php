@extends('layout')

@section('titulo')
    <a class="navbar-brand" href="/lista-pessoas"><strong>Lista Reservas</strong></a>
@endsection

@section('conteudo')  
    @if(!empty($mensagem))
        <div class="alert alert-success" >
            {{$mensagem}}
        </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Código</th>
                <th scope="col">Data da Retirada</th>
                <th scope="col">Data da Devolução</th>
                <th scope="col">Pessoa</th>
                <th scope="col">Livro</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($listaReservas as $reserva)
                <tr class="align-middle">
                    <td>{{ $reserva->id }}</td>
                    <td>{{ $reserva->codigo }}</td>
                    <td>{{ $reserva->dataRetirada }}</td>
                    <td>{{ $reserva->dataDevolucao }}</td>
                    <td>{{ $reserva->pessoa }}</td>
                    <td>{{ $reserva->livro }}</td>
                    <td  class="d-grid gap-2 d-md-flex justify-content-md-end">

                        <form action="/lista-reservas/{{$reserva->id}}/excluir" method="POST" onsubmit="return confirm('Deseja excluir?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                        
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
