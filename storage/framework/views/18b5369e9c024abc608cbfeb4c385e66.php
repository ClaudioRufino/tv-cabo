<?php $__env->startSection('title', 'Perfil'); ?>


<?php $__env->startSection('conteudo'); ?>
    
<div class="col-12">
    <h2 class="h3 mb-4 page-title">Perfil</h2>
    <div class="row mt-5 align-items-center">
      <div class="col-md-3 text-center mb-5">
        <div class="avatar avatar-xl">
          <img src="<?php echo e(url($cliente->foto)); ?>" alt="Avatar do cliente" class="avatar-img rounded-circle">
        </div>
      </div>
      <div class="col">
        <div class="row align-items-center">
          <div class="col-md-7">
            <h4 class="mb-1"><?php echo e($cliente->nome_abreviado); ?></h4>
            <p class="small mb-3"><span class="badge badge-dark">Luanda, Angola</span></p>
          </div>
        </div>
        <div class="row mb-4">
          <div class="col-md-7">
            <p class="text-mute"> 
                <?php echo e($cliente->nome); ?> é um/a cliente que está connosco desde <?php echo e($cliente->data_contrato); ?>. Seu pagamento é feito no dia <?php echo e($cliente->dia_pagamento); ?> de todos os meses. Seu contacto é <?php echo e($cliente->contacto); ?>. Somos muito gratos por té-lo como cliente.
            </p>
          </div>
          <div class="col">
            <p class="small mb-0 text-mute"><b>Linha</b> - <?php echo e($cliente->linha); ?></p>
            <p class="small mb-0 text-mute"><b>Rua</b> - <?php echo e($cliente->rua); ?></p>
            <p class="small mb-0 text-mute"><b>Número da casa</b> - <?php echo e($cliente->num_casa); ?></p>
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
            <a href="<?php echo e(route('cliente.edit', $cliente->id)); ?>" class="d-flex justify-content-between text-muted"><span>Editar Cliente</span><i class="fe fe-chevron-right"></i></a>
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
            <a href="<?php echo e(route('pagamentoId', $cliente->id)); ?>" class="d-flex justify-content-between text-muted"><span>Efectuar Pagamento</span><i class="fe fe-chevron-right"></i></a>
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
            <a href="<?php echo e(route('pedido.show', $cliente->id)); ?>" class="d-flex justify-content-between text-muted"><span>Fazer Pedido</span><i class="fe fe-chevron-right"></i></a>
          </div> <!-- .card-footer -->
        </div> <!-- .card -->
      </div> <!-- .col-md-->
    </div> <!-- .row-->

    <h3>Situação</h3>
    <p class="text-mute">Neste item, relata-se sobre o estado do cliente quanto a questão de pagamento, e verificação de alguma multa imposta.</p>
    <div class="card-deck my-4">
      <div class="card mb-4 shadow">
        <div class="card-body text-center my-4">
          <a href="<?php echo e(route('divida.show', $cliente->id)); ?>">
            <h3 class="h5 mt-4 mb-0">Dívida</h3>
          </a>
          <p class="text-muted">contraída</p>
          <span class="h1 mb-0"><?php echo e($cliente->divida); ?></span>
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
          <a href="<?php echo e(route('multa.show', $cliente->id)); ?>">
            <h3 class="h5 mt-4 mb-0">Multa</h3>
          </a>
          <p class="text-muted">penalizada</p>
          <span class="h1 mb-0"><?php echo e($cliente->multa); ?></span>
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

    <h5 class="mb-3">Histórico de pagamento -  <?php echo e(date('Y')); ?></h5>
    <table class="table table-borderless table-striped">
      <thead>
        <tr role="row">
          <th class="bg-primary">Código</th>
          <th class="bg-primary">Data de Pagamento</th>
          <th class="bg-primary">Valor</th>
          <th class="bg-primary">Mes</th>
          <th class="bg-primary">Estado</th>
          <th class="bg-primary">Atendido por</th>
          <th class="bg-primary">Acção</th>
        </tr>
      </thead>
      <tbody>

        <?php $__currentLoopData = $cliente->pagamentos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pagamento): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td><?php echo e($pagamento->id); ?></td>
          <td><?php echo e($pagamento->data_pagamento); ?></td>
          <td><?php echo e($pagamento->valor); ?> kz</td>
          
          <?php switch($pagamento->mes):
              case (1): ?> <td><?php echo e("Janeiro"); ?></td> <?php break; ?>
              <?php case (2): ?> <td><?php echo e("Fevereiro"); ?></td> <?php break; ?>
              <?php case (3): ?> <td><?php echo e("Março"); ?></td> <?php break; ?>
              <?php case (4): ?> <td><?php echo e("Abril"); ?></td> <?php break; ?>
              <?php case (5): ?> <td><?php echo e("Maio"); ?></td> <?php break; ?>
              <?php case (6): ?> <td><?php echo e("Junho"); ?></td> <?php break; ?>
              <?php case (7): ?> <td><?php echo e("Julho"); ?></td> <?php break; ?>
              <?php case (8): ?> <td><?php echo e("Agosto"); ?></td> <?php break; ?>
              <?php case (9): ?> <td><?php echo e("Setembro"); ?></td> <?php break; ?>
              <?php case (10): ?> <td><?php echo e("Outubro"); ?></td> <?php break; ?>
              <?php case (11): ?> <td><?php echo e("Novembro"); ?></td> <?php break; ?>
              <?php case (12): ?> <td><?php echo e("Dezembro"); ?></td> <?php break; ?>
          <?php endswitch; ?>

          <td><span class="dot dot-lg bg-success mr-2"></span>Pago</td>
          <td>
            <?php echo e($pagamento->atendido_por); ?>

          </td>
          <td>
            <div class="dropdown">
              <button class="btn btn-sm dropdown-toggle more-vertical" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="sr-only">Action</span>
              </button>
              <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="<?php echo e(route('pagamento.editar', ['id'=> $cliente->id, 'ano'=> $pagamento->ano, 'mes'=> $pagamento->mes, 'valor'=>$pagamento->valor ] )); ?>">Editar</a>
                
                <form action="<?php echo e(route('pagamento.destroy', $pagamento->id)); ?>" method="post" class="form_apagar">
                  <?php echo csrf_field(); ?>
                  <?php echo method_field('DELETE'); ?>

                  <input type="hidden" name="id_pagamento" class="pagamento_id" value="<?php echo e($pagamento->id); ?>">
                  <button type="button" data-id="<?php echo e($pagamento->id); ?>" class="apagar-button dropdown-item" data-toggle="modal" data-target="#modalApagarPagamento">Apagar</button>

                </form>
                <a class="dropdown-item" href="<?php echo e(route('imprimirPagamento', ['id'=>$pagamento->id, 'nome'=>$cliente->nome])); ?>">Imprimir</a>
                <a class="dropdown-item" href="<?php echo e(route('pagamento.showP', ['id'=>$cliente->id, 'ano'=>date('Y')])); ?>">Ver mais</a>
              </div>
            </div>
          </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


        <div class="modal fade" id="modalApagarPagamento" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="varyModalLabel">Eliminar</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="ml-4 mt-4">Deseja realmente eliminar o registo de pagamento?</label>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Cancelar</button>
                        <form  id="modal-delete-pagamento" action="#" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger mb-2">Eliminar</button>
                        </form>
                </div>
            </div>
            </div>
        </div>

        

      </tbody>
    </table>
  </div> 

    <script>

        // Seleciona todos os botões "Apagar"
        const apagarButtons = document.querySelectorAll('.apagar-button');


        // Seleciona o formulário dentro do modal
        const deleteForm = document.getElementById('modal-delete-pagamento');

        /* */
        // Adiciona evento de clique a cada botão "Apagar"
        apagarButtons.forEach(button => {
            button.addEventListener('click', function () {
                // Recupera o ID do cliente do botão clicado
                const pagamentoId = button.getAttribute('data-id');

                // Atualiza o atributo "action" do formulário com o ID do cliente
                deleteForm.action = `/pagamento/${pagamentoId}`;
            });
        });

        


    //   const btn_apagar = document.querySelectorAll('.apagar-button');
    //   btn_apagar.forEach(button => {
    //   button.addEventListener('click', function(e) {
    //     var form = button.closest('form');
    //     e.preventDefault();

    //     var input_id = form.querySelector('.pagamento_id');
    //     pagamento_id = Number(input_id.value);

    //     linha =  input_id.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode;
    //     linha_index = input_id.parentNode.parentNode.parentNode.parentNode.rowIndex; 

    //     apaga_linha = linha.deleteRow(linha_index);

    //     async function pagamento(){
    //         const response = await fetch('http://localhost:8000/api/pagamento/'+pagamento_id,
    //         {
    //             method:'DELETE',
    //             headers: {
    //                 'Accept': 'application/json'
    //             }
    //         });
    //         const pagamento = await response.json();
    //         return pagamento;
    //     }

    //     const cliente = pagamento();

    //     cliente.then(
    //         pagamento=>{
    //             console.log(pagamento);
    //         }
    //     );
       

    //     });
    // });


    </script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout.container.pagina', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\claud\OneDrive\Desktop\Projectos\tv-cabo\resources\views/cliente/show.blade.php ENDPATH**/ ?>