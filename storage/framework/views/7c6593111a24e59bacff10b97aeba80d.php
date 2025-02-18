<?php $__env->startSection('title', 'Definições'); ?>

<?php $__env->startSection('conteudo'); ?>

<div class="col-12">
    <div class="row my-4">
      <div class="col-6 col-lg-3">
        <div class="card shadow mb-4">
          <div class="card-body">
            <i class="fe fe-info fe-32 text-primary"></i>
            <a href="<?php echo e(route('home.index')); ?>">
              <h3 class="h5 mt-4 mb-1">Começando</h3>
            </a>
            <p class="text-muted">Teu ponto de partida</p>
          </div>
        </div>
      </div>
      <div class="col-6 col-lg-3">
        <div class="card shadow mb-4">
          <div class="card-body">
            <i class="fe fe-help-circle fe-32 text-success"></i>
            <a href="<?php echo e(route('faqs')); ?>">
              <h3 class="h5 mt-4 mb-1">FAQs</h3>
            </a>
            <p class="text-muted">Perguntas frequentes</p>
          </div>
        </div>
      </div>


       <div class="col-6 col-lg-3">
        <div class="card shadow">
          <div class="card-body">
            <i class="fe fe-alert-triangle fe-32 text-danger"></i>
            <a href="<?php echo e(route('cliente.inativos')); ?>">
              <h3 class="h5 mt-4 mb-1">Inativos</h3>
            </a>
            <p class="text-muted">Podes restaurar Clientes</p>
          </div>
        </div>
      </div>

      <div class="col-6 col-lg-3">
        <div class="card shadow mb-4">
          <div class="card-body">
            <i class="fe fe-star fe-32 text-warning"></i>
            <a href="#">
              <h3 class="h5 mt-4 mb-1">Sobre</h3>
            </a>
            <p class="text-muted">Sobre o criador do sistema</p>
          </div>
        </div>
      </div>

     
    </div> 
    </div>
    
</div>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('layout.container.pagina', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\6. ENGENHARIA\Projectos\WEB\LARAVEL\Projectos Pessoais\TV-CABO\tv-cabo\resources\views/definicao.blade.php ENDPATH**/ ?>