{{-- @extends('layout.container.pagina') --}}

{{-- @section('conteudo') --}}
<h2>
    Sou apenas uma página para testes
</h2>

<form action="{{route('user.teste', 1)}}" method="get">
    <button>Testar</button>
</form>


@isset($mensagem)
    <div class="form-group mb-3">
        <div class="alert alert-danger text-center" role="alert" id="mensagem" style="display: none">
            {{$mensagem}}
        </div>
    </div>
@endisset


{{-- @endsection --}}