<?php $__env->startSection('title', 'Home'); ?>

<?php $__env->startSection('conteudo'); ?>

    <div class="col-12">
        
        <div class="w-50 mx-auto text-center justify-content-center py-2 my-5">
            <h2 class="page-title mb-0">FAQs</h2>
            <p class="lead text-muted mb-4">Nesta seção, encontras algumas perguntas pertinentes e suas
                e suas respectivas respostas para te ajudar a manejar o sistema da melhor forma possível
            </p>
        </div>

        <div class="col-md-12">
          <hr class="mb-4">

          <ul class="list-unstyled">

            <li class="my-1 bg-primary text-light p-2">
              <i class="fe fe-arrow-right mr-2 tex-light"></i>
              Como funciona a categoria de Administrador?
            </li>

            <li class="my-1">
              Existe um administrador principal chamado administrador Master que tem como responsabilidade cadastrar
               e eliminar outros administradores. Nenhum outro Administrador terá esse poder, por questão de segurança.
            </li>

            <br>

            <li class="my-1 bg-primary text-light p-2">
              <i class="fe fe-arrow-right mr-2"></i>
              O que é o dia crítico do sistema?
            </li>
            
            <li class="my-1">
              R: Dia crítico é o dia no qual o sistema atribui dívidas para os clientes a cada princípio do mes independentemente do dia de pagamento de cada cliente. Esse dia ocorre no dia 1 de cada mes. Por essa razão, deve-se ligar o sistema em todos os dias 1, independentemente de ser um dia de trabalho ou não.
            </li>

            <br>

            <li class="my-1 bg-primary text-light p-2">
              <i class="fe fe-arrow-right mr-2"></i>
              O que acontece se um cliente for eliminado?
            </li>
            
            <li class="my-1">
              R: Se um cliente for eliminado, ele não é apagado permanentemente do sistema, ele é simplesmente colocado num estado de inatividade. Seus registos precisam estar no sistema por questão de conformidade, bem como poder restaurá-lo caso ele decide voltar a usar os serviços da empresa.
            </li>

          </ul>
        </div> <!-- .col-md-->

    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.container.principal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\6. ENGENHARIA\Projectos\WEB\LARAVEL\Projectos Pessoais\TV-CABO\tv-cabo\resources\views/faqs.blade.php ENDPATH**/ ?>