@extends('layout.container.pagina')
@section('title', 'Multas do cliente')

@section('conteudo')
    <div class="col-12">
        <div class="row my-4">
            <!-- Small table -->
            <div class="col-md-12">
                <h4 class="page-title text-center">Multas</h4>
                <p class="text-center">A table abaixo demostra a multa imposta para o seguinte cliente!</p>
                <div class="card shadow">
                    <div class="card-body">
                    <!-- table -->
                    <table class="table datatables" id="dataTable-1">
                    <thead>
                        <tr>
                        <th class="bg-primary">ID</th>
                        <th class="bg-primary">Nome</th>
                        <th class="bg-primary">Valor</th>
                        <th class="bg-primary">Descrição</th>
                        <th class="bg-primary">Data de Emissão</th>
                        <th class="bg-primary">Estado</th>
                        <th class="bg-primary">Acção</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach ($multas as $multa)
                            <tr>
                                <td>{{$cliente->id}}</td>
                                <td>{{$cliente->nome}}</td>
                                <td>{{$multa->valor}}</td>
                                <td>{{$multa->descricao}}</td>
                                
                                <td>{{$multa->data_emissao}}</td>
                                <td><span class="dot dot-lg bg-danger mr-2"></span>NP</td>
                                <td>
                                    <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="text-muted sr-only">Action</span>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="{{route('pagamentoMultaId', ['cliente_id'=> $cliente->id, 'multa_id'=> $multa->id])}}">Pagar</a>
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

@endsection