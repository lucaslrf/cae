@extends('base')
@section('conteudo')
<div class="container">
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="container">
            <div class="py-5 text-center">
                <h2>Cadastrar Locais</h2>
            </div>
            <div class="order-md-1">
                <form action="{{ route('equipamentos.store') }}" method="post">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="nome">Nome:</label>
                              <input type="text" class="form-control" name="nome" id="nome"> 
                        </div>
                        <div class="form-group col-md-6">
                            <label for="status">Status:</label>
                            <select class="form-control" name="status" id="status">
                                <option value="DISPONIVEL">DISPONIVEL</option>
                                <option value="INDISPONIVEL">INDISPONIVEL</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="tombo">Tombo:</label>
                            <input type="text" class="form-control" name="tombo" id="tombo">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="descricao">Descrição:</label>
                            <input type="text" class="form-control" name="decricao" id="decricao">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="localId">Local:</label>
                            <select class="form-control" name="localId" id="localId">
                                @foreach($locais as $local)
                                    <option class="form-control" value="{{$local->id}}" id="localId" name="localId">{{$local->nome}}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="col-md-12">
                            <div class="text-right">
                                <input type="submit" class="btn btn-success mr-2" value="Cadastrar">
                                <a href="{{ route('equipamentos.index') }}" class="btn btn-outline-secondary">Voltar</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
</div>
@endsection