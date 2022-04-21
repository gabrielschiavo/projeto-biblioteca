@extends('layout')

@section('titulo')
    <a class="navbar-brand" href="/lista-reservas/cadastro-reservas"><strong>Cadastro de Reservas</strong></a>
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
            <label for="formTitulo" class="form-label">Código</label>
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
        <div class="mb-3">
            <label for="formTitulo" class="form-label">Pessoa</label>
            <input class="form-control" type="text" id="pessoa" name="pessoa" value="{{isset($reservas) ? $reservas->pessoa : old('pessoa')}}"  placeholder="Digite a Pessoa que Reservou">
        </div>
        <div class="mb-3">
            <label for="formTitulo" class="form-label">Livro</label>
            <input class="form-control" type="text" id="livro" name="livro" value="{{isset($reservas) ? $reservas->livro : old('livro')}}"  placeholder="Digite o Livro reservado">
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
        </div>
    </form>   
@endsection
