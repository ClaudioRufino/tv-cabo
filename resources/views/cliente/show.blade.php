@extends('layout.container.pagina')
@section('title', 'Perfil')


@section('conteudo')
    
<div class="col-12">
    <h2 class="h3 mb-4 page-title">Perfil</h2>
    <div class="row mt-5 align-items-center">
      <div class="col-md-3 text-center mb-5">
        <div class="avatar avatar-xl">
          <img src="{{url($cliente->foto)}}" alt="..." class="avatar-img rounded-circle">
        </div>
      </div>
      <div class="col">
        <div class="row align-items-center">
          <div class="col-md-7">
            <h4 class="mb-1">{{$cliente->nome_abreviado}}</h4>
            <p class="small mb-3"><span class="badge badge-dark">Luanda, Angola</span></p>
          </div>
        </div>
        <div class="row mb-4">
          <div class="col-md-7">
            <p class="text-mute"> 
                {{$cliente->nome}} é um/a cliente que está connosco desde {{$cliente->data_contrato}}. Seu pagamento é feito no dia {{$cliente->dia_pagamento}} de todos os meses. Seu contacto é {{$cliente->contacto}}. Somos muito gratos por té-lo como cliente.
            </p>
          </div>
          <div class="col">
            <p class="small mb-0 text-mute"><b>Linha</b> - {{$cliente->linha}}</p>
            <p class="small mb-0 text-mute"><b>Rua</b> - {{$cliente->rua}}</p>
            <p class="small mb-0 text-mute"><b>Número da casa</b> - {{$cliente->num_casa}}</p>
          </div>
        </div>
      </div>
    </div>
    <div class="row my-4">
      <div class="col-md-4">
        <div class="card mb-4 shadow">
          <div class="card-body my-n3">
            <div class="row align-items-center">
              <div class="col-3 text-center">
                <span class="circle circle-lg bg-light">
                  <i class="fe fe-user fe-24 text-primary"></i>
                </span>
              </div> 
              <div class="col">
                  <h3 class="h5 mt-4 mb-1">Informações</h3>
                <p class="text-muted">
                    Podes detalhar informações deste usuário. Podes destacar as suas qualidades, e usar essas informações no futuro.
                </p>
              </div> 
            </div> 
          </div>
          <div class="card-footer">
            <a href="{{route('cliente.edit', $cliente->id)}}" class="d-flex justify-content-between text-muted"><span>Editar Cliente</span><i class="fe fe-chevron-right"></i></a>
          </div> 
        </div> 
      </div>
      <div class="col-md-4">
        <div class="card mb-4 shadow">
          <div class="card-body my-n3">
            <div class="row align-items-center">
              <div class="col-3 text-center">
                <span class="circle circle-lg bg-light">
                  <i class="fe fe-credit-card fe-24 text-primary"></i>
                </span>
              </div> <!-- .col -->
              <div class="col">
                  <h3 class="h5 mt-4 mb-1">Pagamento</h3>
                <p class="text-muted">
                    Efectuar pagamento cada vez mais rápido e simples. Clique no link abaixo para efectuares pagamento. Evite as multas.
                </p>
              </div> 
            </div> 
          </div> 
          <div class="card-footer">
            <a href="{{route('pagamentoId', $cliente->id)}}" class="d-flex justify-content-between text-muted"><span>Efectuar Pagamento</span><i class="fe fe-chevron-right"></i></a>
          </div> 
        </div> 
      </div> 
      <div class="col-md-4">
        <div class="card mb-4 shadow">
          <div class="card-body my-n3">
            <div class="row align-items-center">
              <div class="col-3 text-center">
                <span class="circle circle-lg bg-light">
                  <i class="fe fe-clipboard fe-24 text-primary"></i>
                </span>
              </div> 
              <div class="col">
                  <h3 class="h5 mt-4 mb-1">Pedido</h3>
                <p class="text-muted">Faça pedidos para os seus clientes. O cliente poderá fazer pedidos a partir deste, e para tal basta clicar no link abaixo.</p>
              </div> 
            </div> 
          </div> 
          <div class="card-footer">
            <a href="{{route('pedido.show', $cliente->id)}}" class="d-flex justify-content-between text-muted"><span>Fazer Pedido</span><i class="fe fe-chevron-right"></i></a>
          </div> <!-- .card-footer -->
        </div> <!-- .card -->
      </div> <!-- .col-md-->
    </div> <!-- .row-->

    <h3>Situação</h3>
    <p class="text-mute">Neste item, relata-se sobre o estado do cliente quanto a questão de pagamento, e verificação de alguma multa imposta.</p>
    <div class="card-deck my-4">
      <div class="card mb-4 shadow">
        <div class="card-body text-center my-4">
          <a href="{{route('divida.show', $cliente->id)}}">
            <h3 class="h5 mt-4 mb-0">Dívida</h3>
          </a>
          <p class="text-muted">contraída</p>
          <span class="h1 mb-0">{{$cliente->divida}}</span>
          <p class="text-muted">kz</p>
          <ul class="list-unstyled">
            <li>As dívidas que forem contraídas</li>
            <li>devem ser liquidadas</li>
            <li>num periódo pré-determinado para</li>
            <li>se evitarem multas</li>
          </ul>
        </div> 
      </div>

      <div class="card mb-4">
        <div class="card-body text-center my-4">
          <a href="{{route('multa.show', $cliente->id)}}">
            <h3 class="h5 mt-4 mb-0">Multa</h3>
          </a>
          <p class="text-muted">penalizada</p>
          <span class="h1 mb-0">{{$cliente->multa}}</span>
          <p class="text-muted">kz</p>
          <ul class="list-unstyled">
            <li>A multa pode ser imposta</li>
            <li>por várias razões</li>
            <li>O cliente deve evitar</li>
            <li>quaisquer dessas razões</li>
          </ul>
        </div> 
      </div> 
    </div> 

    <h5 class="mb-3">Histórico de pagamento -  {{date('Y')}}</h5>
    <table class="table table-borderless table-striped">
      <thead>
        <tr role="row">
          <th class="bg-primary">ID</th>
          <th class="bg-primary">Data de Pagamento</th>
          <th class="bg-primary">Valor</th>
          <th class="bg-primary">Mes</th>
          <th class="bg-primary">Estado</th>
          <th class="bg-primary">Atendido por</th>
          <th class="bg-primary">Acção</th>
        </tr>
      </thead>
      <tbody>

        @foreach ($cliente->pagamentos as $pagamento)
        <tr>
          <th scope="col">{{$cliente->id}}</th>
          <td>{{$pagamento->data_pagamento}}</td>
          <td>{{$pagamento->valor}} kz</td>
          
          @switch($pagamento->mes)
              @case(1) <td>{{"Janeiro"}}</td> @break
              @case(2) <td>{{"Fevereiro"}}</td> @break
              @case(3) <td>{{"Março"}}</td> @break
              @case(4) <td>{{"Abril"}}</td> @break
              @case(5) <td>{{"Maio"}}</td> @break
              @case(6) <td>{{"Junho"}}</td> @break
              @case(7) <td>{{"Julho"}}</td> @break
              @case(8) <td>{{"Agosto"}}</td> @break
              @case(9) <td>{{"Setembro"}}</td> @break
              @case(10) <td>{{"Outubro"}}</td> @break
              @case(11) <td>{{"Novembro"}}</td> @break
              @case(12) <td>{{"Dezembro"}}</td> @break
          @endswitch

          <td><span class="dot dot-lg bg-success mr-2"></span>Pago</td>
          <td>
            {{$pagamento->atendido_por}}
          </td>
          <td>
            <div class="dropdown">
              <button class="btn btn-sm dropdown-toggle more-vertical" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="sr-only">Action</span>
              </button>
              <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="{{ route('pagamento.editar', ['id'=> $cliente->id, 'ano'=> $pagamento->ano, 'mes'=> $pagamento->mes, 'valor'=>$pagamento->valor ] ) }}">Editar</a>
                
                <form action="{{route('pagamento.destroy', $pagamento->id)}}" method="post" class="form_apagar">
                  @csrf
                  @method('DELETE')
                  <input type="hidden" name="id_pagamento" class="pagamento_id" value="{{ $pagamento->id }}">
                  <button type="submit" class="apagar-button dropdown-item" data-cliente-id="{{ $pagamento->id}}">Apagar</button>
                </form>
                <a class="dropdown-item" href="{{route('pagamento.showP', ['id'=>$cliente->id, 'ano'=>date('Y')])}}">Ver mais</a>
              </div>
            </div>
          </td>
        </tr>
        @endforeach

        

      </tbody>
    </table>
  </div> 

    <script>

      const btn_apagar = document.querySelectorAll('.apagar-button');
      btn_apagar.forEach(button => {
      button.addEventListener('click', function(e) {
        var form = button.closest('form');
        e.preventDefault();

        var input_id = form.querySelector('.pagamento_id');
        pagamento_id = Number(input_id.value);

        linha =  input_id.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode;
        linha_index = input_id.parentNode.parentNode.parentNode.parentNode.rowIndex; 

        apaga_linha = linha.deleteRow(linha_index);

        async function pagamento(){
            const response = await fetch('http://localhost:8000/api/pagamento/'+pagamento_id,
            {
                method:'DELETE',
                headers: {
                    'Accept': 'application/json'
                }
            });
            const pagamento = await response.json();
            return pagamento;
        }

        const cliente = pagamento();

        cliente.then(
            pagamento=>{
                console.log(pagamento);
            }
        );
       

        });
    });


    </script>

@endsection

