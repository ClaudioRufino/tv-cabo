@extends('layout.container.pagina')
@section('title', 'Pagamento de Multa')

@section('conteudo')

<div class="col-12" style="border: 1px solid ble">
    <h2 class="page-title">Fazer Pagamento</h2>
    <p class="text-mute">Nesta seção poderá fazer o pagamento de multas dos clientes.</p>
    <div class="card shadow mb-4">
      <div class="card-header">
        <strong class="card-title">TVCJ - Multas</strong>
      </div>
      <div class="card-body" style="">

        <form action="{{route('multa.update', $cliente->multa_id)}}" method="post">
          @method('PUT')
          @csrf
        <div class="row">

          <div class="col-md-6">

            <div class="form-group mb-3">
                <label for="example-palaceholder">Código do Cliente</label>

                @php
                  if(isset($cliente)){
                    $valor_id = $cliente->cliente_id;
                    $data_emissao = $cliente->data_emissao;
                    $valor = $cliente->valor;
                  }
                  else{
                    $valor_id = 1;
                    $data_emissao = "";
                    $valor = 0;
                  }
                  
              @endphp
               
               <input type="number" id="id_cliente" class="form-control" value="{{$valor_id}}" name="id_cliente" disabled>
              </div>

            <div class="form-group mb-3">
              <label for="simpleinput">Data de Emissão</label>
              <input type="date" id="data_emissao" class="form-control" name="data_emissao" value="{{$data_emissao}}" disabled>
            </div>

            <div class="form-group mb-3">
              <label for="example-email">Data de Vencimento</label>
              <input type="date" id="data_vencimento" class="form-control" name="data_vencimento" value="{{ date('Y-m-d') }}">
            </div>

            <div class="form-group mb-3">
              <label for="example-password">Valor</label>
              <input type="number" id="valor" class="form-control" name="valor" value="{{$valor}}">
            </div>

            <button type="submit" class="btn mb-2 btn-primary btn-lg btn-block">Pagar Multa</button>

          </div> 

          <div class="col-md-6 text-center" style="border:1px solid #ddd; border-radius:50px;"> 
              <img 
                  src="{{url('light/assets/images/payment.png')}}" 
                  id="img_pagamento" 
                  alt="imagem descrevendo pagamento de multa"
                  style="width:90%; height:290px;border-radius:5px; margin-top:20px; margin-bottom:2px">
              <br>
              
          </div> 
          
        </div>
        </form>

      </div>
    </div> 

  </div>

@endsection