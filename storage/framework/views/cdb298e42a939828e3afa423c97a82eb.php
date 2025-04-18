<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>Logar</title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="<?php echo e(url('light/css/simplebar.css')); ?>">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="<?php echo e(url('light/css/feather.css')); ?>">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="<?php echo e(url('light/css/daterangepicker.css')); ?>">
    <!-- App CSS -->
    <link rel="stylesheet" href="<?php echo e(url('light/css/app-light.css')); ?>" id="lightTheme">
    <link rel="stylesheet" href="<?php echo e(url('light/css/app-dark.css')); ?>" id="darkTheme" disabled>
  </head>
  <body class="light">
    <div class="wrapper vh-100">
      <div class="row align-items-center h-100">
        <form method="POST" action="<?php echo e(route( 'login' )); ?>" class="col-lg-3 col-md-4 col-10 mx-auto text-center">
              <?php echo csrf_field(); ?>
            
          <a class="navbar-brand mx-auto mt-2 flex-fill text-center">
            <img src="<?php echo e(url('light/assets/images/logo-tvcj.png')); ?>" alt="logo_isutic" 
            style="width:80%; border-radius:50%; margin-bottom:10px">
          </a>
          <div class="form-group">
            <label for="inputEmail" class="sr-only">Email address</label>
            <input 
                  type="email" 
                  id="inputEmail" 
                  class="form-control form-control-lg" 
                  placeholder="Email address" 
                  name="email"

                  value="maicon@gmail.com"
                  required autofocus="">
                
          </div>
                  
          <div class="form-group">
            <label for="inputPassword" class="sr-only">Password</label>
            <input 
                  type="password" 
                  id="inputPassword" 
                  class="form-control form-control-lg" 
                  placeholder="Password" 
                  name="password"
                  required
            >
                  
            <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['messages' => $errors->get('password'),'class' => 'mt-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('password')),'class' => 'mt-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $attributes = $__attributesOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__attributesOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $component = $__componentOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__componentOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
                  
          </div>

            <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['messages' => $errors->get('email'),'class' => 'mt-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('email')),'class' => 'mt-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $attributes = $__attributesOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__attributesOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $component = $__componentOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__componentOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
          
          <button class="btn btn-lg btn-primary btn-block mt-4" type="submit">Entrar</button>

          <div class="mt-2">
            <a class="btn btn-lg btn-dark btn-block text-light" href="<?php echo e(route('admin.create')); ?>">Registar</a>
          </div>
          <p class="mt-5 mb-3 text-muted">Todos direitos reservados © <?php echo e(date("Y")); ?></p>

        </form>


      </div>
    </div>
    <script src="<?php echo e(url('light/js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(url('light/js/popper.min.js')); ?>"></script>
    <script src="<?php echo e(url('light/js/moment.min.js')); ?>"></script>
    <script src="<?php echo e(url('light/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(url('light/js/simplebar.min.js')); ?>"></script>
    <script src="<?php echo e(url('light/js/daterangepicker.js')); ?>"></script>
    <script src="<?php echo e(url('light/js/jquery.stickOnScroll.js')); ?>"></script>
    <script src="<?php echo e(url('light/js/tinycolor-min.js')); ?>"></script>
    <script src="<?php echo e(url('light/js/config.js')); ?>"></script>
    <script src="<?php echo e(url('light/js/apps.js')); ?>"></script>
  </body>
</html>
</body>
</html><?php /**PATH D:\6. ENGENHARIA\Projectos\WEB\LARAVEL\Projectos Pessoais\TV-CABO\tv-cabo\resources\views/auth/login.blade.php ENDPATH**/ ?>