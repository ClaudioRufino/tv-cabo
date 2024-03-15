
@include('layout.componentes.links_cima')



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

                <tbody id="conteudo">
                  {{-- Tabela criada de forma dinámica com Javascript --}}
                </tbody>

              </table>
              
            </div>
          </div>
        </div> <!-- simple table -->
      </div> <!-- end section -->
</div>



<div class="container">
    <nav aria-label="Page navigation example">
        <ul class="pagination" id="paginator">
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>
            <li class="page-item">
                <a class="page-link" href="#" data-page="1">1</a>
            </li>
            <li class="page-item active">
                <a class="page-link" href="#" data-page="2">2</a>
            </li>
            <li class="page-item">
                <a class="page-link" href="#" data-page="3">3</a>
            </li>
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
            </li>
        </ul>
    </nav>
</div>

<script>
    window.onload = function(){

        var conteudo = document.getElementById('conteudo');
        var paginator = document.getElementById('paginator');

        listaInicial(2);

        paginator.addEventListener('click', function(event){
            var numPagina = Number(event.target.getAttribute('data-page'));

            conteudo.innerHTML = "";

            fetch('http://localhost:8000/api/clientesPage/'+ numPagina,
            {
                method:'get',
                headers: {
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                data.forEach(cliente => {

                    var novaLinha = document.createElement('tr');

                    novaLinha.innerHTML = `
                    <td>${cliente.id}</td>
                    <td>
                        <div class="avatar avatar-md">
                            <img src="${cliente.foto}" alt="..." class="avatar-img rounded-circle">
                        </div>
                    </td>
                    <td>${cliente.nome}</td>
                    <td>${cliente.contacto}</td>
                    <td>${cliente.genero}</td>
                
                    <td>
                        <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="text-muted sr-only">Acção</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="/cliente/edit/${cliente.id}">Editar</a>
                            <form action="/cliente/destroy/${cliente.id}" method="post" class="form_apagar">
                                <input type="hidden" name="_token" value="token_gerado_pelo_laravel">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="id_cliente" class="cliente_id" value="${cliente.id}">
                                <button type="submit" class="apagar-button dropdown-item" data-cliente-id="${cliente.id}">Apagar</button>
                            </form>
                            <a class="dropdown-item" href="/cliente/show/${cliente.id}">Perfil</a>
                        </div>
                    </td>
                `;

                conteudo.appendChild(novaLinha);
                })
            })
            .catch(error => {
                console.error('Erro ao carregar dados da página ' + numPagina, error);
            });
            
        })
        
}

function listaInicial(num){
        var numPagina = Number(num);

            fetch('http://localhost:8000/api/clientesPage/'+ numPagina,
            {
                method:'get',
                headers: {
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                // Atualize o conteúdo com os dados carregados
                data.forEach(cliente => {

                    // Criar uma nova linha de tabela (tr)
                    var novaLinha = document.createElement('tr');

                    novaLinha.innerHTML = `
                    <td>${cliente.id}</td>
                    <td>
                        <div class="avatar avatar-md">
                            <img src="${cliente.foto}" alt="..." class="avatar-img rounded-circle">
                        </div>
                    </td>
                    <td>${cliente.nome}</td>
                    <td>${cliente.contacto}</td>
                    <td>${cliente.genero}</td>
                
                    <td>
                        <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="text-muted sr-only">Acção</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="/cliente/edit/${cliente.id}">Editar</a>
                            <form action="/cliente/destroy/${cliente.id}" method="post" class="form_apagar">
                                <input type="hidden" name="_token" value="token_gerado_pelo_laravel">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="id_cliente" class="cliente_id" value="${cliente.id}">
                                <button type="submit" class="apagar-button dropdown-item" data-cliente-id="${cliente.id}">Apagar</button>
                            </form>
                            <a class="dropdown-item" href="/cliente/show/${cliente.id}">Perfil</a>
                        </div>
                    </td>
                `;

                // Adicionar a nova linha à tabela (supondo que sua tabela tenha um ID, por exemplo, 'tabelaClientes')
                conteudo.appendChild(novaLinha);
                console.log('Sucesso!');
                // console.log(cliente.nome);
                })
                // texto.innerHTML = data;
            })
            .catch(error => {
                console.error('Erro ao carregar dados da página ' + numPagina, error);
            });
    }

    

</script>

@include('layout.componentes.footer')