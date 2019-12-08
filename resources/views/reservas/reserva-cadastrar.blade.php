@extends('base')
@section('conteudo')
<div class="container">
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="container">
            <div class="py-5 text-center">
                <h2>Cadastrar Reserva</h2>
            </div>
            <div class="order-md-1">
                    <form action="{{ route('reservas.store') }}" method="post">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="responsavel">Responsável:</label>
                            <input type="text" class="form-control" name="responsavel" id="responsavel">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="coordenador">Coordenador:</label>     
                            <select class="form-control" name="coordenadorId" id="coordenadorId">              
                                @foreach($coordenadores as $coordenador)
                                    <option class="form-control" value="{{$coordenador->id}}" id="coordenadorId" name="coordenadorId">{{$coordenador->servidor->nome}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="local">Local:</label>
                            <select class="form-control" name="localId" id="localId">
                                @foreach($locais as $local)
                                    <option class="form-control" value="{{$local->id}}" id="localId" name="localId">{{$local->nome}}</option>
                                @endforeach
                            </select>
                        </div>                        
                        <div class="form-group col-md-4">
                            <label for="tipo">Tipo:</label>
                            <select class="form-control" name="tipo" id="tipo">
                                <option class="form-control" value="DIARIO" id="tipo" name="tipo">DIÁRIO</option>
                                <option class="form-control" value="SEMESTRAL" id="tipo" name="tipo">SEMESTRAL</option>
                            </select>
                        </div> 
                        <div class="col-md-12">
                            <div class="text-right">
                                <input type="submit" class="btn btn-success mr-2" value="Cadastrar">
                                <a href="{{ route('reservas.index') }}" class="btn btn-outline-secondary">Voltar</a>
                            </div>
                        </div>
                    </div>
                  </form>   
            </div>
        </div>
    </main>
</div>
<script type='text/javascript'>
$(document).ready(function(){

    $('#coordenadorId').change(function(){
        let id = $(this).val();
        $('#localId').find('option').remove();
        $.ajax({
            url: 'buscarLocaisCoordenador/'+id,
            type: 'get',
            dataType: 'json',
            success: function(response){
                if(response.locais != null){
                     $.each(response.locais, function (indice, valor) {
                        $('#localId').append('<option value="' + valor.id + '">' + valor.nome + '</option>');
                    });
                }
            }
        });
    });

  });
</script>
@endsection