@extends('base')
@section('conteudo')
<div class="container">
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="container">
            <div class="py-5 text-center">
                <h2>Editar Servidor</h2>
            </div>
            <div class="order-md-1">
                <form action="{{ route('equipamentos.update', $equipamento->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                        <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="nome">Nome:</label>
                              <input type="text" class="form-control" name="nome" id="nome" value="{{ $equipamento->nome }}"> 
                        </div>
                        <div class="form-group col-md-6">
                            <label for="status">Status:</label>
                            <select class="form-control" name="status" id="status">
                                 @if ($equipamento->status == "DISPONIVEL")
                                <option value="DISPONIVEL" selected="selected">DISPONIVEL</option>
                                <option value="INDISPONIVEL">INDISPONIVEL</option>
                                @else
                                <option value="DISPONIVEL">DISPONIVEL</option>
                                <option value="INDISPONIVEL" selected="selected">INDISPONIVEL</option>
                                @endif
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="tombo">tombo:</label>
                            <input type="text" class="form-control" name="tombo" id="tombo" value="{{ $equipamento->tombo }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="descricao">Descricao:</label>
                            <input type="text" class="form-control" name="decricao" id=decricao" value="{{ $equipamento->decricao }}">
                        </div>
                            
                        <div class="form-group col-md-4">
                            <label for="localId">Local:</label>
                            <!-- <input type="text" class="form-control" name="nome" id="nome"> -->
                            <select class="form-control" name="localId" id="localId">
                               @foreach($locais as $local)
                                @if ($equipamento->localId == $local->id)
                                    <option class="form-control" selected="selected" value="{{$local->id}}" id="localId" name="localId">{{$local->nome}}</option>
                                @else
                                    <option class="form-control" value="{{$local->id}}" id="localId" name="localId">{{$local->nome}}</option>
                                @endif

                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12">
                            <div class="text-right">
                                <input type="submit" class="btn btn-success mr-2" value="Editar">
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