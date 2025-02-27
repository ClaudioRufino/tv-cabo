<?php $__env->startSection('title', 'Multas do cliente'); ?>

<?php $__env->startSection('conteudo'); ?>
    <div class="col-12">
        <div class="row my-4">
            <!-- Small table -->
            <div class="col-md-12">
                <h4 class="page-title text-center">Multas</h4>
                <p class="text-center">A table abaixo demostra a multa imposta para o seguinte cliente!</p>
                <div class="card shadow">
                    <div class="card-body">
                    <!-- table -->
                    <table class="table table-hover table-borderless border-v" id="dataTable-1">
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
                        
                        <?php $__currentLoopData = $multas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $multa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($cliente->id); ?></td>
                                <td><?php echo e($cliente->nome); ?></td>
                                <td><?php echo e($multa->valor); ?></td>
                                <td><?php echo e($multa->descricao); ?></td>
                                
                                <td><?php echo e($multa->data_emissao); ?></td>
                                <td><span class="dot dot-lg bg-danger mr-2"></span>NP</td>
                                <td>
                                    <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="text-muted sr-only">Action</span>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="<?php echo e(route('pagamentoMultaId', ['cliente_id'=> $cliente->id, 'multa_id'=> $multa->id])); ?>">Pagar</a>
                                        <a class="dropdown-item" href="<?php echo e(route('cliente.show', $cliente->id)); ?>">Perfil</a>
                                </div>
                                </td>
                            </tr>
                        
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                    </tbody>
                    </table>
                </div>
                </div>
            </div>
            </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.container.pagina', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\claud\OneDrive\Desktop\Projectos\tv-cabo\resources\views/multa/show.blade.php ENDPATH**/ ?>