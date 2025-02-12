@extends('layout.container.pagina')
@section('title', 'Pagamento')

@section('conteudo')

<div class="col-12">
    <h2 class="page-title">Realizar Pagamento</h2>
    <p class="text-muted">Nesta seção poderá fazer o pagamento mensais dos clientes.</p>
    <div class="card shadow mb-4">
      <div class="card-header bg-primary">
        <strong class="card-title text-light">TVCJ - Mensalidade </strong>
      </div>
      <div class="card-body" style="">

        <form method="post" id="form_pagamento">
          @csrf
        <div class="row">

          <div class="col-md-6 p-4" style="border:1px solid #ddd; border-radius:10px;">

            <div class="form-group mb-3">
                <label for="example-palaceholder">Código do Cliente</label>

                @php
                  if(isset($pagamentoId)) $valor_id = $pagamentoId;
                  else $valor_id = 1;
                @endphp
               
                <select class="form-control" id="cliente_id" name="cliente_id">
                  @for ($i = $valor_id; $i <= 500; $i++)
                      <option value="{{$i}}">{{$i}}</option>
                  @endfor
                </select>
              </div>

            <div class="form-group mb-3">
              <label for="simpleinput">Ano</label>
              <select class="form-control" id="ano" name="ano"> 
                  @for ($i = 2025; $i <= 2030; $i++)
                      <option value="{{$i}}">{{$i}}</option>
                  @endfor
              </select>
            </div>

            <div class="form-group mb-3">
              <label for="example-email">Mes</label>
              <select class="form-control" id="mes" name="mes">
                <option value=1>Janeiro</option>
                <option value=2>Fevereiro</option>
                <option value=3>Março</option>
                <option value=4>Abril</option>
                <option value=5>Maio</option>
                <option value=6>Junho</option>
                <option value=7>Julho</option>
                <option value=8>Agosto</option>
                <option value=9>Setembro</option>
                <option value=10>Outubro</option>
                <option value=11>Novembro</option>
                <option value=12>Dezembro</option>
              </select>
            </div>

            <div class="form-group mb-3">
              <label for="example-password">Valor</label>
              <select class="form-control" id="valor_pagamento" name="valor">
                  @for ($i = 1000; $i <= 5000; $i = $i + 500)
                      <option value="{{$i}}">{{$i}}</option>
                  @endfor
              </select>
            </div>

            <div class="form-group mb-3">
                <div class="alert alert-danger text-center" role="alert" id="mensagem" style="display: none"> </div>
            </div>

            <button type="submit" class="btn mb-2 btn-primary ">Fazer pagamento</button>

          </div> 

          <div class="col-md-6 text-center"> 
              <img 
                  src="{{url('light/assets/images/payment.png')}}" 
                  id="img_pagamento" 
                  alt="imagem descrevendo pagamento de mensalidade"
                  style="width:70%; height:290px;border-radius:5px; margin-top:20px">
              <br>
              
          </div> 
          
        </div>
        </form>

        
      </div>
    </div> 


    <script>
      document.getElementById('form_pagamento').addEventListener('submit', function(event) {
          
          event.preventDefault(); // Impedir o envio padrão do formulário
          
          var id = document.getElementById('cliente_id').value;
          var ano = document.getElementById('ano').value;
          var mes = document.getElementById('mes').value;
          var mensagem = document.getElementById('mensagem');


          const cliente = existeCliente(id);

          cliente.then(
              valor =>{

                  if(valor.existe == 1){ // Verifique se cliente existe e está activo no sistema
                      const pagamento = existePagamento(id, ano, mes);
                      pagamento.then(
                          dado =>{
                            
                                  if(dado.existe === true){ // Verifique se ano e mes já existem no banco de dados
                                      mensagem.innerHTML = "Esse mes já está pago!"
                                      mensagem.style.display = "block";
                                      setTimeout(() => { mensagem.style.display = "none"; }, 2000);
                                  } 
                                  else{
                                        var actionUrl = "{{ route('pagamento.store')}}";
                                        this.action = actionUrl; // Definir manualmente o atributo action do formulário
                                        this.submit(); //Submeter id para pesquisa
                                  }
                      });
                  }
                  else if(valor.existe == 0){ // Verifica se o cliente existe e está inativo no sistema
                      mensagem.innerHTML = "Cliente Inativo!"
                      mensagem.style.display = "block";
                      setTimeout(() => { mensagem.style.display = "none"; }, 2000);
                  }
                  else if(valor.existe == 2){ // Verifica se o cliente nunca esteve no sistema
                      mensagem.innerHTML = "Cliente Inexistente.Verifique o código!"
                      mensagem.style.display = "block";
                      setTimeout(() => { mensagem.style.display = "none"; }, 2000);
                  }
          });

      });

      async function existePagamento(id, ano, mes){
        
        try{
            var mgs = 'Erro ao acessar o Banco de dados';
            const resposta = await fetch('http://localhost:8000/api/pagamento/'+ id + "/" + ano + "/" + mes,
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

      async function existeCliente(id){
        
        try{
            var mgs = 'Erro ao acessar o Banco de dados';
            const resposta = await fetch('http://localhost:8000/api/cliente/'+ id,
            {
                method:'get',
                headers: {
                    'Accept': 'application/json'
                }
            });
            const cliente = await resposta.json();
            return cliente;
        }catch(e){
            console.log(mgs);
        }
      }


    </script>

  </div>

  @endsection

  

