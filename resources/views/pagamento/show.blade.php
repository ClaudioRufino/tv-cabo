@extends('layout.container.pagina')
@section('title', 'Histórico de Pagamento')

@section('conteudo')

<div class="col-12">
    <div class="text-right">
      {{$nome}}
    </div>

    <hr>
    <div class="row">
      <div class="form-group col-md-2">
            <select class="form-control select" id="selectAno">
              @for ($i = 2020; $i <= 2030; $i++)
                <option value="{{$i}}" @if($i == $ano) selected @endif>{{$i}}</option>
              @endfor
            </select>
        </div> 

        <input type="hidden" id="cliente_id" value="{{$id}}">

        <div class="col-md-12 mb-4">
            <div class="card shadow bg-primary text-white">
            <div class="card-body">
                <div class="row text-center ">
                    <div class="col pr-0">
                        <p class="small text-light mb-0">Pagamento Anual 
                            <span class="circle circle-sm bg-primary-light">
                            <i class="fe fe-16 fe-shopping-bag text-white mb-0"></i>
                        </p>
                    </div>
            </div>
          </div>
        </div>
    </div>
    </div>  

    <div class="row">
    
    @foreach ($mesesPago as $mes)
    
    <div class="col-md-4 mb-4">

      <div class="card md-4 shadow mb-3">
        <div class="card-body py-3">
          <div class="row align-items-center">
            <div class="col-auto pr-1">
              <i class="fe fe-24 text-success fe-check"></i>
            </div>
            <div class="col pr-0" id="div_mes">
              <span>
              @switch($mes->mes)
                @case(1) <strong>{{"Janeiro"}}</strong> @break
                @case(2) <strong>{{"Fevereiro"}}</strong> @break
                @case(3) <strong>{{"Março"}}</strong> @break
                @case(4) <strong>{{"Abril"}}</strong> @break
                @case(5) <strong>{{"Maio"}}</strong> @break
                @case(6) <strong>{{"Junho"}}</strong> @break
                @case(7) <strong>{{"Julho"}}</strong> @break
                @case(8) <strong>{{"Agosto"}}</strong> @break
                @case(9) <strong>{{"Setembro"}}</strong> @break
                @case(10) <strong>{{"Outubro"}}</strong> @break
                @case(11) <strong>{{"Novembro"}}</strong> @break
                @case(12) <strong>{{"Dezembro"}}</strong> @break
              @endswitch
            </span>

              <p class="small text-muted mb-0">Data de pagamento</p>

            </div>
            
          </div>
        </div> 
      </div> 

    </div> 
    @endforeach

      
    </div> 
  </div> 


<script>
    select = document.getElementById('selectAno');

    select.addEventListener('change', (e)=>{
      var ano = select.value;
      var mes = document.getElementById('mes');
      var id = document.getElementById('cliente_id').value;
      var rota = '/pagamentoP/' + id + '/'+ ano;
      window.location.href = rota;
     
    })

    async function pagamentos(id, ano){
        
        try{
            var mgs = 'Erro ao acessar o Banco de dados';
            const resposta = await fetch('http://localhost:8000/api/pagamentos/'+ id + "/" + ano,
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

</script>

</div>



@endsection