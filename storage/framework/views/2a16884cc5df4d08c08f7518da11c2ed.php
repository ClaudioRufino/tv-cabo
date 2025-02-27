<?php $__env->startSection('title', 'Pedido'); ?>



<?php $__env->startSection('conteudo'); ?>

<div class="col-12 col-lg-10 col-xl-8">
    <h2 class="h3 mb-4 page-title">Pedido</h2>
    <div class="my-4">
      
      <form action="<?php echo e(route('pedido.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="row mt-5 align-items-center">
          <div class="col">
            <div class="row mb-4">
              <div class="col-md-10">
                <p class="text-muted"> É permitido que se faça pedido em relação ao pagamento, para se evitar penalização de multa por falta de pagamento no tempo devido.
                    Esse pedido deve ser feito com responsabilidade, pois pedidos sem uma razão convicentes deverão não serem atendidos. </p>
              </div>
            </div>
          </div>
        </div>
        <hr class="my-4">
        <div class="form-row">
          <div class="form-group col-md-2">
            <label for="cliente_id">Id</label>
            <input type="text" id="cliente_id" class="form-control" placeholder="" name="cliente_id" required>
          </div>
          <div class="form-group col-md-6">
            <label for="lastname">Assunto</label>
            <input type="text" id="lastname" class="form-control" placeholder="" name="assunto" required>
          </div>

          <div class="form-group col-md-4">
            <label for="data">Data do Pagamento</label>
            <input type="date" class="form-control" value="<?php echo e(date('Y-m-d')); ?>" id="data" name="data">
          </div>

        </div>

        <div class="form-group">
            <label for="descricao">Descrição do pedido</label>
            <textarea class="form-control" name="descricao" id="descricao" cols="30" rows="4" placeholder="..."></textarea>
        </div>

       <div class="text-right">
            <button type="submit" class="btn btn-primary">Fazer Pedido</button>
       </div>

        <hr class="my-4">
          
      </form>
    </div> 
  </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.container.pagina', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\claud\OneDrive\Desktop\Projectos\tv-cabo\resources\views/pedido/create.blade.php ENDPATH**/ ?>