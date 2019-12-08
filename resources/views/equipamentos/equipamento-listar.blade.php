@extends('base')
@section('conteudo')
<div class="container">
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="container">
            <div class="py-5 text-center">
                <h2>Lista de Equipamentos</h2>
            </div>
            <div>
                <a type="button" class="btn btn-success pull-right" href="{{ route('equipamentos.create') }}">
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
                            <th scope="col">Status</th>
                            <th scope="col">Tombo</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Local</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($equipamentos as $equipamento)
                        <tr>
                            <td>
                                {{ $equipamento->id }}
                            </td>
                            <td>
                                {{ $equipamento->nome }}
                            </td>
                            <td>
                                {{ $equipamento->status }}
                            </td>
                            <td>
                                {{ $equipamento->tombo }}
                            </td>
                            <td>
                                {{ $equipamento->decricao }}
                            </td>
                            <td>
                                {{ $equipamento->local->nome }}
                            </td>
                        
                            <td>
                                <div class="row">
                                    <a href="{{route('equipamentos.edit', $equipamento->id)}}" data-toggle="tooltip" data-placement="top" title="Editar" class="btn btn-success btn-sm mr-1"><i class="la la-pencil-square"></i></a>
                                    <form action="{{route('equipamentos.destroy', $equipamento->id)}}" method="post">
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