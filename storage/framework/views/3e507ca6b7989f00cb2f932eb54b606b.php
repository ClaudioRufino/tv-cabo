<?php $__env->startSection('title', 'Home'); ?>

<?php $__env->startSection('conteudo'); ?>
<div style="width:100%">
    <div class="row">
        <div class="col-md-6 mb-4">
          <div class="card shadow">
            <div class="card-header bg-primary">
              <strong class="card-title mb-0 text-light">Crescimento Anual - <b><?php echo e(date('Y')); ?></b></strong>
              <div class="dropdown float-right">
              </div>
            </div>

            <div class="card-body">
              <?php for($i = 1; $i <= 12; $i++): ?>
                  <input type="hidden" id="<?php echo e('inscritos_m_'.$i); ?>"  value="<?php echo e($clientes->inscritos_no_mes[$i-1]); ?>">
                  <input type="hidden" id="<?php echo e('total_inscritos_m_'.$i); ?>" value="<?php echo e($clientes->total_inscritos[$i-1]); ?>">
              <?php endfor; ?>

              
              <input type="hidden" id="total_pagamento" value="<?php echo e($clientes->total_clientes_pagos); ?>">
              <input type="hidden" id="total_dividas" value="<?php echo e(($clientes->total - $clientes->total_clientes_pagos)); ?>">
              <input type="hidden" id="total_multas" value="<?php echo e($clientes->total_multas); ?>">
              <input type="hidden" id="total_pedidos" value="<?php echo e($clientes->total_pedidos); ?>">
              
              <canvas id="barChartjs" width="400" height="300">
                  
              </canvas>
            </div>
             
          </div> 
        </div>

        <div class="col-md-6 mb-4">
            <div class="card shadow">
              <div class="card-header bg-primary">
                <strong class="card-title mb-0 text-light">Dados de Clientes</strong>
              </div>
              <div class="card-body">
                <canvas id="pieChartjs" width="400" height="300"></canvas>
              </div> 
            </div> 
          </div>

      </div> <!-- end section -->
</div>

<div class="row items-align-baseline">
    <div class="col-md-12 col-lg-4">
      <div class="card shadow eq-card mb-4">
        <div class="card-body mb-n3">
          <div class="row items-align-baseline h-100">
            <div class="col-md-6 my-3">
              <p class="mb-0"><strong class="mb-0 text-uppercase text-muted">Pagamento</strong></p>
              <h3><?php echo e($clientes->mensalidade); ?>.00</h3>
              <p class="text-muted">Consta o total do valor pago no mes em curso!</p>
            </div>
            <div class="col-md-6 my-4 text-center">
              <div lass="chart-box mx-4">
                <div id="radialbarWidget"></div>
              </div>
            </div>

            <div class="col-md-6 border-top py-3">
              <p class="mb-1"><strong class="text-muted">Preço</strong></p>
              <h4 class="mb-0">2000.00</h4>
              <p class="small text-muted mb-0"><span>TVCJ-price</span></p>
            </div> <!-- .col -->

            <div class="col-md-6 border-top py-3">
              <p class="mb-1"><strong class="text-muted">Multa</strong></p>
              <h4 class="mb-0">500.00</h4>
              <p class="small text-muted mb-0"><span>25% Mensalidade</span></p>
            </div> <!-- .col -->

          </div>
        </div> <!-- .card-body -->
      </div> <!-- .card -->
    </div> <!-- .col -->

    <div class="col-md-12 col-lg-4">
      <div class="card shadow eq-card mb-4">
        <div class="card-body">

          <div class="chart-widget mb-2">
            <input type="hidden" id="total_clientes" value="<?php echo e($clientes->total); ?>">
            <input type="hidden" id="total_clientes_pagos" value="<?php echo e($clientes->total_clientes_pagos); ?>">

            <div id="radialbar">
              
            </div>
          </div>

          <div class="row items-align-center">
            <div class="col-4 text-center">
              <p class="text-muted mb-1">Clientes</p>
              <h6 class="mb-1"><?php echo e($clientes->total); ?></h6>
              <p class="text-muted mb-0">100%</p>
            </div>
            <div class="col-4 text-center">
              <p class="text-muted mb-1">Pagos</p>
              <h6 class="mb-1"><?php echo e($clientes->total_clientes_pagos); ?></h6>
              <p class="text-muted mb-0"><?php echo e((int)($clientes->total_clientes_pagos*100/$clientes->total)); ?>%</p>
            </div>
            <div class="col-4 text-center">
              <p class="text-muted mb-1">Não Pago</p>
              <h6 class="mb-1"><?php echo e(($clientes->total - $clientes->total_clientes_pagos)); ?></h6>
              <p class="text-muted mb-0"><?php echo e(100 - ((int)($clientes->total_clientes_pagos*100/$clientes->total))); ?>%</p>
            </div>
          </div>
        </div> 
      </div> 
    </div> 

    <div class="col-md-12 col-lg-4">
      <div class="card shadow eq-card mb-4">
        <div class="card-body">
          <div class="d-flex mt-3 mb-4">
            <div class="flex-fill pt-2">
              <p class="mb-0 text-muted">Total</p>
              <h4 class="mb-0">Semanal</h4>
            </div>
            <div class="flex-fill chart-box mt-n2">
              <div id="barChartWidget"></div>
            </div>
          </div> <!-- .d-flex -->
          <div class="row border-top">
            <div class="col-md-6 pt-4">
              <h6 class="mb-0">Mes nº <span class="small text-muted"><?php echo e(date('m')); ?></span></h6>
              <p class="mb-0 text-muted">Controlo Mensal</p>
            </div>
            <div class="col-md-6 pt-4">
              <h6 class="mb-0">Dia <span class="small text-muted"><?php echo e(date('d')); ?></span></h6>
              <p class="mb-0 text-muted">Controlo Semanal</p>
            </div>
          </div> 
        </div> 
      </div> 
    </div> 
  </div> 

  <?php $__env->stopSection(); ?>
  

<?php echo $__env->make('layout.container.principal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\claud\OneDrive\Desktop\Projectos\tv-cabo\resources\views/home.blade.php ENDPATH**/ ?>