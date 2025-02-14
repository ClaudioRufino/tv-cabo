<?php $__env->startSection('title', 'Pagamento'); ?>

<?php $__env->startSection('conteudo'); ?>

<div class="col-12" style="border: 1px solid ble">
    <h2 class="page-title">Editando Pagamento</h2>
    <p class="text-muted">Nesta seção poderá editar o pagamento mensal do cliente.</p>
    <div class="card shadow mb-4">
      <div class="card-header">
        <strong class="card-title">TVCJ - Mensalidade </strong>
      </div>
      <div class="card-body" style="">

        <form method="POST" action="<?php echo e(route('pagamento.update', ['pagamento'=>$pagamento->id_pagamento])); ?>">
          <?php echo csrf_field(); ?>
          <?php echo method_field('PUT'); ?>
        <div class="row">

          <div class="col-md-6">

            <div class="form-group mb-3">
                <label for="example-palaceholder">Código do Cliente</label>
                <select class="form-control" id="cliente_id" name="cliente_id">
                    <?php for($i = 1; $i <= 500; $i++): ?>
                        <option value="<?php echo e($i); ?>" <?php if($i == $pagamento->id): ?> selected <?php endif; ?>><?php echo e($i); ?></option>
                    <?php endfor; ?>
                </select>
              </div>

            <div class="form-group mb-3">
              <label for="simpleinput">Ano</label>
              <select class="form-control" id="ano" name="ano"> 
                <?php for($i = 2020; $i <= 2030; $i++): ?>
                    <option value="<?php echo e($i); ?>" <?php if($i == $pagamento->ano): ?> selected <?php endif; ?>><?php echo e($i); ?></option>
                <?php endfor; ?>
              </select>
            </div>

            <div class="form-group mb-3">
              <label for="example-email">Mes</label>
              <select class="form-control" id="mes" name="mes">
                  <?php for($i = 1; $i <= 12; $i++): ?>
                      <option value="<?php echo e($i); ?>" <?php if($i == $pagamento->mes): ?> selected <?php endif; ?>>
                          <?php switch($i):
                              case (1): ?> <?php echo e("Janeiro"); ?> <?php break; ?>
                              <?php case (2): ?> <?php echo e("Fevereiro"); ?> <?php break; ?>
                              <?php case (3): ?> <?php echo e("Março"); ?> <?php break; ?>
                              <?php case (4): ?> <?php echo e("Abril"); ?> <?php break; ?>
                              <?php case (5): ?> <?php echo e("Maio"); ?> <?php break; ?>
                              <?php case (6): ?> <?php echo e("Junho"); ?> <?php break; ?>
                              <?php case (7): ?> <?php echo e("Julho"); ?> <?php break; ?>
                              <?php case (8): ?> <?php echo e("Agosto"); ?> <?php break; ?>
                              <?php case (9): ?> <?php echo e("Setembro"); ?> <?php break; ?>
                              <?php case (10): ?><?php echo e("outubro"); ?> <?php break; ?>
                              <?php case (11): ?><?php echo e("Novembro"); ?> <?php break; ?>
                              <?php case (12): ?><?php echo e("Dezembro"); ?> <?php break; ?>
                          <?php endswitch; ?>
                      </option>
                  <?php endfor; ?>
                
              </select>
            </div>

            <div class="form-group mb-3">
              <label for="example-password">Valor</label>
              <select class="form-control" id="valor_pagamento" name="valor">
                <?php for($i = 1000; $i <= 5000; $i = $i + 500): ?>
                    <option value="<?php echo e($i); ?>" <?php if($i == $pagamento->valor): ?> selected <?php endif; ?>><?php echo e($i); ?></option>
                <?php endfor; ?>
              </select>
            </div>

            <div class="form-group mb-3">
                <div class="alert alert-danger text-center" role="alert" id="mensagem" style="display: none"> </div>
            </div>

          </div> 

          <div class="col-md-6 text-center" style="border:1px solid #ddd"> 
              <img 
                  src="<?php echo e(url('light/assets/images/pagamento.jpg')); ?>" 
                  id="img_pagamento" 
                  alt="imagem descrevendo pagamento de mensalidade"
                  style="width:70%; height:290px;border-radius:5px; margin-top:20px">
              <br>
              <button type="submit" class="btn mb-2 btn-primary btn-lg btn-block">Atualizar pagamento</button>
          </div> 
          
        </div>
        </form>

        
      </div>
    </div> 

  </div>

  <?php $__env->stopSection(); ?>

  


<?php echo $__env->make('layout.container.pagina', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\claud\OneDrive\Desktop\Projectos\tv-cabo\resources\views/pagamento/edit.blade.php ENDPATH**/ ?>