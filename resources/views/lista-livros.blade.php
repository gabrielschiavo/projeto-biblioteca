@extends('layout')

@section('titulo')
    <a class="navbar-brand" href="/lista-livros"><strong>Lista Livros</strong></a>
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
                <th scope="col">Código Gênero</th>
                <th scope="col">Código Livro</th>
                <th scope="col">Título</th>
                <th scope="col">Descrição</th>
                <th class="text-center" scope="col">Capa</th>
                <th class="text-end" scope="col">Excluir</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($listaLivros as $livros)
                <tr class="align-middle">
                    <td>{{ $livros->id }}</td>
                    <td>{{ $livros->codigoGenero }}</td>
                    <td>{{ $livros->codigoLivro }}</td>
                    <td>{{ $livros->titulo }}</td>
                    <td>{{ $livros->descricao }}</td>
                    <td style="width: 100px; height: 100px;"><img src="/storage/imgCapa/{{ $livros->imgCapa }}" alt=""></td>
                    <td>
                        <form action="/lista-livros/{{$livros->id}}/excluir" method="POST" onsubmit="return confirm('Deseja excluir?')" class="d-grid gap-2 d-md-flex justify-content-md-end">
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
