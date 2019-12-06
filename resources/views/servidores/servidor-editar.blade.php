@extends('base')
@section('conteudo')
<div class="container">
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="container">
            <div class="py-5 text-center">
                <h2>Editar Servidor</h2>
            </div>
            <div class="order-md-1">
                <form action="{{ route('servidores.update', $servidor->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                        <div class="form-group col-md-4">
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
                        <div class="form-group col-md-4">
                            <label for="CPF">CPF:</label>
                            <input type="text" class="form-control" name="CPF" id="CPF" value="{{ $servidor->CPF }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="telefone">Telefone:</label>
                            <input type="text" class="form-control" name="telefone" id="telefone" value="{{ $servidor->telefone }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="siape">Siape:</label>
                            <input type="text" class="form-control" name="siape" id="siape" value="{{ $servidor->siape }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="descricao">Tipo:</label>
                            <select class="form-control" name="tipo" id="tipo">
                                @if ($servidor->tipo == "DOCENTE")
                                <option value="DOCENTE" selected="selected">DOCENTE</option>
                                <option value="TECNICO ADMINISTRATIVO">TECNICO ADMINISTRATIVO</option>
                                @else
                                <option value="DOCENTE">DOCENTE</option>
                                <option value="TECNICO ADMINISTRATIVO" selected="selected">TECNICO ADMINISTRATIVO</option>
                                @endif
                            </select>
                        </div>
                        <div class="col-md-12">
                            <div class="text-right">
                                <input type="submit" class="btn btn-success mr-2" value="Editar">
                                <a href="{{ route('servidores.index') }}" class="btn btn-outline-secondary">Voltar</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
</div>
@endsection