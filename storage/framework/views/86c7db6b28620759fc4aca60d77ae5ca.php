
<?php $__env->startSection('title', 'Clientes'); ?>

<?php $__env->startSection('conteudo'); ?>

        <div class="col-12">
            <div class="row my-4">
                <!-- Small table -->
                <div class="col-md-12">
                    <h4 class="page-title text-center">Lista dos Clientes</h4>
                    <p class="mb-3 text-center">A tabela abaixo apresenta a lista geral de todos os clientes</p>
                    <div class="card shadow">
                        <div class="card-body">
                            
                      <table class="table table-hover table-borderless border-v">
                        <thead class="thead-dark">
                          <tr>
                            <th class="bg-primary">Id</th>
                            <th class="bg-primary">Foto</th>
                            <th class="bg-primary">Nome</th>
                            <th class="bg-primary">Telefone</th>
                            <th class="bg-primary">Género</th>
                            <th class="bg-primary">Rua</th>
                            <th class="bg-primary">Acção</th>
                          </tr>
                        </thead>
                        <tbody>
                            
                            <?php $__currentLoopData = $clientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cliente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($cliente->id); ?></td>
                                    <td>
                                        <div class="avatar avatar-md">
                                            <img src="<?php echo e($cliente->foto); ?>" alt="..." class="avatar-img rounded-circle">
                                        </div>
                                    </td>
                                    <td><?php echo e($cliente->nome); ?></td>
                                    <td><?php echo e($cliente->contacto); ?></td>
                                    <td><?php echo e($cliente->genero); ?></td>
                                    <td><?php echo e($cliente->endereco->descricao); ?></td>
                                    <td>
                                        <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="text-muted sr-only">Acção</span>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                          <a class="dropdown-item" href="<?php echo e(route('cliente.edit', $cliente->id)); ?>">Editar</a>
                                          <button type="button" data-id="<?php echo e($cliente->id); ?>" class="apagar-button dropdown-item" data-toggle="modal" data-target="#varyModal">Apagar</button>
                                          <a class="dropdown-item" href="<?php echo e(route('cliente.show', $cliente->id)); ?>">Perfil</a>
                                        </div>

                                    </td>
                                </tr>
                          
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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
                                        <label for="recipient-name" class="ml-4 mt-4">Deseja realmente eliminar o cliente?</label>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Cancelar</button>
                                        <form  id="modal-delete-form" action="#" method="POST">
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

                      <div class="pagination">
                        <?php echo e($clientes->links()); ?>

                      </div>

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
            deleteForm.action = `/cliente/${clienteId}`;
        });
    });
});

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.container.pagina', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\6. ENGENHARIA\Projectos\WEB\LARAVEL\Projectos Pessoais\TV-CABO\tv-cabo\resources\views/cliente/index.blade.php ENDPATH**/ ?>