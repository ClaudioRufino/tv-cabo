<?php $__env->startSection('title', 'FAQS'); ?>

<?php $__env->startSection('conteudo'); ?>

    <div class="col-12">

      <div class="w-50 mx-auto text-center py-2 my-5">
        <h2 class="page-title mb-0">FAQs</h2>
        <p class="lead text-muted mb-4">Nesta seção, encontras algumas perguntas pertinentes e suas
            e suas respectivas respostas para te ajudar a manejar o sistema da melhor forma possível
        </p>
      </div>

      <div class="row my-4 d-flex justify-content-center">

        <div class="col-md-10">
          <div class="accordion w-100" id="accordion3">
            <div class="card shadow">
              <div class="card-header" id="heading7">
                <a role="button" href="#collapse7" data-toggle="collapse" data-target="#collapse7" aria-expanded="false" aria-controls="collapse7">
                  <strong> Como funciona a categoria de Administrador?</strong>
                </a>
              </div>
              <div id="collapse7" class="collapse show" aria-labelledby="heading7" data-parent="#accordion3">
                <div class="card-body">Existe um administrador principal chamado administrador Master que tem como responsabilidade cadastrar
                  e eliminar outros administradores. Nenhum outro Administrador terá esse poder, por questão de segurança.. </div>
              </div>
            </div>
            <div class="card shadow">
              <div class="card-header" id="heading8">
                <a role="button" href="#collapse8" data-toggle="collapse" data-target="#collapse8" aria-expanded="false" aria-controls="collapse8">
                  <strong>O que é o dia crítico do sistema?</strong>
                </a>
              </div>
              <div id="collapse8" class="collapse" aria-labelledby="heading8" data-parent="#accordion3">
                <div class="card-body"> Dia crítico é o dia no qual o sistema atribui dívidas para os clientes a cada princípio do mes independentemente do dia de pagamento de cada cliente. Esse dia ocorre no dia 1 de cada mes. Por essa razão, deve-se ligar o sistema em todos os dias 1, independentemente de ser um dia de trabalho ou não. </div>
              </div>
            </div>
            <div class="card shadow">
              <div class="card-header" id="heading9">
                <a role="button" href="#collapse9" data-toggle="collapse" data-target="#collapse9" aria-expanded="false" aria-controls="collapse9">
                  <strong>O que acontece se um cliente for eliminado?</strong>
                </a>
              </div>
              <div id="collapse9" class="collapse" aria-labelledby="heading9" data-parent="#accordion3">
                <div class="card-body">Se um cliente for eliminado, ele não é apagado permanentemente do sistema, ele é simplesmente colocado num estado de inatividade. Seus registos precisam estar no sistema por questão de conformidade, bem como poder restaurá-lo caso ele decide voltar a usar os serviços da empresa.. </div>
              </div>
            </div>
          </div>
        </div> 

      </div>
      
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.container.principal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\claud\OneDrive\Desktop\Projectos\tv-cabo\resources\views/faqs.blade.php ENDPATH**/ ?>