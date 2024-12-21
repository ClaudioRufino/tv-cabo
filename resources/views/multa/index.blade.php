@extends('layout.container.pagina')
@section('title', 'Multas')



@section('conteudo')

<div class="col-12">
<div class="row">
    <div class="col-md-12 my-4 text-center">
      <h2 class="h4 mb-1 text-center">Multas</h2>
      <p class="mb-3">A tabela abaixo apresenta as multas de todos os clientes!</p>
      <form 
            action="{{route('multa.create')}}" 
            method="get" 
            class="text-right"
            style="
                  position: relative;
                  float:right;
                  margin-top:22px;
                  height:50px;
                  margin-left:4px; ">

          <button class="btn btn-primary"><i class="fe fe-plus"></i></button>
      </form>
      <div class="card shadow">
        <div class="card-body">
          <!-- table -->
          <table class="table table-hover table-borderless border-v">
            <thead class="thead-dark">
              <tr>
                <th class="bg-primary">Id</th>
                <th class="bg-primary text-left">Nome</th>
                <th class="bg-primary">Contacto</th>
                <th class="bg-primary">Data de Vencimento</th>
                <th class="bg-primary">Valor</th>
                <th class="bg-primary">Estado</th>
                <th class="bg-primary">Acção</th>
              </tr>
            </thead>
            <tbody>

                @foreach ($clientes as $cliente)
                    <tr class="accordion-toggle collapsed" id="c-2474" data-toggle="collapse" data-parent="#c-2474" href="#collap-2474">
                    <td>{{$cliente->id}}</td>
                    <td class="text-left">{{$cliente->nome}}</td>
                    <td>{{$cliente->contacto}}</td>
                    <td class="text-center">0000-00-00</td>
                    <td>{{$cliente->multa}}</td>
                    <td><span class="badge badge-pill badge-danger mr-2">Não Pago</span><small class="text-muted"></small></td>
                    <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="text-muted sr-only">Acção</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="{{route('multa.show', $cliente->id)}}">ver mais</a>
                        <a class="dropdown-item" href="#">Apagar</a>
                        <a class="dropdown-item" href="{{route('cliente.show', $cliente->id)}}">Perfil</a>
                    </div>
                    </td>
                </tr>
                @endforeach

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection