@extends('base')
@section('conteudo')
<div class="container">
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="container">
            <div class="py-5 text-center">
                <h2>Editar Coordenador</h2>
            </div>
            <div class="order-md-1">
                <form action="{{ route('coordenadores.update', $coordenador->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nome">Nome:</label>
                            <!-- <input type="text" class="form-control" name="nome" id="nome"> -->
                            <select class="form-control" name="usuarioId" id="usuarioId">
                                @foreach($users as $user)
                                @if ($servidor->usuarioId == $user->id)
                                    <option class="form-control" selected="selected" value="{{$user->id}}" id="usuarioId" name="usuarioId">{{$user->name}}</option>
                                @else
                                    <option class="form-control" value="{{$user->id}}" id="usuarioId" name="usuarioId">{{$user->name}}</option>
                                @endif

                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="cargo">Cargo:</label>
                            <input type="text" class="form-control" name="cargo" id="cargo" value="{{ $coordenador->cargo }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="dataInicial">Data Inicial:</label>
                            <input type="date" class="form-control" name="dataInicial" id="dataInicial" required="true" value="{{$coordenador->dataInicial}}" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="dataFinal">Data Final:</label>
                            <input type="date" class="form-control" name="dataFinal" id="dataFinal" required="true" value="{{$coordenador->dataFinal}}"  pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}">
                        </div>
                        <div class="col-md-12">
                            <div class="text-right">
                                <input type="submit" class="btn btn-success mr-2" value="Editar">
                                <a href="{{ route('coordenadores.index') }}" class="btn btn-outline-secondary">Voltar</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
</div>
@endsection