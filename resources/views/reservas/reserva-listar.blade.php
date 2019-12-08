@extends('base')
@section('conteudo')
<div class="container">
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="container">
            <div class="py-5 text-center">
                <h2>Lista de Reservas</h2>
            </div>
            <div>
                <a type="button" class="btn btn-success pull-right" href="{{ route('reservas.create') }}">
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
                        <th scope="col">Local</th>
                        <th scope="col">Servidor</th>
                        <th scope="col">Coordenador</th>
                        <th scope="col">Status</th>
                        <th scope="col">Solicitação</th>
                        <th scope="col">Atualização</th>
                        <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reservas as $reserva)
                        <tr>
                            <td>
                                {{ $reserva->id }}
                            </td>
                            <td>
                                {{ $reserva->local->nome }}
                            </td>
                            <td>
                                {{ $reserva->servidor->usuario->name }}
                            </td>
                            <td>
                                {{ $reserva->coordenador->servidor->usuario->name }}
                            </td>
                            <td>
                                {{ $reserva->status }}
                            </td>
                            <td>
                                {{  date("d/m/Y H:i:s", strtotime($reserva->datahoraSolicitacao)) }}
                            </td>
                            <td>
                                {{ date("d/m/Y H:i:s", strtotime($reserva->dataHoraAtualizacao)) }}
                            </td>
                            <td>
                                <div class="row">                                                                
                                    <a href="{{route('reserva.datas', $reserva->id)}}" data-toggle="tooltip" data-placement="top" title="Datas" class="btn btn-primary btn-sm mr-1"><i class="la la-plus"></i></a>
                                    @if($reserva->coordenador->servidor->usuario->id == $user->id)
                                        @if($reserva->status == 'SOLICITADO' || $reserva->status == 'CANCELADO')
                                            <form action="{{route('reserva.aprovar', $reserva->id)}}" method="post" title="Aprovar">
                                                @csrf
                                                <button type="submit" class="btn btn-info btn-sm mr-1"><i class="la la-check"></i></button>
                                            </form>
                                        @endif
                                        @if($reserva->status == 'SOLICITADO' || $reserva->status == 'RESERVADO')
                                            <form action="{{route('reserva.reprovar', $reserva->id)}}" method="post" title="Reprovar">
                                                @csrf
                                                <button type="submit" class="btn btn-warning btn-sm mr-1"><i class="la la-close"></i></button>
                                            </form>
                                        @endif
                                    @endif
                                    @if($reserva->servidor->usuario->id == $user->id)
                                        @if($reserva->status == 'SOLICITADO')
                                            <a href="{{route('reservas.edit', $reserva->id)}}" data-toggle="tooltip" data-placement="top" title="Editar" class="btn btn-success btn-sm mr-1"><i class="la la-pencil-square"></i></a>  
                                        @endif 
                                        <form action="{{route('reservas.destroy', $reserva->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm mr-1"><i class="la la-trash"></i></button>
                                        </form>
                                    @endif     
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