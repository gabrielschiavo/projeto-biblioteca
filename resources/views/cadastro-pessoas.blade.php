@extends('layout')

@section('titulo')
    <a class="navbar-brand" href="/lista-pessoas/cadastro-pessoas"><strong>Cadastro de Pessoas</strong></a>
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

    <form action="/lista-pessoas/cadastro-pessoas" method="POST">
        @csrf

        <input type="hidden" name="id" value="{{isset($pessoas)}}" />

        <div class="mt-4 mb-3">
            <label for="formTitulo" class="form-label">Código</label>
            <input class="form-control" type="number" id="codigo" name="codigo" value="{{isset($pessoas)}}" placeholder="Digite o código da Pessoa">
        </div>
        <div class="mb-3">
            <label for="formTitulo" class="form-label">Nome</label>
            <input class="form-control" type="text" id="nome" name="nome" value="{{isset($pessoas)}}" placeholder="Digite o nome da Pessoa">
        </div>
        <div class="mb-3">
            <label for="formDescricao" class="form-label">Endereço</label>
            <textarea class="form-control" type="text" id="formEndereco" name="endereco" placeholder="Digite o enderoço da Pessoa">{{isset($pessoas)}}</textarea>
        </div>
        <div class="mb-3">
            <label for="formTitulo" class="form-label">Telefone</label>
            <input class="form-control" type="text" id="telefone" name="telefone" value="{{isset($pessoas)}}" placeholder="Digite o telefone da Pessoa">
        </div>
        <div class="mb-4">
            <label for="formTitulo" class="form-label">Email</label>
            <input class="form-control" type="text" id="email" name="email" value="{{isset($pessoas)}}" placeholder="Digite o email da Pessoa">
        </div>
        
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a type="button" class="btn btn-secondary" href="/lista-pessoas">Cancelar</a>
        </div>
    </form>   
@endsection
