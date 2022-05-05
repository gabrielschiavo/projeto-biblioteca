@extends('layout')

@section('tituloGuia')
    Cadastro Retiradas/Devoluçaões
@endsection

@section('titulo')
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 pt-3 pb-3" href="/lista-reservas/cadastro-reservas">Cadastro Retiradas/Devoluçaões</a>
@endsection

@section('liCadResevas')
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

    <form action="/lista-reservas/cadastro-reservas" method="POST">
        @csrf

        <input type="hidden" name="id" value="{{isset($reservas) ? $reservas->id : old('id')}}" />

        <div class="mt-4 mb-3">
            <label for="formTitulo" class="form-label">Código Reserva</label>
            <input class="form-control" type="number" id="codigo" name="codigo" value="{{isset($reservas) ? $reservas->codigo : old('codigo')}}"  placeholder="Digite o código da Reserva">
        </div>
        <div class="mb-3">
            <label for="formTitulo" class="form-label">Data de Retirada</label>
            <input class="form-control" type="date" id="dataRetirada" name="dataRetirada" value="{{isset($reservas) ? $reservas->dataRetirada : old('dataRetirada')}}"  placeholder="Digite o dia da Retirada do Livro">
        </div>
        <div class="mb-3">
            <label for="formDescricao" class="form-label">Data de Devolução</label>
            <input class="form-control" type="date" id="dataDevolucao" name="dataDevolucao" value="{{isset($reservas) ? $reservas->dataDevolucao : old('dataDevolucao')}}" placeholder="Digite o dia da Devolução do Livro">
        </div>

        <div class="mt-4 mb-3">
            <label for="formTitulo" class="form-label">Pessoa</label>
            <select class="form-select" aria-label="Default select example" id="pessoa" name="pessoa">
                <option value="{{isset($reservas) ? $reservas->pessoa : old('pessoa')}}" selected>{{isset($reservas) ? $reservas->pessoa : old('pessoa')}}</option>
                @foreach ($listaPessoas as $pessoas)            
                    <option value="{{$pessoas->nome}}">{{$pessoas->nome}}</option>
                @endforeach
            </select>
        </div>

        <div class="mt-4 mb-3">
            <label for="formTitulo" class="form-label">Livro</label>
            <select class="form-select" aria-label="Default select example" id="livro" name="livro">
                <option value="{{isset($reservas) ? $reservas->livro : old('livro')}}" selected>{{isset($reservas) ? $reservas->livro : old('livro')}}</option>
                @foreach ($listaLivros as $livros)            
                    <option value="{{$livros->titulo}}">{{$livros->titulo}}</option>
                @endforeach
            </select>
        </div>
        
        <div class="mb-4">
            <label for="formTitulo" class="form-label">Selecione o status do livro</label>
            <select class="form-select" id="status" name="status" aria-label="Default select example">
                <option value="{{isset($reservas) ? $reservas->status : old('status')}}" selected>{{isset($reservas) ? $reservas->status : old('status')}}</option>
                <option value="Retirado">Retirado</option>
                <option value="Devolvido">Devolvido</option>
                <option value="Atrasado">Atrasado</option>
                <option value="Renovado">Renovado</option>
            </select>
        </div>
        
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a type="button" class="btn btn-secondary" href="/lista-reservas">Cancelar</a>

            <br><br><br><br><br><br>
        </div>
    </form>   
@endsection
