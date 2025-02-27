<?php $__env->startSection('title', 'Pagamento'); ?>

<?php $__env->startSection('conteudo'); ?>

<div class="col-11">
    <h2 class="page-title">Realizar Pagamento</h2>
    <p class="text-muted">Nesta seção poderá fazer o pagamento mensais dos clientes.</p>
    <div class="card shadow mb-4">
      <div class="card-header bg-primary">
        <strong class="card-title text-light">TVCJ - Mensalidade </strong>
      </div>
      <div class="card-body" style="">

        <form method="post" id="form_pagamento">
          <?php echo csrf_field(); ?>
        <div class="row">

          <div class="col-md-6 p-4" style="border:1px solid #ddd; border-radius:10px;">

            <div class="form-group mb-3">
                <label for="example-palaceholder">Código do Cliente</label>

                <?php
                  if(isset($pagamentoId)) $valor_id = $pagamentoId;
                  else $valor_id = 1;
                ?>
               
                <select class="form-control" id="cliente_id" name="cliente_id">
                  <?php for($i = $valor_id; $i <= 500; $i++): ?>
                      <option value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
                  <?php endfor; ?>
                </select>
              </div>

            <div class="form-group mb-3">
              <label for="simpleinput">Ano</label>
              <select class="form-control" id="ano" name="ano"> 
                  <?php for($i = 2025; $i <= 2030; $i++): ?>
                      <option value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
                  <?php endfor; ?>
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
                  <?php for($i = $sistema->mensalidade; $i <= 5000; $i = $i + 500): ?>
                      <option value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
                  <?php endfor; ?>
              </select>
            </div>

            <div class="form-group mb-3">
                <div class="alert alert-danger text-center" role="alert" id="mensagem" style="display: none"> </div>
            </div>

            <button type="submit" class="btn mb-2 btn-primary ">Fazer pagamento</button>

          </div> 

          
          <div class="col-md-6">
            <div class="w-100 d-flex justify-content-center align-items-center">
              
              <!-- Exibida apenas em telas pequenas -->
              <img src="<?php echo e(url('light/assets/images/payment.png')); ?>" class="img-fluid d-block d-md-none d-lg-none" alt="Pequena">

              <!-- Exibida apenas em telas médias -->
              <img src="<?php echo e(url('light/assets/images/payment.png')); ?>" class="img-fluid d-none d-md-block d-lg-none" alt="Média">

              <!-- Exibida apenas em telas grandes -->
              <img src="<?php echo e(url('light/assets/images/payment.png')); ?>" 
                   id="img_pagamento" 
                   alt="imagem de pagamento de mensalidade"
                   style="width:60%; height:350px;border-radius:5px; margin-top:20px;" class="d-none d-md-none d-lg-block"
              >

              <br>
            </div> 
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
                                        var actionUrl = "<?php echo e(route('pagamento.store')); ?>";
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

  <?php $__env->stopSection(); ?>

  


<?php echo $__env->make('layout.container.pagina', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\claud\OneDrive\Desktop\Projectos\tv-cabo\resources\views/pagamento/create.blade.php ENDPATH**/ ?>