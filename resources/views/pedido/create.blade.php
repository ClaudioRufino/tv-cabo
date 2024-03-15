@extends('layout.container.pagina')
@section('title', 'Pedido')



@section('conteudo')

<div class="col-12 col-lg-10 col-xl-8">
    <h2 class="h3 mb-4 page-title">Pedido</h2>
    <div class="my-4">
      
      <form>
        <div class="row mt-5 align-items-center">
          <div class="col-md-3 text-center mb-5">
            <div class="avatar avatar-xl">
              <img src="{{url('light/assets/avatars/face-1.jpg')}}" alt="Avatar do cliente" class="avatar-img rounded-circle">
            </div>
          </div>
          <div class="col">
            <div class="row align-items-center">
              <div class="col-md-7">
                <h4 class="mb-1">Brown, Asher</h4>
                <p class="small mb-3"><span class="badge badge-dark">New York, USA</span></p>
              </div>
            </div>
            <div class="row mb-4">
              <div class="col-md-7">
                <p class="text-muted"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris blandit nisl ullamcorper, rutrum metus in, congue lectus. In hac habitasse platea dictumst. Cras urna quam, malesuada vitae risus at, pretium blandit sapien. </p>
              </div>
              <div class="col">
                <p class="small mb-0 text-muted">Nec Urna Suscipit Ltd</p>
                <p class="small mb-0 text-muted">P.O. Box 464, 5975 Eget Avenue</p>
                <p class="small mb-0 text-muted">(537) 315-1481</p>
              </div>
            </div>
          </div>
        </div>
        <hr class="my-4">
        <div class="form-row">
          <div class="form-group col-md-2">
            <label for="cliente_id">Código</label>
            <input type="text" id="cliente_id" class="form-control" placeholder="" name="cliente_id" disabled>
          </div>
          <div class="form-group col-md-6">
            <label for="lastname">Assunto</label>
            <input type="text" id="lastname" class="form-control" placeholder="" name="assunto">
          </div>

          <div class="form-group col-md-4">
            <label for="data">Data do Pagamento</label>
            <input type="date" class="form-control" id="data">
          </div>

        </div>

        <div class="form-group">
            <label for="descricao">Descrição do pedido</label>
            <textarea class="form-control" name="descricao" id="descricao" cols="30" rows="4" placeholder="..."></textarea>
        </div>

       <div class="text-right">
            <button type="submit" class="btn btn-primary">Fazer Pedido</button>
       </div>

        <hr class="my-4">
          
      </form>
    </div> <!-- /.card-body -->
  </div> <!-- /.col-12 -->

@endsection