@extends('base')
@section('conteudo')
<div class="container">
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="container">
            <div class="py-5 text-center">
                <h2>Cadastrar Bloco</h2>
            </div>
            <div class="order-md-1">
                    <form action="{{ route('blocos.store') }}" method="post">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nome">Nome:</label>                    
                            <input type="text" class="form-control" name="nome" id="nome">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="descricao">Descricao:</label>                    
                            <input type="text" class="form-control" name="descricao" id="descricao">
                        </div>
                        <div class="col-md-12">
                            <div class="text-right">
                                <input type="submit" class="btn btn-success mr-2" value="Cadastrar">
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