<?php $__env->startSection('title', 'Cadastrar Admin'); ?>


<?php $__env->startSection('conteudo'); ?>

<div class="col-12 col-xl-10">
    <div class="row align-items-center my-4">
        <div class="col">
          <h2 class="h3 mb-0 page-title">Editar Administrador</h2>
        </div>
        
        <form  method="POST" action="<?php echo e(route('user.update', $admin->id)); ?>" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <div class="col-auto">
            <button type="submit" class="btn btn-primary" id="btn_atualizar">Atualizar</button>
            </div>
                </div>
                <hr class="my-4">
                <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="card shadow">
                    <div class="card-body">
                        <div class="form-group mb-0">
                            <label for="example-select">Nome</label>
                            <input type="text" class="form-control" id="nome" name="name" value="<?php echo e($admin->name); ?>" required>
                            <span id="nome_mensagem" class="error-message"></span>
                        </div>

                        <div class="form-group mb-0">
                        <label for="example-multiselect">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo e($admin->email); ?>" required>
                            <span id="email_mensagem" class="error-message"></span>
                        </div>

                        <div class="form-group mb-0">
                            <label for="data_vencimento">Contacto</label>
                            <input type="number" class="form-control" name="contacto" id="contacto" value="<?php echo e($admin->contacto); ?>" required>
                            <span id="contacto_mensagem" class="error-message"></span>
                        </div>

                        <div class="form-group mb-3">
                            <label for="data_emissao">Senha</label>
                            <input type="password" class="form-control" id="password" name="password" value="*****" disabled  required>
                        </div>

                        <div class="form-group mb-0">
                            <label for="c_senha">Confirmar senha</label> 
                            <input type="password" class="form-control" id="c_senha" name="c_senha" value="*****" disabled  required>
                            <span id="senha_mensagem" class="error-message"></span>
                        </div>

                    </div>
                    </div> 
                </div>

        <div class="col-md-6 mb-4">
            <div class="card shadow">

            <div class="card-body">

                <div class="form-group mb-3">
                    <label for="c_senha">Senha do Admin Principal</label>
                    <input type="password" class="form-control" id="a_senha" name="a_senha" required>
                    <span id="a_senha_mensagem" class="error-message"></span>
                </div>

                <div class="form-group mb-3">
                    <div class="card shadow mb-4">
                        <div class="card-header">
                          <strong>Carregamento de foto</strong>
                        </div>
                        <div class="card-body">
                          <input type="file" class="form-control" name="foto" id="foto">
                          <span id="file_mensagem" class="error-message"></span>
                        </div> 
                      </div>
                </div>
            </div>
        </div>
        </div>
    </form>

    </div>
</div>

<script>

/* Validação de Nome */

const mais_de_dois_caracteres = /^.{2,}$/;
const nome = document.getElementById('nome');
const nome_mgs = document.getElementById('nome_mensagem');

const contacto = document.getElementById('contacto');
const contacto_mgs = document.getElementById('contacto_mensagem');

nome.addEventListener('input', function(){
  this.value = this.value.toUpperCase();
});

nome.addEventListener('blur', (e)=>{

    /* 1- Verifique se está no formato de nome */
    if(nome.value === ""){
       nome_mgs.innerHTML = " ";
    }
    else if(!mais_de_dois_caracteres.test(nome.value)){ // Nome não pode ter apenas um caracter
        nome_mgs.innerHTML = "Não pode ter apenas um caracter!";
    }
    else if(!(/^[A-Z\s']+$/u.test(nome.value))){ // Nome não pode começar com número ou simbolo especial
        nome_mgs.innerHTML = "Não pode conter acento, número ou simbolo especial!";
    }
    else{
        nome_mgs.innerHTML = "";
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

/* Validação de EMAIL */

const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
const email = document.getElementById('email');
const email_mgs = document.getElementById('email_mensagem');

email.addEventListener('blur', (e)=>{

    /* 1- Verifique se está no formato de email */
    if(emailRegex.test(email.value)){
        const valor = existeCampo('email', email.value);

        valor.then(
            valor =>{
                if(valor.existe === true){ // Verifique se o email já existe no banco de dados
                    email_mgs.innerHTML = "Email já existe!";
                    email.value = "";
                    btn_atualizar.disabled = true;
                }
                else{
                    email_mgs.innerHTML = "";
                    btn_atualizar.disabled = false;
                }
        })
    }
    else{
        email_mgs.innerHTML = "Formato aceite nome@servico.com";
    }

});

/* VALIDAÇÃO DE SENHA*/

const senha = document.getElementById('password');
const confirmar_senha = document.getElementById('c_senha');

confirmar_senha.addEventListener('blur', function() {
    if(senha.value!== confirmar_senha.value) {
        senha_mensagem.innerHTML = 'As senhas devem ser iguais.';
        confirmar_senha.value = "";
    }
    else senha_mensagem.innerHTML = '';
});

/* VALIDAÇÃO DO FILE */
var file = document.getElementById('foto');

file.addEventListener('change', (e)=>{

    const valor = file.value;
    if(!valor.endsWith('.jpg') && !valor.endsWith('.JPG') && !valor.endsWith('.png') && !valor.endsWith('.PNG')){
        file_mensagem.innerHTML = "Só é permitido formato jpg e png";
    }
    else{
        file_mensagem.innerHTML = "";
    } 

});

/* VALIDAÇÃO DA SENHA DO ADMINISTRADOR*/

const a_senha = document.getElementById('a_senha');
const a_senha_mensagem = document.getElementById('a_senha_mensagem');

btn_atualizar.disabled = true;

a_senha.addEventListener('blur', function() {
    if(a_senha.value != ''){
    const valor = senhaAdmin(a_senha.value);
          valor.then(
            valor=>
            {
                if(valor.senha != true){
                    a_senha.value = '';
                    btn_atualizar.disabled = true;
                    a_senha_mensagem.innerHTML = 'Senha do Administrador Errada';
                }
                else{
                    btn_atualizar.disabled = false;
                    a_senha_mensagem.innerHTML = '';
                } 
                
            }
          )
        }
});



async function existeCampo(campo, valor){
    try{
        var mgs = 'Erro ao acessar o Banco de dados';
        const resposta = await fetch('http://localhost:8000/api/procurar/'+ campo + "/" + valor,
        {
            method:'get',
            headers: {
                'Accept': 'application/json'
            }
        });
        const usuarios = await resposta.json();
        return usuarios;
    }catch(e){
        console.log(mgs);
    }
}

async function senhaAdmin(senha){
    try{
        var mgs = 'Erro ao acessar o Banco de dados';
        const resposta = await fetch('http://localhost:8000/api/senha/'+ senha,
        {
            method:'POST',
            headers: {
                'Accept': 'application/json'
            }
            ,
            body: JSON.stringify({ senha })
        });
        const user = await resposta.json();
        return user;
    }catch(e){
        console.log(mgs);
    }
}



</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.container.pagina', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\claud\OneDrive\Desktop\Projectos\tv-cabo\resources\views/admin/edit.blade.php ENDPATH**/ ?>