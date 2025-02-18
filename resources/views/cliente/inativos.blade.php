@extends('layout.container.principal')

@section('title', 'Clientes Inativos')

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
        
    </div>

@endsection