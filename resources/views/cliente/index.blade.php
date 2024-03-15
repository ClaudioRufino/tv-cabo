@extends('layout.container.pagina')
@section('title', 'Clientes')

@section('conteudo')

        <div class="col-12">
            <div class="row my-4">
                <!-- Small table -->
                <div class="col-md-12">
                    <h4 class="page-title text-center">Lista dos Clientes</h4>
                    <p class="mb-3 text-center">A tabela abaixo apresenta a lista geral de todos os clientes</p>
                    <div class="card shadow">
                        <div class="card-body">
                            <!-- table -->
                            
                      <table class="table table-hover table-borderless border-v">
                        <thead class="thead-dark">
                          <tr>
                            <th class="bg-info">Id</th>
                            <th class="bg-info">Foto</th>
                            <th class="bg-info">Nome</th>
                            <th class="bg-info">Telefone</th>
                            <th class="bg-info">Género</th>
                            <th class="bg-info">Rua</th>
                            <th class="bg-info">Acção</th>
                          </tr>
                        </thead>
                        <tbody>
                            
                            @foreach ($clientes as $cliente)
                                <tr>
                                    <td>{{$cliente->id}}</td>
                                    <td>
                                        <div class="avatar avatar-md">
                                            <img src="{{$cliente->foto}}" alt="..." class="avatar-img rounded-circle">
                                        </div>
                                    </td>
                                    <td>{{$cliente->nome}}</td>
                                    <td>{{$cliente->contacto}}</td>
                                    <td>{{$cliente->genero}}</td>
                                    <td>{{$cliente->endereco->descricao}}</td>
                                    <td>
                                        <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="text-muted sr-only">Acção</span>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                          <a class="dropdown-item" href="{{route('cliente.edit', $cliente->id)}}">Editar</a>
                                          <form action="{{route('cliente.destroy', $cliente->id)}}" method="post" class="form_apagar">
                                              @csrf
                                              @method('DELETE')
                                              <input type="hidden" name="id_cliente" class="cliente_id" value="{{ $cliente->id }}">
                                              <button type="submit" class="apagar-button dropdown-item" data-cliente-id="{{ $cliente->id}}">Apagar</button>
                                          </form>
                                          <a class="dropdown-item" href="{{route('cliente.show', $cliente->id)}}">Perfil</a>
                                    </div>
                                    </td>
                                </tr>
                          
                          @endforeach
                          
                        </tbody>
                      </table>
                      <div class="pagination">
                        {{ $clientes->links() }}
                      </div>
                    </div>
                  </div>
                </div> <!-- simple table -->
              </div> <!-- end section -->
        </div>

    <script>
    
    const apagarButtons = document.querySelectorAll('.apagar-button');

    apagarButtons.forEach(button => {
      button.addEventListener('click', function(e) {
        var form = button.closest('form');
        e.preventDefault();

        var input_id = form.querySelector('.cliente_id');
        cliente_id = Number(input_id.value);

        linha =  input_id.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode;
        linha_index = input_id.parentNode.parentNode.parentNode.parentNode.rowIndex; 

        apaga_linha = linha.deleteRow(linha_index);

        async function clientes(){
            const response = await fetch('http://localhost:8000/api/clientes/'+cliente_id,
            {
                method:'PUT',
                headers: {
                    'Accept': 'application/json'
                }
            });
            const clientes = await response.json();
            return clientes;
        }

        const cliente = clientes();

        cliente.then(
            clientes=>{
                console.log(clientes);
            }
        );

        });
    });

    


    </script>

@endsection