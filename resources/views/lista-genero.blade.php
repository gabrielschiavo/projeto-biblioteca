@extends('layout')

@section('titulo')
    <a class="navbar-brand" href="/lista-genero"><strong>Lista Gêneros</strong></a>
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
                <th scope="col"></th>
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
