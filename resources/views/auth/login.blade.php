<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>Logar</title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="{{url('light/css/simplebar.css')}}">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="{{url('light/css/feather.css')}}">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="{{url('light/css/daterangepicker.css')}}">
    <!-- App CSS -->
    <link rel="stylesheet" href="{{url('light/css/app-light.css')}}" id="lightTheme">
    <link rel="stylesheet" href="{{url('light/css/app-dark.css')}}" id="darkTheme" disabled>
  </head>
  <body class="light">
    <div class="wrapper vh-100">
      <div class="row align-items-center h-100">
        <form method="POST" action="{{ route( 'login' )}}" class="col-lg-3 col-md-4 col-10 mx-auto text-center">
              @csrf
            
          <a class="navbar-brand mx-auto mt-2 flex-fill text-center">
            <img src="{{url('light/assets/images/logo-tvcj.png')}}" alt="logo_isutic" 
            style="width:80%; border-radius:50%; margin-bottom:10px">
          </a>
          {{-- <h1 class="h6 mb-3"></h1> --}}
          <div class="form-group">
            <label for="inputEmail" class="sr-only">Email address</label>
            <input 
                  type="email" 
                  id="inputEmail" 
                  class="form-control form-control-lg" 
                  placeholder="Email address" 
                  name="email"
                  required autofocus="">
                  <x-input-error :messages="$errors->get('email')" class="mt-2" />
                  
          </div>
          <div class="form-group">
            <label for="inputPassword" class="sr-only">Password</label>
            <input 
                  type="password" 
                  id="inputPassword" 
                  class="form-control form-control-lg" 
                  placeholder="Password" 
                  name="password"
                  required>
                  <x-input-error :messages="$errors->get('password')" class="mt-2" />
          </div>
          <div class="checkbox mb-3">
            <label>
              <input type="checkbox" value="remember-me"> Guardar senha </label>
          </div>
          <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>

          <div class="mt-2">
            <a href="{{route('admin.create')}}">Registar</a>
          </div>
          <p class="mt-5 mb-3 text-muted">© {{date("Y")}}</p>

        </form>


      </div>
    </div>
    <script src="{{url('light/js/jquery.min.js')}}"></script>
    <script src="{{url('light/js/popper.min.js')}}"></script>
    <script src="{{url('light/js/moment.min.js')}}"></script>
    <script src="{{url('light/js/bootstrap.min.js')}}"></script>
    <script src="{{url('light/js/simplebar.min.js')}}"></script>
    <script src="{{url('light/js/daterangepicker.js')}}"></script>
    <script src="{{url('light/js/jquery.stickOnScroll.js')}}"></script>
    <script src="{{url('light/js/tinycolor-min.js')}}"></script>
    <script src="{{url('light/js/config.js')}}"></script>
    <script src="{{url('light/js/apps.js')}}"></script>
  </body>
</html>
</body>
</html>