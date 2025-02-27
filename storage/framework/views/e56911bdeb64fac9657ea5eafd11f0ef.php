<?php $__env->startSection('title', 'Histórico de Pagamento'); ?>

<?php $__env->startSection('conteudo'); ?>

<div class="col-12">
    <div class="text-right">
      <?php echo e($nome); ?>

    </div>

    <hr>
    <div class="row">
      <div class="form-group col-md-2">
            <select class="form-control select" id="selectAno">
              <?php for($i = 2020; $i <= 2030; $i++): ?>
                <option value="<?php echo e($i); ?>" <?php if($i == $ano): ?> selected <?php endif; ?>><?php echo e($i); ?></option>
              <?php endfor; ?>
            </select>
        </div> 

        <input type="hidden" id="cliente_id" value="<?php echo e($id); ?>">

        <div class="col-md-12 mb-4">
            <div class="card shadow bg-primary text-white">
            <div class="card-body">
                <div class="row text-center ">
                    <div class="col pr-0">
                        <p class="small text-light mb-0">Pagamento Anual 
                            <span class="circle circle-sm bg-primary-light">
                            <i class="fe fe-16 fe-shopping-bag text-white mb-0"></i>
                        </p>
                    </div>
            </div>
          </div>
        </div>
    </div>
    </div>  

    <div class="row">
    
    <?php $__currentLoopData = $mesesPago; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    
    <div class="col-md-4 mb-4">

      <div class="card md-4 shadow mb-3">
        <div class="card-body py-3">
          <div class="row align-items-center">
            <div class="col-auto pr-1">
              <i class="fe fe-24 text-success fe-check"></i>
            </div>
            <div class="col pr-0" id="div_mes">
              <span>
              <?php switch($mes->mes):
                case (1): ?> <strong><?php echo e("Janeiro"); ?></strong> <?php break; ?>
                <?php case (2): ?> <strong><?php echo e("Fevereiro"); ?></strong> <?php break; ?>
                <?php case (3): ?> <strong><?php echo e("Março"); ?></strong> <?php break; ?>
                <?php case (4): ?> <strong><?php echo e("Abril"); ?></strong> <?php break; ?>
                <?php case (5): ?> <strong><?php echo e("Maio"); ?></strong> <?php break; ?>
                <?php case (6): ?> <strong><?php echo e("Junho"); ?></strong> <?php break; ?>
                <?php case (7): ?> <strong><?php echo e("Julho"); ?></strong> <?php break; ?>
                <?php case (8): ?> <strong><?php echo e("Agosto"); ?></strong> <?php break; ?>
                <?php case (9): ?> <strong><?php echo e("Setembro"); ?></strong> <?php break; ?>
                <?php case (10): ?> <strong><?php echo e("Outubro"); ?></strong> <?php break; ?>
                <?php case (11): ?> <strong><?php echo e("Novembro"); ?></strong> <?php break; ?>
                <?php case (12): ?> <strong><?php echo e("Dezembro"); ?></strong> <?php break; ?>
              <?php endswitch; ?>
            </span>

              <p class="small text-muted mb-0">Data de pagamento</p>

            </div>
            
          </div>
        </div> 
      </div> 

    </div> 
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

      
    </div> 
  </div> 


<script>
    select = document.getElementById('selectAno');

    select.addEventListener('change', (e)=>{
      var ano = select.value;
      var mes = document.getElementById('mes');
      var id = document.getElementById('cliente_id').value;
      var rota = '/pagamentoP/' + id + '/'+ ano;
      window.location.href = rota;
     
    })

    async function pagamentos(id, ano){
        
        try{
            var mgs = 'Erro ao acessar o Banco de dados';
            const resposta = await fetch('http://localhost:8000/api/pagamentos/'+ id + "/" + ano,
            {
                method:'get',
                headers: {
                    'Accept': 'application/json'
                }
            });
            const existePagamento = await resposta.json();
            return existePagamento;
        }catch(e){
            console.log(mgs);
        }
      }

</script>

</div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.container.pagina', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\claud\OneDrive\Desktop\Projectos\tv-cabo\resources\views/pagamento/show.blade.php ENDPATH**/ ?>