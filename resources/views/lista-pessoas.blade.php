@extends('layout')

@section('titulo')
    <a class="navbar-brand" href="/lista-pessoas"><strong>Lista Pessoas</strong></a>
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
                <th scope="col">Nome</th>
                <th scope="col">Endereço</th>
                <th scope="col">Telefone</th>
                <th scope="col">Email</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($listaPessoas as $pessoas)
                <tr class="align-middle">
                    <td>{{ $pessoas->id }}</td>
                    <td>{{ $pessoas->codigo }}</td>
                    <td>{{ $pessoas->nome }}</td>
                    <td>{{ $pessoas->endereco }}</td>
                    <td>{{ $pessoas->telefone }}</td>
                    <td>{{ $pessoas->email }}</td>
                    <td  class="d-grid gap-2 d-md-flex justify-content-md-end">

                        <form action="/lista-pessoas/{{$pessoas->id}}/excluir" method="POST" onsubmit="return confirm('Deseja excluir?')">
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
