@extends('base')
@section('conteudo')
<div class="container">
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="container">
        <div class="py-5 text-center">
            <h2>Editar Bloco</h2>
        </div>
	    <div class="order-md-1">
            <form action="{{ route('blocos.update', $bloco->id) }}" method="post">
                @method('PUT')
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="titulo">Nome:</label>
                        <input type="text" class="form-control" name="nome" id="nome" value="{{ $bloco->nome }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="descricao">Descrição:</label>
                        <input type="text" class="form-control" name="descricao" id="descricao" value="{{ $bloco->descricao }}">
                    </div>             
                    <div class="col-md-12">
                        <div class="text-right">   
                            <input type="submit" class="btn btn-success mr-2" value="Editar">
                            <a href="{{ route('blocos.index') }}" class="btn btn-outline-secondary">Voltar</a>
                        </div>
                    </div>
                </div>
            </form>
	    </div>
    </div>
    </main>
</div>
@endsection