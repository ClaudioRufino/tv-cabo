<?php echo $__env->make('layout.componentes.links_cima', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layout.componentes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layout.componentes.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">

                <?php echo $__env->yieldContent('conteudo'); ?>
                
            </div>
        </div>
    </main>

</div>  

<script>
    /* Verificando se há Clientes pagando hoje */
    ponto_notificacao = document.getElementById('ponto_notificacao');

    const valor = notificacao();

          valor.then(
              valor =>{
                if(valor.existe === true){ // Verifique há clientes pagando hoje
                    ponto_notificacao.classList.add("dot", "dot-md", "bg-success");
                }
                else{
                    ponto_notificacao.classList.add("x");
                }
          });

    async function notificacao(){
        
        try{
            var mgs = 'Erro ao acessar o Banco de dados';
            const resposta = await fetch('http://localhost:8000/api/notificacao')
            const notificacao = await resposta.json();
            return notificacao;
        }catch(e){
            console.log(mgs);
        }
      }
    
    
  </script>

<?php echo $__env->make('layout.componentes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\claud\OneDrive\Desktop\Projectos\tv-cabo\resources\views/layout/container/pagina.blade.php ENDPATH**/ ?>