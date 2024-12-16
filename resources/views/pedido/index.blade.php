@extends('layout.container.pagina')
@section('title', 'Pedidos de clientes')

@section('conteudo')
    <div class="col-12">
        <div class="row my-4">
            <!-- Small table -->
            <div class="col-md-12">
                <h2 class="h4 mb-1 text-center">Pedidos</h2>
                <p class="mb-3 text-center">A tabela abaixo apresenta todos os pedidos feito pelos clientes</p>
                <div class="card shadow">
                    <div class="card-body">
                    <!-- table -->
                    <table class="table table-hover table-borderless border-v">
                        <thead class="thead-dark">
                        <tr>
                        <th class="bg-primary">ID</th>
                        <th class="bg-primary">Nome</th>
                        <th class="bg-primary">Contacto</th>
                        <th class="bg-primary">Assunto</th>
                        <th class="bg-primary">Descrição</th>
                        <th class="bg-primary">Data</th>
                        <th class="bg-primary">Acção</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach ($clientes as $cliente)
                            <tr>
                                <td>{{$cliente->id}}</td>
                                <td>{{$cliente->nome}}</td>
                                <td>{{$cliente->contacto}}</td>
                                <td>{{$cliente->assunto}}</td>
                                <td>{{$cliente->descricao}}</td>
                                <td>{{$cliente->data}}</td>
                                <td>
                                    <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="text-muted sr-only">Action</span>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="">Apagar</a>
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