<?php $__env->startSection('title', 'Pedido'); ?>



<?php $__env->startSection('conteudo'); ?>

<div class="col-12 col-lg-10 col-xl-8">
    <h2 class="h3 mb-4 page-title">Pedido</h2>
    <div class="my-4">
      
      <form action="<?php echo e(route('pedido.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
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
                <p class="small mb-3"><span class="badge badge-dark">New York, USA</span></p>
              </div>
            </div>
            <div class="row mb-4">
              <div class="col-md-7">
                <p class="text-muted">
                    <?php echo e($cliente->nome); ?> é um/a cliente que está connosco desde <?php echo e($cliente->data_contrato); ?>. Seu pagamento é feito no dia <?php echo e($cliente->dia_pagamento); ?> de todos os meses. Seu contacto é <?php echo e($cliente->contacto); ?>. Somos muito gratos por té-lo como cliente.
                </p>
              </div>

              <div class="col">
                <p class="small mb-0 text-muted"><b>Linha</b> - <?php echo e($cliente->linha); ?></p>
                <p class="small mb-0 text-muted"><b>Rua</b> - <?php echo e($cliente->rua); ?></p>
                <p class="small mb-0 text-muted"><b>Número da casa</b> - <?php echo e($cliente->num_casa); ?></p>
              </div>

            </div>
          </div>
        </div>
        <hr class="my-4">
        <div class="form-row">
          <div class="form-group col-md-2">
            <label for="cliente_id">Código</label>
            <input type="text" id="cliente_id" class="form-control" name="cliente_id" value="<?php echo e($cliente->id); ?>" readonly>
          </div>
          <div class="form-group col-md-6">
            <label for="lastname">Assunto</label>
            <input type="text" id="lastname" class="form-control" placeholder="" name="assunto" required>
          </div>

          <div class="form-group col-md-4">
            <label for="data">Data do Pagamento</label>
            <input type="date" class="form-control" id="data" name="data" value="<?php echo e(date('Y-m-d')); ?>" required>
          </div>

        </div>

        <div class="form-group text-center">
            <label for="descricao">Descrição do pedido</label>
            <textarea class="form-control" name="descricao" id="descricao" cols="30" rows="4" placeholder="...">

            </textarea>
        </div>

       <div class="text-right">
            <button type="submit" class="btn btn-primary">Fazer Pedido</button>
       </div>

        <hr class="my-4">
          
      </form>
    </div>
  </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.container.pagina', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\claud\OneDrive\Desktop\Projectos\tv-cabo\resources\views/pedido/show.blade.php ENDPATH**/ ?>