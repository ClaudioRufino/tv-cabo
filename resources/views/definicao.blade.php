@extends('layout.container.pagina')
@section('title', 'Definições')

@section('conteudo')

<div class="col-12">

    <div class="row my-4">
      <div class="col-6 col-lg-3">
        <div class="card shadow mb-4">
          <div class="card-body">
            <i class="fe fe-info fe-32 text-primary"></i>
            <a href="{{route('home.index')}}">
              <h3 class="h5 mt-4 mb-1">Começando</h3>
            </a>
            <p class="text-muted">Teu ponto de partida</p>
          </div>
        </div>
      </div>
      <div class="col-6 col-lg-3">
        <div class="card shadow mb-4">
          <div class="card-body">
            <i class="fe fe-help-circle fe-32 text-success"></i>
            <a href="{{route('faqs')}}">
              <h3 class="h5 mt-4 mb-1">FAQs</h3>
            </a>
            <p class="text-muted">Perguntas frequentes</p>
          </div>
        </div>
      </div>


       <div class="col-6 col-lg-3">
        <div class="card shadow">
          <div class="card-body">
            <i class="fe fe-alert-triangle fe-32 text-danger"></i>
            <a href="{{route('cliente.inativos')}}">
              <h3 class="h5 mt-4 mb-1">Inativos</h3>
            </a>
            <p class="text-muted">Podes restaurar Clientes</p>
          </div>
        </div>
      </div>

      <div class="col-6 col-lg-3">
        <div class="card shadow mb-4">
          <div class="card-body">
            <i class="fe fe-star fe-32 text-warning"></i>
            <a href="#">
              <h3 class="h5 mt-4 mb-1">Sobre</h3>
            </a>
            <p class="text-muted">Sobre o criador do sistema</p>
          </div>
        </div>
      </div>

    </div> 


    <div class="row my-4">
      <div class="col-12 d-flex justify-content-center">

          <div class="col-md-8 mb-4 p-0">
            <div class="card shadow" style="background: #fafdff">
              <div class="card-body py-4 mb-1">
                <div class="row">
                  <div class="col-4">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                      <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Geral</a>
                      <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Multa</a>
                      <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Pagamento</a>
                      <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Notificacão</a>
                    </div>
                  </div>
                  <div class="col-8 d-flex justify-content-center align-items-center">
                    <div class="tab-content mb-0" id="v-pills-tabContent ">
                      <div class="tab-pane fade show active " id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab"> 

                      <!-- Bordered table -->
                      <div class="col-md-12">
                          <div class="">
                            <table class="table mb-0">
                              <thead>
                                <tr>
                                  <th>Multa</th>
                                  <th>Mensalidade</th>
                                  <th>Clientes Activos</th>
                                  <th>Clientes Inativos</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>{{$sistema->multa}}</td>
                                  <td>{{$sistema->mensalidade}}</td>
                                  <td>{{$sistema->ativos}}</td>
                                  <td>{{$sistema->inativos}}</td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                      </div>

                      </div>

                      <div class="tab-pane fade mb-4" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab"> 
                        <div class="col-12 bg-secondary">
                          <div class="row d-flex justify-content-center align-items-center p-4" style="background: #F8F8FF">
                            <form action="{{route('sistema.update', 1)}}" method="POST">
                              @method('PUT')
                              @csrf
                              <div class="form-group mb-3">
                                <label for="mensalidade text-center">Valor da Multa</label>
                                <input type="number" id="multa" name="multa" class="form-control">
                                <input type="submit" class="btn btn-primary btn-block mt-2" value="Definir">
                              </div>
                            </form>
                          </div>
                        </div> 
                      </div>

                      <div class="tab-pane fade mb-4" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                        <div class="col-12">
                          <div class="row d-flex justify-content-center align-items-center p-4" style="background: #F8F8FF">
                            <div class="form-group mb-3">
                              <label for="mensalidade text-center">Valor da Pagamento</label>
                              <input type="number" id="mensalidade" name="mensalidade" class="form-control">
                              <input type="submit" class="btn btn-primary btn-block mt-2" value="Definir">
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="tab-pane fade mb-4" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab"> 
                        <div class="col-12">
                          <div class="row d-flex justify-content-center align-items-center p-4" style="background: #F8F8FF">
                            <div class="form-group mb-3">
                              <label for="mensalidade text-center">Notificacão</label>
                              <input type="number" id="notificacao" name="notificacao" class="form-control">
                              <input type="submit" class="btn btn-primary btn-block mt-2" value="Definir">
                            </div>
                          </div>
                        </div>
                      </div>
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

     </div>

    </div>


    


    </div>
@endsection



