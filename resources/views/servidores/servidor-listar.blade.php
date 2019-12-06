@extends('base')
@section('conteudo')
<div class="container">
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="container">
            <div class="py-5 text-center">
                <h2>Lista de Servidores</h2>
            </div>
            <div>
                <a type="button" class="btn btn-success pull-right" href="{{ route('servidores.create') }}">
                    <i class="la la-plus"></i>
                    Cadastrar
                </a>
            </div>
            <br>
            <div class="mt-5">
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                        <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Siape</th>
                            <th scope="col">CPF</th>
                            <th scope="col">Telefone</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($servidores as $servidor)
                        <tr>
                            <td>
                                {{ $servidor->id }}
                            </td>
                            <td>
                                {{ $servidor->nome }}
                            </td>
                            <td>
                                {{ $servidor->siape }}
                            </td>
                            <td>
                                {{ $servidor->CPF }}
                            </td>
                            <td>
                                {{ $servidor->telefone }}
                            </td>
                            <td>
                                {{ $servidor->tipo }}
                            </td>
                            <td>
                                <div class="row">
                                    <a href="{{route('servidores.edit', $servidor->id)}}" data-toggle="tooltip" data-placement="top" title="Editar" class="btn btn-success btn-sm mr-1"><i class="la la-pencil-square"></i></a>
                                    <form action="{{route('servidores.destroy', $servidor->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="la la-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</div>
@endsection