<?php $__env->startSection('title', 'Cadastramento'); ?>

<?php $__env->startSection('conteudo'); ?>

<div class="col-12 col-xl-10">
    <form action="<?php echo e(route('cliente.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>

        <div class="row my-4">
            <div class="col d-flex">
                <div class="ml-auto">
                    <h2 class="h3 mb-0 page-title text-primary">Novo Cliente</h2>
                </div>
            </div>
        </div>
    
        <hr class="my-4">
        <h3 class="mb-2 mt-4 lead">DADOS PESSOAIS</h3>
        <h5 class="mb-4 lead">Cadastre de forma rápida e simples os clientes da TVCJ</h5>
        <div class="form-row">
            <div class="form-group col-md-6">
            <label for="firstname">Nome Completo</label>
            <input type="text" id="nome" class="form-control" name="nome" required>
                <span id="nome_mensagem" class="error-message"></span>
                <br>
            </div>
            <div class="form-group col-md-6">
            <label for="lastname">Linha</label>
            <input type="text" id="linha" class="form-control" name="linha" required>
                <span id="linha_mensagem" class="error-message"></span>
                <br>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-8">
            <label for="descricao">Descrição da Rua</label>
            <input type="text" class="form-control" id="descricao" name="descricao" required>
            </div>
            <div class="form-group col-md-4">
            <label for="inputPhone">Contacto</label>
            <input type="text" class="form-control" id="contacto" name="contacto" required>
                <span id="contacto_mensagem" class="error-message"></span>
                <br>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
            <label for="custom-placeholder">Data do contrato</label>
            <input class="form-control input-placeholde" id="custom-placeholder" type="date" name="data_contrato" value="<?php echo e(date('Y-m-d')); ?>" readonly>
            </div>
            <div class="form-group col-md-4">
            <label for="inputState5">Género</label>
            <select id="inputState5" class="form-control" name="genero">
                <option value="Feminino">Feminino</option>
                <option value="Masculino">Masculino</option>
            </select>
            </div>
            <div class="form-group col-md-4">
            <label for="inputLang">Número da casa</label>
            <select id="num_casa" class="form-control" name="num_casa">
                <?php for($i = 1; $i <= 500; $i++): ?>
                    <option value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
                <?php endfor; ?>
            </select>
            <span id="casa_mensagem" class="error-message"></span>
            </div>
        </div>
        <hr class="my-4">
        <h5 class="mb-2 mt-4">Avatar</h5>
        <p class="mb-4">Escolhe um avatar para representar a tua pessoa digital</p>

        <div class="card-deck mb-4">
            <div class="card border-0 bg-transparent">
            <img src="<?php echo e(url('light/assets/avatars/avatar-1.PNG')); ?>" alt="..." class="card-img-top img-fluid rounded" id="avatar-1">
            <span id="span_avatar-1">
                <i class="fe fe-check fe-20 text-success" id="sucesso"></i>
            </span>  
            </div>

            <div class="card border-0 bg-transparent">
            <img src="<?php echo e(url('light/assets/avatars/avatar-2.PNG')); ?>" alt="..." class="card-img-top img-fluid rounded" id="avatar-2">
            <span id="span_avatar-2">
            </span> 
            </div> 

            <div class="card border-0 bg-transparent">
            <img src="<?php echo e(url('light/assets/avatars/avatar-3.PNG')); ?>" alt="..." class="card-img-top img-fluid rounded" id="avatar-3">
            <span id="span_avatar-3">
            </span>
            </div>

            <div class="card border-0 bg-transparent">
            <img src="<?php echo e(url('light/assets/avatars/avatar-4.PNG')); ?>" alt="..." class="card-img-top img-fluid rounded" id="avatar-4">
            <span id="span_avatar-4">
            </span>
            </div>

            <div class="card border-0 bg-transparent">
            <img src="<?php echo e(url('light/assets/avatars/avatar-5.PNG')); ?>" alt="..." class="card-img-top img-fluid rounded" id="avatar-5">
            <span id="span_avatar-5">
            </span>
            </div>

            <div class="card border-0 bg-transparent">
            <img src="<?php echo e(url('light/assets/avatars/avatar-6.PNG')); ?>" alt="..." class="card-img-top img-fluid rounded" id="avatar-6">
            <span id="span_avatar-6">
            </span>
            </div>

            <div class="card border-0 bg-transparent">
            <img src="<?php echo e(url('light/assets/avatars/avatar-7.PNG')); ?>" alt="..." class="card-img-top img-fluid rounded" id="avatar-7">
            <span id="span_avatar-7">
            </span>
            </div>

        </div> 

        <div class="card-deck mb-4">

            <div class="card border-0 bg-transparent">
            <img src="<?php echo e(url('light/assets/avatars/avatar-8.PNG')); ?>" alt="..." class="card-img-top img-fluid rounded" id="avatar-8">
            <span id="span_avatar-8">
            </span>
            </div>

            <div class="card border-0 bg-transparent">
            <img src="<?php echo e(url('light/assets/avatars/avatar-9.PNG')); ?>" alt="..." class="card-img-top img-fluid rounded" id="avatar-9">
            <span id="span_avatar-9">
            </span>
            </div>

            <div class="card border-0 bg-transparent">
            <img src="<?php echo e(url('light/assets/avatars/avatar-10.PNG')); ?>" alt="..." class="card-img-top img-fluid rounded" id="avatar-10">
            <span id="span_avatar-10">
            </span>
            </div>

            <div class="card border-0 bg-transparent">
            <img src="<?php echo e(url('light/assets/avatars/avatar-11.PNG')); ?>" alt="..." class="card-img-top img-fluid rounded" id="avatar-11">
            <span id="span_avatar-11">
            </span>
            </div> 

            <div class="card border-0 bg-transparent">
            <img src="<?php echo e(url('light/assets/avatars/avatar-12.PNG')); ?>" alt="..." class="card-img-top img-fluid rounded" id="avatar-12">
            <span id="span_avatar-12">
            </span>
            </div> 

            <div class="card border-0 bg-transparent">
            <img src="<?php echo e(url('light/assets/avatars/avatar-13.PNG')); ?>" alt="..." class="card-img-top img-fluid rounded" id="avatar-13">
            <span id="span_avatar-13">
            </span>
            </div> 

            <div class="card border-0 bg-transparent">
            <img src="<?php echo e(url('light/assets/avatars/avatar-14.PNG')); ?>" alt="..." class="card-img-top img-fluid rounded" id="avatar-14">
            <span id="span_avatar-14">
            </span>
            </div>

        </div>
        
        <hr class="my-4">

        <input type="hidden" name="avatar" id="avatar" value="light/assets/avatars/avatar-1.PNG">

        <div class="d-flex">
            <div class="ml-auto">
                <button type="submit" class="btn btn-primary" id="btn_cadastrar">Cadastrar Cliente</button>
            </div>
        </div>

    </form>

  </div> <!-- .col-12 -->

  <script>

    /* Validação de Nome */

        const btn_cadastrar = document.getElementById('cadastrar');

        const mais_de_dois_caracteres = /^.{2,}$/;
        const nome = document.getElementById('nome');
        const nome_mgs = document.getElementById('nome_mensagem');

        const linha = document.getElementById('linha');
        const linha_mgs = document.getElementById('linha_mensagem');

        const contacto = document.getElementById('contacto');
        const contacto_mgs = document.getElementById('contacto_mensagem');

        nome.addEventListener('input', function(){
          this.value = this.value.toUpperCase();
        });

        nome.addEventListener('blur', (e)=>{

            /* 1- Verifique se está no formato de nome */
            if(nome.value === ""){
               nome_mgs.innerHTML = "Nome não pode ser vazio!";
            }
            else if(!mais_de_dois_caracteres.test(nome.value)){ // Nome não pode ter apenas um caracter
                nome_mgs.innerHTML = "Nome não pode ter apenas um caracter!";
            }
            else if(!(/^[A-Z\s']+$/u.test(nome.value))){ // Nome não pode começar com número ou simbolo especial
                nome_mgs.innerHTML = "Nome não pode conter acento, número ou simbolo especial!";
            }
            else{
                nome_mgs.innerHTML = "";
            }      
        });

        /* Validando a linha */
        linha.addEventListener('input', function(){
           this.value = this.value.toUpperCase();
        });

        linha.addEventListener('blur', (e)=>{

            if(linha.value === ""){
               linha_mgs.innerHTML = "Campo linha não pode estar vazio!";
            }
            else{
                linha_mgs.innerHTML = "";
            }      
        });

        /* Validando contacto */
        contacto.addEventListener('input', function(){
           this.value = this.value.toUpperCase();
        });

        contacto.addEventListener('blur', (e)=>{

            if(contacto.value === ""){
               contacto_mgs.innerHTML = "Campo contacto não pode estar vazio!";
            }
            else if(!(/^9\d{8}$/.test(contacto.value))){
              contacto_mgs.innerHTML = "Formato Permitido: 9XXXXXXXX";
            }
            else{
                contacto_mgs.innerHTML = "";
            }      
        });

        /*Validar o número de casa, impedir que não haja repetição de número */
        const num_casa = document.getElementById('num_casa');
        const pesquisa_num_casa = existeNumCasa(num_casa.value);
        const casa_msg = document.getElementById('casa_mensagem');

          pesquisa_num_casa
          .then(
              valor =>
              {
                if(valor.existe == 1){ // Verifique se número da casa já está no sistema
                  casa_msg.innerHTML = "Número de casa já existente!";
                }
              }
          );

            num_casa.addEventListener('blur', function(){

              const num_casa = document.getElementById('num_casa');
              const pesquisa_num_casa = existeNumCasa(num_casa.value);

              pesquisa_num_casa
              .then(
                valor =>
                {
                  if(valor.existe == 1) // Verifique se número da casa já está no sistema
                    casa_msg.innerHTML = "Número de casa já existente!";
                  
                  else
                      casa_msg.innerHTML = "";
                }
            );
          });  






        async function existeNumCasa(num_casa){
        
        try{
            var mgs = 'Erro ao acessar o Banco de dados';
            const resposta = await fetch('http://localhost:8000/api/casa/'+ num_casa,
            {
                method:'get',
                headers: {
                    'Accept': 'application/json'
                }
            });
            const casa = await resposta.json();
            return casa;
        }catch(e){
            console.log(mgs);
        }
      }



    
    var avatares = [];
    var span_avatares = [];
    var avatar = document.getElementById('avatar');
    
    for (let i = 1; i <= 14; i++) {
      avatares[(i-1)] = document.getElementById('avatar-'+(i));
      span_avatares[(i-1)] = document.getElementById('span_avatar-'+(i));
    }

    avatares[0].addEventListener('click', ()=>{
      limpar();
      selecionado(0);
    });

    avatares[1].addEventListener('click', ()=>{
      limpar();
      selecionado(1);
    });

    avatares[2].addEventListener('click', ()=>{
      limpar();
      selecionado(2);
    });

    avatares[3].addEventListener('click', ()=>{
      limpar();
      selecionado(3);
    });

    avatares[4].addEventListener('click', ()=>{
      limpar();
      selecionado(4);
    });

    avatares[5].addEventListener('click', ()=>{
      limpar();
      selecionado(5);
    });

    avatares[6].addEventListener('click', ()=>{
      limpar();
      selecionado(6);
    });

    avatares[7].addEventListener('click', ()=>{
      limpar();
      selecionado(7);
    });

    avatares[8].addEventListener('click', ()=>{
      limpar();
      selecionado(8);
    });

    avatares[9].addEventListener('click', ()=>{
      limpar();
      selecionado(9);
    });

    avatares[10].addEventListener('click', ()=>{
      limpar();
      selecionado(10);
    });

    avatares[11].addEventListener('click', ()=>{
      limpar();
      selecionado(11);
    });

    avatares[12].addEventListener('click', ()=>{
      limpar();
      selecionado(12);
    });

    avatares[13].addEventListener('click', ()=>{
      limpar();
      selecionado(13);
    });

    function limpar(){
      for (let i = 0; i < avatares.length; i++) {
        span_avatares[i].innerHTML = "";
      }
    }

    function selecionado(pos){
      let i = document.createElement('i');
      i.classList.add("fe", "fe-20", "fe-check", "text-success");
      span_avatares[pos].appendChild(i);
      let url = "" + avatares[pos].src;
      url = url.substring(22, url.length);
      avatar.value = url;
    }


  </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.container.pagina', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\claud\OneDrive\Desktop\Projectos\tv-cabo\resources\views/cliente/create.blade.php ENDPATH**/ ?>