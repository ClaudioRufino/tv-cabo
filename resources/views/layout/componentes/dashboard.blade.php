
<aside class="sidebar-left border-right bg-light shadow" id="leftSidebar" data-simplebar> <!-- bg-primary Light para primary-->
    <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
      <i class="fe fe-x"><span class="sr-only"></span></i>
    </a>
    <nav class="vertnav navbar navbar-light">
      <!-- nav bar -->
      <div class="w-100 mb-4 d-flex">

        <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="{{route('home.index')}}">
          <img src="{{url('light/assets/images/logo-tvcj.png')}}" alt=""
          style="width: 30%; border-radius:50%; margin-right:10%;">
        </a>

      </div>

      {{-- 
        Esse é o código por tras do Dashboard nos links
        .navbar-light .navbar-nav .nav-link {
          /* color: #001a4e;  */
          color: white;
        }
        
        --}}

      <ul class="navbar-nav flex-fill w-100 mb-2">
        <li class="nav-item">
          <a class="nav-link" href="{{route('home.index')}}">
            <i class="fe fe-home fe-16"></i>
            <span class="ml-3 item-text">Home</span>
          </a>
        </li>
      </ul>

      <p class="text-muted nav-heading mt-4 mb-1 menu-item" style="color:#fff">
        <span>Componentes</span>
      </p>

      <ul class="navbar-nav flex-fill w-100 mb-2">

        <li class="nav-item w-100">
          <a class="nav-link" href="{{route('user.index')}}">
            <i class="fe fe-user-check fe-16"></i>
            <span class="ml-3 item-text">Admin</span>
          </a>
        </li>

        <li class="nav-item dropdown">
          <a href="#ui-elements" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
            <i class="fe fe-user fe-16"></i></i>
            <span class="ml-3 item-text">Cliente</span>
          </a>
          <ul class="collapse list-unstyled pl-4 w-100" id="ui-elements">
            <li class="nav-item">
              <a class="nav-link pl-3" href="{{route('cliente.index')}}">
                <span class="ml-1 item-text">Lista</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link pl-3" href="{{route('multa.index')}}">
                <span class="ml-1 item-text">Multa</span></a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link pl-3" href="{{route('pedido.index')}}">
                <span class="ml-1 item-text">Pedido</span>
              </a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link pl-3" href="{{route('cliente.create')}}">
                <span class="ml-1 item-text">Cadastrar</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link pl-3" href="{{route('pagamento.create')}}">
                <span class="ml-1 item-text">Pagamento</span>
              </a>
            </li>

          </ul>

        </li>
        <li class="nav-item w-100">
          <a class="nav-link" href="{{route('notificacao.index')}}">
            <i class="fe fe-bell fe-16"></i>
            <span class="ml-3 item-text">Notificação</span>
          </a>
        </li>

        <li class="nav-item w-100">
          <a class="nav-link" href="{{route('calendario')}}">
            <i class="fe fe-calendar fe-16"></i>
            <span class="ml-3 item-text">Calendário</span>
          </a>
        </li>
        
      </ul>

    </nav>
  </aside>