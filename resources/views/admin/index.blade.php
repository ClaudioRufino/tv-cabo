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
            method="GET" 
            class="text-right"
            style="position: relative;
                  float:right;
                  margin-top:22px;
                  height:50px;
                  margin-left:4px;">
      </form>
      <div class="card shadow">
        <div class="card-body">
          <!-- table -->
          <table class="table table-hover table-borderless border-v">
            <thead class="thead-dark">
              <tr>
                <th class="bg-primary text-left">Código</th>
                <th class="bg-primary text-left">Foto</th>
                <th class="bg-primary text-left">Nome</th>
                <th class="bg-primary text-left">Contacto</th>
                <th class="bg-primary text-left">Email</th>
                <th class="bg-primary">Acção</th>
              </tr>
            </thead>
            <tbody>

                @foreach ($administradores as $admin)
                    <tr class="accordion-toggle collapsed" id="c-2474" data-toggle="collapse" data-parent="#c-2474" href="#collap-2474">
                    <td class="text-center">{{$admin->id}}</td>
                    <td class="text-left">
                      <div class="avatar avatar-md">
                        @if (str_starts_with($admin->foto, 'l'))
                            <img src="{{url($admin->foto)}}" alt="..." class="avatar-img rounded-circle">
                        @else
                            <img src="{{url('light/assets/avatars/admin', $admin->foto)}}" alt="..." class="avatar-img rounded-circle">
                        @endif
                    </div>
                    </td>
                    <td class="text-left">{{$admin->name}}</td>
                    <td class="text-left">{{$admin->contacto}}</td>
                    <td class="text-left">{{$admin->email}}</td>
                    <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="text-muted sr-only">Acção</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item"  href="{{route('user.edit', $admin->id)}}">Editar</a>
                        <input type="hidden" name="id_admin" class="admin_id" value="{{ $admin->id }}">
                        <button type="submit" class="btnEliminarAdmin dropdown-item" data-id="{{ $admin->id }}" data-toggle="modal" data-target="#modalEliminarAdmin">Apagar</button>
                    </div>
                    </td>
                </tr>
                @endforeach

                <div class="modal fade" id="modalEliminarAdmin" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="varyModalLabel">Eliminar</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="form-group text-left">
                                <label for="recipient-name" class="ml-4 mt-4">Deseja realmente eliminar o item? <br>
                                <span class="text-danger">OBS: Se eliminar o administrador poderá perder todos registos associado a ele.</span></label>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Cancelar</button>
                                <form  id="modal-delete-form-admin" action="#" method="POST">
                                        @csrf
                                        @method('DELETE')
                                    <button type="submit" class="btn btn-danger mb-2">Eliminar</button>
                                </form>
                            </div>
                    </div>
                    </div>
                </div>

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<script>

    document.addEventListener('DOMContentLoaded', function () {

        const apagarButtons = document.querySelectorAll('.btnEliminarAdmin');
        const deleteForm = document.getElementById('modal-delete-form-admin');

        apagarButtons.forEach(button => {
            button.addEventListener('click', function () {
                const adminId = button.getAttribute('data-id');
                deleteForm.action = `/user/${adminId}`;
            });
        });
    });


</script>

@endsection