
@extends('layout.container.pagina')
@section('title', 'Multa')


@section('conteudo')

<div class="col-12 col-xl-10">
    <div class="row align-items-center my-4">
        <div class="col">
          <h2 class="h3 mb-0 page-title">Multar Cliente</h2>
        </div>
        <form id="form_multa" method="POST">
          @csrf
        <div class="col-auto">
          <button type="submit" class="btn btn-primary" id="btn_cadastrar">Enviar Multa</button>
        </div>
      </div>
      <hr class="my-4">
    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card shadow">
            <div class="card-body">
                <div class="form-group mb-3">
                <label for="example-select">Código do cliente</label>
                <select class="form-control" id="id" name="cliente_id">
                    @for ($i = 1; $i <= 500; $i++)
                        <option value="{{$i}}">{{$i}}</option>
                    @endfor
                </select>
                </div>

                <div class="form-group mb-3">
                <label for="example-multiselect">Valor da Multa</label>
                <select class="form-control" id="valor" name="valor">
                    @for ($i = 500; $i <= 5000; $i=$i+500)
                        <option value="{{$i}}">{{$i}}</option>
                    @endfor
                </select>
                </div>

                <div class="form-group mb-3">
                    <label for="data_emissao">Data de emissão</label>
                    <input type="date" class="form-control" value="{{date('Y-m-d')}}" id="data" name="data_emissao">
                </div>

                <div class="form-group mb-3">
                    <div class="alert alert-danger text-center" role="alert" id="mensagem" style="display: none"> </div>
                </div>

            </div>
            </div> 
        </div>

        <div class="col-md-6 mb-4">
            <div class="card shadow">
            <div class="card-body">
                <div class="form-group mb-3">
                <label for="data_vencimento">Data de vencimento</label>
                <input type="date" class="form-control" readonly>
                </div>
                <div class="form-group mb-3">
                    <label for="descricao">Descrição da Multa</label>
                    <textarea class="form-control" id="descricao" rows="5" name="descricao"></textarea>
                </div>
            </div>
            </div>
        </div>
        </form>

    </div>
</div>

<script>
document.getElementById('form_multa').addEventListener('submit', function(event) {
          
    event.preventDefault(); // Impedir o envio padrão do formulário
    
    var id = document.getElementById('id').value;

    const cliente = existeCliente(id);

    cliente.then(
        valor =>{
            // Verifique se cliente existe e está activo no sistema
            if(valor.existe == 1){ 
                var actionUrl = "{{ route('multa.store')}}";
                this.action = actionUrl; // Definir manualmente o atributo action do formulário
                this.submit(); //Submeter id para pesquisa
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
@endsection