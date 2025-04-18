


<nav class="topnav navbar navbar-light">

      
      <button type="button" class="navbar-toggler text-mnuted mt-2 p-0 mr-3 collapseSidebar">
        <i class="fe fe-menu navbar-toggler-icon"></i>
      </button>

      
      <form class="form-inline mr-auto searchform text-muted" method="PUT" id="form_pesquisa">
        <input class="form-control mr-sm-2 bg-transparent border-0 pl-4 text-dark" 
          type="search"
          placeholder="Pesquise cliente..." 
          aria-label="Search"
          id="id_cliente"
          name="id_cliente">
        <p></p>
        <span id="pesquisa_mensagem" class="error-message"></span>
      </form>
      

      <ul class="nav">

        
        <li class="nav-item">
          <a class="nav-link text-primary my-2" href="./#" data-toggle="modal" data-target=".modal-shortcut">
            <span class="fe fe-grid fe-16"></span>
          </a>
        </li>

        
        <li class="nav-item nav-notif">
          <a class="nav-link text-primary my-2" href="./#" data-toggle="modal" data-target=".modal-notif">
            <span class="fe fe-bell fe-16"></span>
            <span id="ponto_notificacao"></span>
            
          </a>
        </li>

        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-dark pr-0" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="avatar avatar-sm mt-2">
                <?php
                    $user = Auth::user();
                ?>

                <?php if($user->foto == "light/assets/avatars/admin/padrao.png"): ?>
                    <img class="avatar-img rounded-circle" src="<?php echo e(url($user->foto)); ?>" alt="Avatar representado o Usuário Activo">
                <?php else: ?>
                    <img class="avatar-img rounded-circle" src="<?php echo e(url('light/assets/avatars/admin/'. App\Models\User::find(Auth::id())->foto)); ?>" alt="Avatar representado o Usuário Activo">
                <?php endif; ?>

            </span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
            <form method="POST" action="<?php echo e(route('logout')); ?>" style="margin:0">  
              <?php echo csrf_field(); ?>
              <button type="submit" class="dropdown-item">Sair</button>
            </form>
          </div>
        </li>

      </ul>
    </nav>

      <div class="modal fade modal-shortcut modal-slide" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="defaultModalLabel">Atalhos</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body px-5">
              <div class="row align-items-center">
                <div class="col-6 text-center">
                  <a href="<?php echo e(route('home.index')); ?>" style="color:white">
                    <div class="squircle bg-success justify-content-center">
                      <i class="fe fe-home fe-32 align-self-center text-white"></i>
                    </div>
                  </a>
                  <p>Home</p>
                </div>
                <div class="col-6 text-center">
                  <a href="<?php echo e(route('cliente.index')); ?>" style="color:white">
                    <div class="squircle bg-primary justify-content-center">
                      <i class="fe fe-user fe-32 align-self-center text-white"></i>
                    </div>
                  </a>
                  <p>Clientes</p>
                </div>
              </div>
              <div class="row align-items-center">
                <div class="col-6 text-center">
                  <a href="<?php echo e(route('multa.index')); ?>" style="color:white">
                  <div class="squircle bg-primary justify-content-center">
                    <i class="fe fe-credit-card fe-32 align-self-center text-white"></i>
                  </div>
                  </a>
                  <p>Multas</p>
                </div>

                <div class="col-6 text-center">
                  <a href="<?php echo e(route('pagamento.create')); ?>" style="color:white">
                    <div class="squircle bg-primary justify-content-center">
                      <i class="fe fe-layers fe-32 align-self-center text-white"></i>
                    </div>
                  </a>
                  <p>Pagamento</p>
                </div>

              </div>
              <div class="row align-items-center">
                <div class="col-6 text-center">
                  <a href="<?php echo e(route('calendario')); ?>" style="color:white">
                    <div class="squircle bg-primary justify-content-center">
                      <i class="fe fe-calendar fe-32 align-self-center text-white"></i>
                    </div>
                  </a>
                  <p>Calendario</p>
                </div>
                <div class="col-6 text-center">
                  <a href="<?php echo e(route('home.definicao')); ?>" style="color:white">
                    <div class="squircle bg-primary justify-content-center">
                      <i class="fe fe-settings fe-32 align-self-center text-white"></i>
                    </div>
                  </a>
                  <p>definições</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


      <div class="modal fade modal-notif modal-slide" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="defaultModalLabel">Notificações</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">

              <div class="list-group list-group-flush my-n3">
                <div class="list-group-item bg-transparent">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <span class="fe fe-users fe-24"></span>
                    </div>
                    <div class="col">
                      <small><strong>Clientes a pagar</strong></small>
                      <div class="my-0 text-muted small"> 
                        <small class="badge badge-pill badge-light text-muted"><?php echo e(date('Y-m-d')); ?></small>
                        <a href="<?php echo e(route('notificacao.index')); ?>"> Ver lista </a></div>
                    </div>
                  </div>
                </div>

                <div class="list-group-item bg-transparent">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <span class="fe fe-settings fe-24"></span>
                    </div>
                    <div class="col">
                      <small><strong>Informações do sistema</strong></small>
                      <div class="my-0 text-muted small">
                        <small class="badge badge-pill badge-light text-muted"><?php echo e(date('Y-m-d')); ?></small>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="list-group-item bg-transparent">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <span class="fe fe-link fe-24"></span>
                    </div>
                    <div class="col">
                      <small><strong>Outras notificações</strong></small>
                      <div class="my-0 text-muted small">
                        <small class="badge badge-pill badge-light text-muted"><?php echo e(date('Y-m-d')); ?></small>
                      </div>
                    </div>
                  </div>
                </div> 

              </div> 
            </div>
          </div>
        </div>
      </div>

      <script>
         document.getElementById('form_pesquisa').addEventListener('submit', function(event) {
        // Impedir o envio padrão do formulário
        event.preventDefault();

        // Pegar o valor do input
        var cliente = document.getElementById('id_cliente').value;
        
        if( /^[0-9]+$/.test(cliente)){ // Expressão regular para definir só valores numéricos
            
            const valor = existeCliente(cliente); /* Verifique se o valor digitado é id de um cliente do sistema*/
                valor.then(

                    valor=>{

                        const resposta = valor.existe; // Pega o valor obtido da requisição
                        switch (resposta) {
                        case 0:
                                pesquisa_info = document.getElementById('pesquisa_mensagem');
                                pesquisa_info.innerHTML = "Cliente Inativo!";
                        break;

                        case 1:
                            var actionUrl = "http://127.0.0.1:8000/cliente/" + cliente;
                            window.location.href = actionUrl;
                        break;

                        case 2:
                                pesquisa_info = document.getElementById('pesquisa_mensagem');
                                pesquisa_info.innerHTML = "Cliente não existente!";
                        break;
                        
                        }
                        
                    }
                );
            }
        
        else{
              pesquisa_info = document.getElementById('pesquisa_mensagem');
              pesquisa_info.innerHTML = "Só é permitido valor numérico!";
        }
    });

    async function existeCliente (id){

        try{
            const response = await fetch('http://localhost:8000/api/cliente/'+ id);
            if (response.ok) {
                const cliente = await response.json();
                return cliente;
            } else {
                console.error('Erro ao buscar cliente:', response.statusText);
            }
            
        }catch(e){
            console.log("Erro:" + e);
        }

    }

    $pagou = clientesPagandoHoje();

    $pagou.then(valor=>{

        if(valor.estado == true){
            let divPonto = document.getElementById("ponto_notificacao");

            if (!divPonto.classList.contains("dot", "dot-md", "bg-success")) {
                divPonto.classList.add("dot", "dot-md", "bg-success");
            }
        }
        
    });

    async function clientesPagandoHoje() {
        try{
            const response = await fetch('http://localhost:8000/api/clientesPagandoHoje');
            if (response.ok) {
                const estado = await response.json();
                return estado;
            } else {
                console.error('Erro ao verificar os clientes:', response.statusText);
            }
            
        }catch(e){
            console.log("Erro:" + e);
        }
    }

</script>



<?php /**PATH D:\6. ENGENHARIA\Projectos\WEB\LARAVEL\Projectos Pessoais\TV-CABO\tv-cabo\resources\views/layout/componentes/header.blade.php ENDPATH**/ ?>