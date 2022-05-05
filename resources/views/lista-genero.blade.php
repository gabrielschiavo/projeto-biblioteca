@extends('layout')

@section('tituloGuia')
    Lista Gêneros
@endsection

@section('titulo')
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 pt-3 pb-3" href="/lista-genero">Lista Gêneros</a>
@endsection

@section('liListGenero')
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
                <th scope="col">Descrição</th>
                <th class="text-end" scope="col">Excluir</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($listaGenero as $genero)
                <tr class="align-middle">
                    <td>{{ $genero->id }}</td>
                    <td>{{ $genero->codigo }}</td>
                    <td>{{ $genero->descricao }}</td>
                    <td  class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <form action="/lista-genero/{{$genero->id}}/excluir" method="POST" onsubmit="return confirm('Deseja excluir?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-secondary d-md-flex justify-content-md-end" type="button" data-bs-toggle="dropdown" aria-expanded="false" tabindex="0" title="Editar/Excluir">
                                <img src="/img/icons/icon_menu.svg" alt="" srcset="">
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                {{-- <li><a href="{{url("/lista-reservas/{$reserva->id}/editar")}}" tabindex="0" class="editar" tabindex="0"  title="Editar"><img src="/img/icons/icon_editar.svg" alt="" class="me-2">Editar</a></li> --}}
                                <li><button type="submit" tabindex="0" class="excluir" tabindex="0"  title="Excluir"><img src="/img/icons/icon_excluir.svg" alt="" class="me-2">Excluir</button></li>
                            </ul>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
