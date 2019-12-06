@extends('base')
@section('conteudo')
<div class="container">
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="container">
            <div class="py-5 text-center">
                <h2>Cadastrar Servidor</h2>
            </div>
            <div class="order-md-1">
                <form action="{{ route('coordenadores.store') }}" method="post">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nome">Nome:</label>
                            <!-- <input type="text" class="form-control" name="nome" id="nome"> -->
                            <select class="form-control" name="servidorId" id="servidorId">
                                @foreach($users as $user)
                                    <option class="form-control" value="{{$user->id}}" id="servidorId" name="servidorId">{{$user->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="cargo">Cargo:</label>
                            <input type="text" class="form-control" name="cargo" id="cargo" required="true">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="dataInicial">Data Inicial:</label>
                            <input type="date" class="form-control" name="dataInicial" id="dataInicial" required="true" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="dataFinal">Data Final:</label>
                            <input type="date" class="form-control" name="dataFinal" id="dataFinal" required="true" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}">
                        </div>
                        <div class="col-md-12">
                            <div class="text-right">
                                <input type="submit" class="btn btn-success mr-2" value="Cadastrar">
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