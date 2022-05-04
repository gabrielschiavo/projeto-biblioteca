@extends('layout')

@section('titulo')
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 pt-3 pb-3" href="/lista-pessoas">Lista Pessoas</a>
@endsection

@section('liListPessoas')
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
