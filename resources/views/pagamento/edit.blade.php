@extends('layout.container.pagina')
@section('title', 'Pagamento')

@section('conteudo')

<div class="col-12" style="border: 1px solid ble">
    <h2 class="page-title">Editando Pagamento</h2>
    <p class="text-muted">Nesta seção poderá editar o pagamento mensal do cliente.</p>
    <div class="card shadow mb-4">
      <div class="card-header">
        <strong class="card-title">TVCJ - Mensalidade </strong>
      </div>
      <div class="card-body" style="">

        <form method="POST" action="{{route('pagamento.update', ['pagamento'=>$pagamento->id_pagamento])}}">
          @csrf
          @method('PUT')
        <div class="row">

          <div class="col-md-6">

            <div class="form-group mb-3">
                <label for="example-palaceholder">Código do Cliente</label>
                <select class="form-control" id="cliente_id" name="cliente_id">
                    @for ($i = 1; $i <= 500; $i++)
                        <option value="{{$i}}" @if($i == $pagamento->id) selected @endif>{{$i}}</option>
                    @endfor
                </select>
              </div>

            <div class="form-group mb-3">
              <label for="simpleinput">Ano</label>
              <select class="form-control" id="ano" name="ano"> 
                @for ($i = 2020; $i <= 2030; $i++)
                    <option value="{{$i}}" @if($i == $pagamento->ano) selected @endif>{{$i}}</option>
                @endfor
              </select>
            </div>

            <div class="form-group mb-3">
              <label for="example-email">Mes</label>
              <select class="form-control" id="mes" name="mes">
                  @for ($i = 1; $i <= 12; $i++)
                      <option value="{{$i}}" @if($i == $pagamento->mes) selected @endif>
                          @switch($i)
                              @case(1) {{"Janeiro"}} @break
                              @case(2) {{"Fevereiro"}} @break
                              @case(3) {{"Março"}} @break
                              @case(4) {{"Abril"}} @break
                              @case(5) {{"Maio"}} @break
                              @case(6) {{"Junho"}} @break
                              @case(7) {{"Julho"}} @break
                              @case(8) {{"Agosto"}} @break
                              @case(9) {{"Setembro"}} @break
                              @case(10){{"outubro"}} @break
                              @case(11){{"Novembro"}} @break
                              @case(12){{"Dezembro"}} @break
                          @endswitch
                      </option>
                  @endfor
                
              </select>
            </div>

            <div class="form-group mb-3">
              <label for="example-password">Valor</label>
              <select class="form-control" id="valor_pagamento" name="valor">
                @for ($i = 1000; $i <= 5000; $i = $i + 500)
                    <option value="{{$i}}" @if($i == $pagamento->valor) selected @endif>{{$i}}</option>
                @endfor
              </select>
            </div>

            <div class="form-group mb-3">
                <div class="alert alert-danger text-center" role="alert" id="mensagem" style="display: none"> </div>
            </div>

          </div> 

          <div class="col-md-6 text-center" style="border:1px solid #ddd"> 
              <img 
                  src="{{url('light/assets/images/pagamento.jpg')}}" 
                  id="img_pagamento" 
                  alt="imagem descrevendo pagamento de mensalidade"
                  style="width:70%; height:290px;border-radius:5px; margin-top:20px">
              <br>
              <button type="submit" class="btn mb-2 btn-primary btn-lg btn-block">Atualizar pagamento</button>
          </div> 
          
        </div>
        </form>

        
      </div>
    </div> 

  </div>

  @endsection

  

