@extends('base')
@section('conteudo')
<div class="container">
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="container">
            <div class="py-5 text-center">
                <h2>Editar Servidor</h2>
            </div>
            <div class="order-md-1">
                <form action="{{ route('locais.update', $local->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                        <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="nome">Nome:</label>
                              <input type="text" class="form-control" name="nome" id="nome" value="{{ $local->nome }}"> 
                        </div>
                        <div class="form-group col-md-6">
                            <label for="status">Status:</label>
                            <select class="form-control" name="status" id="status">
                                 @if ($local->status == "DISPONIVEL")
                                <option value="DISPONIVEL" selected="selected">DISPONIVEL</option>
                                <option value="INDISPONIVEL">INDISPONIVEL</option>
                                @else
                                <option value="DISPONIVEL">DISPONIVEL</option>
                                <option value="INDISPONIVEL" selected="selected">INDISPONIVEL</option>
                                @endif
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="numeroChave">Numero de Chave:</label>
                            <input type="text" class="form-control" name="numeroChave" id="numeroChave" value="{{ $local->numeroChave }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="capacidade">Capacidade:</label>
                            <input type="text" class="form-control" name="capacidade" id="capacidade" value="{{ $local->capacidade }}">
                        </div>
                            
                        <div class="form-group col-md-4">
                            <label for="bloco">Bloco:</label>
                            <!-- <input type="text" class="form-control" name="nome" id="nome"> -->
                            <select class="form-control" name="blocoId" id="blocoId">
                               @foreach($blocos as $bloco)
                                @if ($local->blocoId == $bloco->id)
                                    <option class="form-control" selected="selected" value="{{$bloco->id}}" id="blocoId" name="blocoId">{{$bloco->nome}}</option>
                                @else
                                    <option class="form-control" value="{{$bloco->id}}" id="blocoId" name="blocoId">{{$bloco->nome}}</option>
                                @endif

                                @endforeach
                            </select>
                        </div>
                            
                            
                        <div class="form-group col-md-4">
                            <label for="coordenador">Coordenador:</label>
                            <!-- <input type="text" class="form-control" name="nome" id="nome"> -->
                            <select class="form-control" name="coordenadorId" id="coordenadorId">
                               @foreach($coordenadores as $servidor)
                                @if ($local->coordenadorId == $servidor->id)
                                    <option class="form-control" selected="selected" value="{{$servidor->id}}" id="coordenadorId" name="coordenadorId">{{$servidor->nome}}</option>
                                @else
                                    <option class="form-control" value="{{$servidor->id}}" id="coordenadorId" name="coordenadorId">{{$servidor->nome}}</option>
                                @endif

                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12">
                            <div class="text-right">
                                <input type="submit" class="btn btn-success mr-2" value="Editar">
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