@extends('layout.container.pagina')

@section('conteudo')
<div>

<br>

<div class="row">
    <div id="meu_modal">
        <div class="modal_content">
            <div class="spinner-border mr-3" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
              </div>
        </div>
    </div>
</div>



</div>

<script>

    modal = document.getElementById('meu_modal');
    
    fazerRequisicao();

    function fazerRequisicao() {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'https://consulta.edgarsingui.ao/consultar/008336670BO045', true);

            modal.style.display = 'block';
            
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        console.log('Sucesso');
                        modal.style.display = 'none';
                    } 
                }
                else{
                    console.log('Esperando...')
                }
            };

            xhr.send();
        }

</script>


@endsection