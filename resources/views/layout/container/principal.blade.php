@include('layout.componentes.links_cima')
@include('layout.componentes.header')
@include('layout.componentes.dashboard')

    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">

                @yield('conteudo')
                
            </div>
        </div>
    </main>

</div>  {{-- Fechamento da div wrapper --}}

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

@include('layout.componentes.footerPrincipal')