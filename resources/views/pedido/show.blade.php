@extends('layout.container.pagina')
@section('title', 'Pedido')



@section('conteudo')

<div class="col-12 col-lg-10 col-xl-8">
    <h2 class="h3 mb-4 page-title">Pedido</h2>
    <div class="my-4">
      
      <form action="{{route('pedido.store')}}" method="POST">
        @csrf
        <div class="row mt-5 align-items-center">
          <div class="col-md-3 text-center mb-5">
            <div class="avatar avatar-xl">
              <img src="{{url($cliente->foto)}}" alt="Avatar do cliente" class="avatar-img rounded-circle">
            </div>
          </div>
          <div class="col">
            <div class="row align-items-center">
              <div class="col-md-7">
                <h4 class="mb-1">{{$cliente->nome_abreviado}}</h4>
                <p class="small mb-3"><span class="badge badge-dark">New York, USA</span></p>
              </div>
            </div>
            <div class="row mb-4">
              <div class="col-md-7">
                <p class="text-muted">
                    {{$cliente->nome}} é um/a cliente que está connosco desde {{$cliente->data_contrato}}. Seu pagamento é feito no dia {{$cliente->dia_pagamento}} de todos os meses. Seu contacto é {{$cliente->contacto}}. Somos muito gratos por té-lo como cliente.
                </p>
              </div>

              <div class="col">
                <p class="small mb-0 text-muted"><b>Linha</b> - {{$cliente->linha}}</p>
                <p class="small mb-0 text-muted"><b>Rua</b> - {{$cliente->rua}}</p>
                <p class="small mb-0 text-muted"><b>Número da casa</b> - {{$cliente->num_casa}}</p>
              </div>

            </div>
          </div>
        </div>
        <hr class="my-4">
        <div class="form-row">
          <div class="form-group col-md-2">
            <label for="cliente_id">Código</label>
            <input type="text" id="cliente_id" class="form-control" name="cliente_id" value="{{$cliente->id}}" readonly>
          </div>
          <div class="form-group col-md-6">
            <label for="lastname">Assunto</label>
            <input type="text" id="lastname" class="form-control" placeholder="" name="assunto" required>
          </div>

          <div class="form-group col-md-4">
            <label for="data">Data do Pagamento</label>
            <input type="date" class="form-control" id="data" name="data" value="{{date('Y-m-d')}}" required>
          </div>

        </div>

        <div class="form-group text-center">
            <label for="descricao">Descrição do pedido</label>
            <textarea class="form-control" name="descricao" id="descricao" cols="30" rows="4" placeholder="...">

            </textarea>
        </div>

       <div class="text-right">
            <button type="submit" class="btn btn-primary">Fazer Pedido</button>
       </div>

        <hr class="my-4">
          
      </form>
    </div>
  </div>

@endsection