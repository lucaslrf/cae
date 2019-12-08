@extends('base')
@section('conteudo')
<div class="container">
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="container">
            <div class="py-5 text-center">
                <h2>Cadastrar Local</h2>
            </div>
            <div class="order-md-1">
                <form action="{{ route('locais.store') }}" method="post">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="nome">Nome:</label>
                              <input type="text" class="form-control" name="nome" id="nome"> 
                        </div>
                        <div class="form-group col-md-4">
                            <label for="status">Status:</label>
                            <select class="form-control" name="status" id="status">
                                <option value="DISPONIVEL">DISPONIVEL</option>
                                <option value="INDISPONIVEL">INDISPONIVEL</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="numeroChave">Número de Chave:</label>
                            <input type="number" class="form-control" name="numeroChave" id="numeroChave">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="capacidade">Capacidade:</label>
                            <input type="number" class="form-control" name="capacidade" id="capacidade">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="blocoId">Bloco:</label>
                            <select class="form-control" name="blocoId" id="blocoId">
                                @foreach($blocos as $bloco)
                                    <option class="form-control" value="{{$bloco->id}}" id="blocoId" name="blocoId">{{$bloco->nome}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="coordenadorId">Coordenador:</label>
                            <select class="form-control" name="coordenadorId" id="coodernadorId">
                                @foreach($coordenadores as $coordenador)
                                    <option class="form-control" value="{{$coordenador->id}}" id="coordenadorId" name="coordenadorId">{{$coordenador->servidor->nome}}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="col-md-12">
                            <div class="text-right">
                                <input type="submit" class="btn btn-success mr-2" value="Cadastrar">
                                <a href="{{ route('locais.index') }}" class="btn btn-outline-secondary">Voltar</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
</div>
@endsection