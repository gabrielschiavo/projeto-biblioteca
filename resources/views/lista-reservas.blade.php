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
                <th scope="col">Status</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($listaReservas as $reserva)
                <tr class="align-middle">
                    <td>{{ $reserva->id }}</td>
                    <td>{{ $reserva->codigo }}</td>
                    <td>{{ \Carbon\Carbon::parse($reserva->dataRetirada)->format('d/m/Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($reserva->dataDevolucao)->format('d/m/Y') }}</td>
                    <td>{{ $reserva->pessoa }}</td>
                    <td>{{ $reserva->livro }}</td>
                    <td><strong>{{ $reserva->status }}</strong></td>
                    <td  class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{url("/lista-reservas/{$reserva->id}/editar")}}" class="btn btn-primary" title="Editar">
                            <i class="bi bi-pencil-square"></i>
                        </a>

                        <form action="/lista-reservas/{{$reserva->id}}/excluir" method="POST" onsubmit="return confirm('Deseja excluir?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" title="Excluir">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                        
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
