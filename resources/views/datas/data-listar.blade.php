@extends('base')
@section('conteudo')
<div class="container">
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="container">
            <div class="py-5 text-center">
            <h2>Lista de Datas da Reserva {{$reserva->id}}</h2>
            </div>
            <div>
                @if($reserva->servidor->usuario->id == $user->id)
                <a type="button" class="btn btn-success pull-right" href="{{ route('reserva.datas.create', $reserva->id) }}">
                    <i class="la la-plus"></i>
                    Cadastrar
                </a>
                @endif
            </div>
            <br>
            <div class="mt-5">
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Data Inicial</th>
                        <th scope="col">Data Final</th>
                        <th scope="col">Data Solicitação</th>
                        <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($datas as $data)
                        <tr>
                            <td>
                                {{ $data->id }}
                            </td>
                            <td>
                                {{ date("d/m/Y H:i:s", strtotime($data->dataHoraInicial)) }}
                            </td>
                            <td>
                                {{ date("d/m/Y H:i:s", strtotime($data->dataHoraFinal)) }}
                            </td>
                            <td>
                                {{ date("d/m/Y H:i:s", strtotime($data->datahoraSolicitacao)) }}
                            </td>
                            <td>
                                @if($reserva->servidor->usuario->id == $user->id && $reserva->status == 'SOLICITADO')
                                <div class="row">
                                    <form action="{{route('datas.destroy', $data->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="la la-trash"></i></button>
                                    </form>
                                </div>
                                @endif
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