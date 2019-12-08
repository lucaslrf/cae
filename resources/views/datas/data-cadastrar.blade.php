@extends('base')
@section('conteudo')
<div class="container">
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="container">
            <div class="py-5 text-center">
                <h2>Cadastrar Data</h2>
            </div>
            <div class="order-md-1">
                    <form action="{{ route('reserva.datas.store', $id_reserva) }}" method="post">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="dataHoraInicial">Data Inicial:</label>
                            <input type="datetime-local" class="form-control" name="dataHoraInicial" id="dataHoraInicial">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="dataHoraFinal">Data Final:</label>
                            <input type="datetime-local" class="form-control" name="dataHoraFinal" id="dataHoraFinal">
                        </div>
                        <div class="col-md-12">
                            <div class="text-right">
                                <input type="submit" class="btn btn-success mr-2" value="Cadastrar">
                                {{-- <a href="{{ route('reservas.datas.index') }}" class="btn btn-outline-secondary">Voltar</a> --}}
                            </div>
                        </div>
                    </div>
                  </form>   
            </div>
        </div>
    </main>
</div>
@endsection