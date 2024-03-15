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

    // alert("Ola mundo");
    
    

    const valor = notificacao();

          valor.then(
              valor =>{

                  if(valor.existe === true){ // Verifique há clientes pagando hoje
                    // dot dot-md bg-success
                    ponto_notificacao.classList.add("dot", "dot-md", "bg-success");

                  }
                  else{
                        // alert("Não existem clientes");
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

@include('layout.componentes.footerPrincipal')