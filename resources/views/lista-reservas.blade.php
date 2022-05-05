@extends('layout')

@section('tituloGuia')
    Lista Retiradas/Devoluçaões
@endsection

@section('titulo')
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 pt-3 pb-3" href="/lista-pessoas">Lista Retiradas/Devoluçaões</a>
@endsection

@section('liListReservas')
    active
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
                <th class="text-end" scope="col">Editar/Excluir</th>
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
                        {{-- <a href="{{url("/lista-reservas/{$reserva->id}/editar")}}" class="btn btn-primary" title="Editar">
                            <i class="bi bi-pencil-square"></i>
                        </a> --}}

                        <form action="/lista-reservas/{{$reserva->id}}/excluir" method="POST" onsubmit="return confirm('Deseja excluir?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-secondary d-md-flex justify-content-md-end" type="button" data-bs-toggle="dropdown" aria-expanded="false" tabindex="0" title="Editar/Excluir">
                                <img src="/img/icons/icon_menu.svg" alt="" srcset="">
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li class="liEditar"><a href="{{url("/lista-reservas/{$reserva->id}/editar")}}" tabindex="0" class="editar align-middle" tabindex="0"  title="Editar"><img src="/img/icons/icon_editar.svg" alt="" class="me-2">Editar</a></li>
                                <li><button type="submit" tabindex="0" class="excluir" tabindex="0"  title="Excluir"><img src="/img/icons/icon_excluir.svg" alt="" class="me-2">Excluir</button></li>
                            </ul>
                        </form>
                        
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
