@extends('layout.container.pagina')
@section('title', 'Dívidas')

@section('conteudo')
    <div class="col-12">
        <div class="row my-4">
            <!-- Small table -->
            <div class="col-md-12">
                <h4 class="page-title text-center">Dívidas do Cliente</h4>
                <p class="mb-3 text-center">A tabela abaixo apresenta a lista geral de todos as dívidas do cliente</p>
                <div class="card shadow">
                    <div class="card-body">
                    <!-- table -->
                    <table class="table table-hover table-borderless border-v">
                    <thead>
                        <tr>
                        <th class="bg-primary">ID</th>
                        <th class="bg-primary">Nome</th>
                        <th class="bg-primary">Ano</th>
                        <th class="bg-primary">Mes</th>
                        <th class="bg-primary">Valor</th>
                        <th class="text-center bg-primary">Estado</th>
                        <th class="bg-primary">Acção</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach ($dividas as $divida)
                            <tr>
                                <td>{{$cliente->id}}</td>
                                <td>{{$cliente->nome}}</td>
                                <td>{{$divida->ano}}</td>
                                @switch($divida->mes)
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
                                {{-- <td>{{$divida->mes}}</td> --}}
                                <td>{{$divida->valor}}</td>
                                <td class="text-center"><span class="dot dot-lg bg-danger mr-2"></span>Não-Pago</td>
                                <td>
                                    <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="text-muted sr-only">Action</span>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="{{route('pagamentoId', $cliente->id)}}">Pagar</a>
                                        <a class="dropdown-item" href="{{route('cliente.show', $cliente->id)}}">Perfil</a>
                                </div>
                                </td>
                            </tr>
                        
                        @endforeach
                        
                    </tbody>
                    </table>
                </div>
                </div>
            </div> <!-- simple table -->
            </div> <!-- end section -->
    </div>

{{-- <script>

   
</script> --}}

@endsection