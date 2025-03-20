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

    // const not = notificacao();
        

        //   valor.then(
        //       valor =>{
        //         console.log(valor)
        //           if(valor.existe === true){ // Verifique há clientes pagando hoje
        //             // dot dot-md bg-success
        //             ponto_notificacao.classList.add("dot", "dot-md", "bg-success");

        //           }
        //           else{
        //                 ponto_notificacao.classList.add("x");
        //           }
        //   });

    async function notificacao(){
        
        try{
            const resposta = await fetch('http://localhost:8000/api/notificacao');
            // const notification = await resposta.json();
            console.log("Ola mundo");
            // return notificacao;
        }catch(e){
            console.log("Erro:");
        }
      }
    
    
  </script>

<?php echo $__env->make('layout.componentes.footerPrincipal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\claud\OneDrive\Desktop\Projectos\tv-cabo\resources\views/layout/container/principal.blade.php ENDPATH**/ ?>