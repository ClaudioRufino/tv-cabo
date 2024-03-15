@extends('layout.container.pagina')
@section('title', 'Administradores')



@section('conteudo')

<div class="col-12">
<div class="row">
    <div class="col-md-12 my-4 text-center">
      <h2 class="h4 mb-1 text-center">Administradores</h2>
      <p class="mb-3">A tabela abaixo apresenta todos os administradores do sistema!</p>
      <form 
            action="{{route('admin.create')}}" 
            method="get" 
            class="text-right"
            style="
                  position: relative;
                  float:right;
                  margin-top:22px;
                  height:50px;
                  margin-left:4px;
            ">
      </form>
      <div class="card shadow">
        <div class="card-body">
          <!-- table -->
          <table class="table table-hover table-borderless border-v">
            <thead class="thead-dark">
              <tr>
                <th class="bg-info text-left">Código</th>
                <th class="bg-info text-left">Foto</th>
                <th class="bg-info text-left">Nome</th>
                <th class="bg-info text-left">Contacto</th>
                <th class="bg-info text-left">Email</th>
                <th class="bg-info">Acção</th>
              </tr>
            </thead>
            <tbody>

                @foreach ($administradores as $admin)
                    <tr class="accordion-toggle collapsed" id="c-2474" data-toggle="collapse" data-parent="#c-2474" href="#collap-2474">
                    <td class="text-center">{{$admin->id}}</td>
                    <td class="text-left">
                      <div class="avatar avatar-md">
                        <img src="{{url('light/assets/avatars/admin', $admin->foto)}}" alt="..." class="avatar-img rounded-circle">
                    </div>
                      {{-- {{$admin->foto}} --}}
                    </td>
                    <td class="text-left">{{$admin->name}}</td>
                    <td class="text-left">{{$admin->contacto}}</td>
                    <td class="text-left">{{$admin->email}}</td>
                    <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="text-muted sr-only">Acção</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item"  href="{{route('user.edit', $admin->id)}}">Editar</a>
                        <form action="{{route('admin.destroy', $admin->id)}}" method="post" class="form_apagar">
                          @csrf
                          @method('DELETE')
                          <input type="hidden" name="id_admin" class="admin_id" value="{{ $admin->id }}">
                          <button type="submit" class="apagar-button dropdown-item" data-cliente-id="{{ $admin->id}}">Apagar</button>
                      </form>
                    </div>
                    </td>
                </tr>
                @endforeach

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<script>

const apagarButtons = document.querySelectorAll('.apagar-button');

apagarButtons.forEach(button => {
  button.addEventListener('click', function(e) {
    var form = button.closest('form');
    e.preventDefault();

    var input_id = form.querySelector('.admin_id');
    admin_id = Number(input_id.value);

    linha =  input_id.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode;
    linha_index = input_id.parentNode.parentNode.parentNode.parentNode.rowIndex; 

    apaga_linha = linha.deleteRow(linha_index);

    async function users(){
        const response = await fetch('http://localhost:8000/api/users/'+admin_id,
        {
            method:'DELETE',
            headers: {
                'Accept': 'application/json'
            }
        });
        const users = await response.json();
        return users;
    }

    const admin = users();

    admin.then(
        admins=>{
            console.log(admins);
        }
    );
   

    });
});

</script>

@endsection