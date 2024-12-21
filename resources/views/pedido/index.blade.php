@extends('layout.container.pagina')
@section('title', 'Pedidos de clientes')

@section('conteudo')
    <div class="col-12">
        <div class="row my-4">
            <div class="col-md-12">
                <h2 class="h4 mb-1 text-center">Pedidos</h2>
                <p class="mb-3 text-center">A tabela abaixo apresenta todos os pedidos feito pelos clientes</p>

                 <form action="{{route('pedido.create')}}"  method="get"   class="text-right"
                    style=" position: relative; float:right; margin-top:22px; height:50px; margin-left:4px; ">

                    <button class="btn btn-primary"><i class="fe fe-plus"></i></button>
                </form>

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
                                        <span class="text-muted sr-only">Acção</span>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <button data-id="{{$cliente->id}}" class="apagar-button dropdown-item" data-toggle="modal" data-target="#varyModal">Apagar</button>
                                        <a class="dropdown-item" href="{{route('cliente.show', $cliente->id)}}">Perfil</a>
                                </div>
                                </td>
                            </tr>
                        
                        @endforeach

                        <div class="modal fade" id="varyModal" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="varyModalLabel">Eliminar</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>

                                    <div class="form-group">
                                        <label for="recipient-name" class="ml-4 mt-4">Deseja realmente eliminar o pedido?</label>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Cancelar</button>
                                        <form  id="modal-delete-form" action="#" method="POST">
                                                @csrf
                                                @method('DELETE')
                                            <button type="submit" class="btn btn-danger mb-2">Eliminar</button>
                                        </form>
                                </div>
                            </div>
                            </div>
                        </div>
                        
                    </tbody>
                    </table>
                </div>
                </div>
            </div> 
            </div>
    </div>


<script>


    document.addEventListener('DOMContentLoaded', function () {
    // Seleciona todos os botões "Apagar"
    const apagarButtons = document.querySelectorAll('.apagar-button');

    // Seleciona o formulário dentro do modal
    const deleteForm = document.getElementById('modal-delete-form');

    // Adiciona evento de clique a cada botão "Apagar"
    apagarButtons.forEach(button => {
        button.addEventListener('click', function () {
            // Recupera o ID do cliente do botão clicado
            const clienteId = button.getAttribute('data-id');

            // Atualiza o atributo "action" do formulário com o ID do cliente
            deleteForm.action = `/pedido/${clienteId}`;
        });
    });
});

</script>

@endsection

