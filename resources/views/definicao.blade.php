@extends('layout.container.pagina')
@section('title', 'Definições')

@section('conteudo')

<div class="col-12">
    <div class="w-50 mx-auto text-center justify-content-center py-5 my-5">
      <h2 class="page-title mb-0">Clientes Inativos</h2>
      <p class="lead text-muted mb-4">Podes procurar por cliente inativo e restaurá-lo.</p>
      <form class="searchform searchform-lg"  method="PUT" id="form_pesquisa_inativo">
        <input class="form-control form-control-lg bg-white rounded-pill pl-5" 
               type="search" 
               placeholder="Search" 
               aria-label="Search"
               id="id_clienteInativo"
               name="id_clienteInativo">
        <p></p>
          <span id="pesquisa_mensagem_inativo" class="error-message"></span>
          <br>
          <span id="cliente_encontrado" class="error-message"></span>
          
          <div id="div_ativar"></div>
      </form>
    </div>
    <div class="row my-4">
      <div class="col-6 col-lg-3">
        <div class="card shadow mb-4">
          <div class="card-body">
            <i class="fe fe-info fe-32 text-primary"></i>
            <a href="{{route('home.index')}}">
              <h3 class="h5 mt-4 mb-1">Começando</h3>
            </a>
            <p class="text-muted">Teu ponto de partida</p>
          </div> <!-- .card-body -->
        </div> <!-- .card -->
      </div> <!-- .col-md-->
      <div class="col-6 col-lg-3">
        <div class="card shadow mb-4">
          <div class="card-body">
            <i class="fe fe-help-circle fe-32 text-success"></i>
            <a href="#">
              <h3 class="h5 mt-4 mb-1">FAQs</h3>
            </a>
            <p class="text-muted">Perguntas frequentes</p>
          </div> <!-- .card-body -->
        </div> <!-- .card -->
      </div> <!-- .col-md-->
      <div class="col-6 col-lg-3">
        <div class="card shadow mb-4">
          <div class="card-body">
            <i class="fe fe-star fe-32 text-warning"></i>
            <a href="#">
              <h3 class="h5 mt-4 mb-1">Sobre</h3>
            </a>
            <p class="text-muted">Sobre o criador do sistema</p>
          </div> <!-- .card-body -->
        </div> <!-- .card -->
      </div> <!-- .col-md-->
      <div class="col-6 col-lg-3">
        <div class="card shadow">
          <div class="card-body">
            <i class="fe fe-alert-triangle fe-32 text-danger"></i>
            <a href="#">
              <h3 class="h5 mt-4 mb-1">Reportando</h3>
            </a>
            <p class="text-muted">Reporta um erro</p>
          </div> <!-- .card-body -->
        </div> <!-- .card -->
      </div> <!-- .col-md-->
    </div> <!-- .row -->
    <div class="my-5 p-5">
      <div class="text-center">
        <h2 class="mb-0">FAQS</h2>
        <p class="lead text-muted mb-5">Abaixo listamos uma série de perguntas comuns sobre o sistema.</p>
      </div>
      <div class="row my-5">

        <div class="col-md-8">
          <h3 class="h5 mt-4 mb-1">Sistema</h3>
          <p class="">Perguntas importantes respondidas</p>
        
          <hr class="mb-4">

          <ul class="list-unstyled">

            <li class="my-1 bg-primary text-light p-2">
              <i class="fe fe-arrow-right mr-2 text-muted"></i>
              Como funciona a categoria de Administrador?
            </li>

            <li class="my-1">
              R: Existe um administrador principal que tem como responsabilidade cadastrar
              outros administradores. Nenhum outro Administrador terá esse poder, por questão de segurança.
            </li>

            <br>

            <li class="my-1 bg-primary text-light p-2">
              <i class="fe fe-arrow-right mr-2 text-muted"></i>
              O que é o dia crítico do sistema?
            </li>
            
            <li class="my-1">
              R: Dia crítico é o dia no qual o sistema atribui dívidas para os clientes a cada princípio do mes independentemente do dia de pagamento de cada cliente. Esse dia ocorre no dia 1 de cada mes. Por essa razão, deve-se ligar o sistema em todos os dias 1, independentemente de ser um dia de trabalho ou não.
            </li>

            <br>

            <li class="my-1 bg-primary text-light p-2">
              <i class="fe fe-arrow-right mr-2 text-muted"></i>
              O que acontece se um cliente for eliminado?
            </li>
            
            <li class="my-1">
              R: Se um cliente for eliminado, ele não é apagado permanentemente do sistema, ele é simplesmente colocado num estado de inatividade. Seus registos precisam estar no sistema por questão de conformidade, bem como poder restaurá-lo caso ele decide voltar a usar os serviços da empresa.
            </li>

          </ul>
        </div> <!-- .col-md-->

        <div class="col-md-4">
          <h3 class="h5 mt-4 mb-1">Reporting</h3>
          <p class="text-muted mb-4">Como reportar erros inerentes do sistema?</p>
          <ul class="list-unstyled">
            <li class="my-1"><i class="fe fe-check mr-2 text-muted"></i>934962288</li>
            <li class="my-1"><i class="fe fe-check mr-2 text-muted"></i>956029144</li>
            <li class="my-1"><i class="fe fe-check mr-2 text-muted"></i>claudiorufinop@gmail.com</li>
            <li class="my-1"><i class="fe fe-check mr-2 text-muted"></i>claudiorufinopp@gmail.com</li>
          </ul>
        </div> <!-- .col-md-->
      </div> <!-- .row -->
    </div>
    <div class="row my-4">

      <div class="col-md-12">
        <div class="card shadow bg-primary text-center mb-4">
          <div class="card-body p-5">
            <span class="circle circle-md bg-primary-light">
              <i class="fe fe-star fe-24 text-white"></i>
            </span>
            <h3 class="h4 mt-4 mb-1 text-white">Sobre</h3>
            <p class="text-white mb-4">Cláudio Rufino Milonga de Carvalho</p>
            <img src="{{url('light/assets/images/criador.jpg')}}" alt="" width="300px">
          </div> <!-- .card-body -->
        </div> <!-- .card -->
      </div> <!-- .col-md-->



 

<script>
  document.getElementById('form_pesquisa_inativo').addEventListener('submit', function(event) {
    // Impedir o envio padrão do formulário
    event.preventDefault();

    var cliente = document.getElementById('id_clienteInativo').value;

    // Expressão regular para definir só valores numéricos
    if( /^[0-9]+$/.test(cliente)){ 
        
        /* Verifique se o valor digitado é id de um cliente do sistema*/
        var valor = existeCliente(cliente); 
        var div_ativar = document.getElementById('div_ativar');
        var cliente_encontrado = document.getElementById('cliente_encontrado');
        
        valor.then(
            valor=>
            {
              switch (valor.existe) {
                case 0:
                      pesquisa_info = document.getElementById('pesquisa_mensagem_inativo');
                      pesquisa_info.innerHTML = "Cliente Activo!";
                      div_ativar.innerHTML = "";
                      cliente_encontrado.innerHTML = "";
                break;

                case 1:
                      pesquisa_info = document.getElementById('pesquisa_mensagem_inativo');
                      pesquisa_info.innerHTML = "Cliente Inativo encontrado/a!";
                      var btn_ativar = document.createElement("button");

                          // Adiciona classes ao botão
                      btn_ativar.classList.add("btn", "mt-2", "btn-outline-secondary");

                      // Define o tipo do botão
                      btn_ativar.type = "button";

                      // Adiciona atributos de data ao botão
                      btn_ativar.setAttribute("data-toggle", "modal");
                      btn_ativar.setAttribute("data-target", "#varyModal");
                      btn_ativar.setAttribute("data-whatever", "@mdo");

                      btn_ativar.innerHTML = "Clique para activar";

                      div_ativar = document.getElementById('div_ativar');
                      div_ativar.innerHTML = "";
                      div_ativar.appendChild(btn_ativar);

                      
                      cliente_encontrado.innerHTML = valor.nome;

                      btn_ativar.addEventListener("click", function() {
                            const form = document.getElementById('form_pesquisa_inativo');
                            const actionUrl = "{{ route('cliente.ativar', ['id'=>'0'])}}"+cliente;
                            form.action = actionUrl; // Definir manualmente o atributo action do formulário
                            form.submit(); //Submeter id para pesquisa
                      });
                break;

                case 2:
                      pesquisa_info = document.getElementById('pesquisa_mensagem_inativo');
                      pesquisa_info.innerHTML = "Cliente não existente!";
                      div_ativar.innerHTML = "";
                break;
              
              }
                
            }
      );
  }
  else{
        pesquisa_info = document.getElementById('pesquisa_mensagem');
        pesquisa_info.innerHTML = "Só é permitido valor numérico!";
  }
});

async function existeCliente (id){

   try{
       var mgs = 'Erro ao acessar o Banco de dados';
       const resposta = await fetch('http://localhost:8000/api/clienteInativo/'+ id,
       {
           method:'get',
           headers: {
               'Accept': 'application/json'
           }
       });
       const clientes = await resposta.json();
       return clientes;
   }catch(e){
       console.log(mgs);
   }

}


</script>


</div> <!-- .row -->
</div> <!-- .col-12 -->
@endsection



