@extends('layout')

@section('tituloGuia')
    Cadastro de Livros
@endsection

@section('titulo')
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 pt-3 pb-3" href="/lista-livros/cadastro-livros">Cadastro de Livros</a>
@endsection

@section('liCadLivros')
    active
@endsection

@section('conteudo')
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/lista-livros/cadastro-livros" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="id" value="{{isset($livros)}}" />

        <div class="mt-4 mb-3">
            <label for="formTitulo" class="form-label">Código do Gênero</label>
            <select class="form-select" aria-label="Default select example" id="codigoGenero" name="codigoGenero">
                <option selected>Selecione o código do Gênero...</option>
                @foreach ($listaGenero as $genero)            
                    <option value="{{$genero->codigo}}">{{$genero->codigo}} - {{$genero->descricao}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="formTitulo" class="form-label">Código do Livro</label>
            <input class="form-control" type="number" id="codigoLivro" name="codigoLivro" value="{{isset($livros)}}" placeholder="Digite o código do Livro">
        </div>
       <div class="mb-3">
            <label for="formTitulo" class="form-label">Titulo do Livro</label>
            <input class="form-control" type="text" id="titulo" name="titulo" value="{{isset($livros)}}" placeholder="Digite o título do Livro">
        </div>
        <div class="mb-3">
            <label for="formDescricao" class="form-label">Descrição</label>
            <textarea class="form-control" type="text" id="formDescricao" name="descricao" placeholder="Digite a descrição do Livro">{{isset($livros)}}</textarea>
        </div>
        <div class="mb-4">
            <label for="imgCapa" class="form-label">Escolha a imagem da capa:</label>
            <input class="form-control" type="file" name="imgCapa" id="imgCapa">
        </div>
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a type="button" class="btn btn-secondary" href="/lista-livros">Cancelar</a>
            
            <br><br><br><br><br><br>
        </div>
    </form>  
@endsection
