<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>

<div class="wrapper fadeInDown">
  <div id="formContent">

    <div class="fadeIn first mt-3 mb-3">
      <i class="fas fa-user usericon"></i>
    </div>
    

    <form action="" method="POST">
      {{csrf_field()}}
      <input class="field" type="text" id="login" class="fadeIn second" name="name" placeholder="login" required>
      <input  class="field" type="password" id="password" class="fadeIn third" name="password" placeholder="password" required>
      <label class="fadeIn fourth">
          <input id="remember" name="remember" type="checkbox" value="remember-me"> Remember me
      </label>
      <br>
      <input type="submit" class="btn btn-primary fadeIn fourth" value="Log In">
    </form>
    @if (session()-> has('message')) 
        <div class="alert alert-warning" role="alert">
          {{session()-> get('message')}}  
        </div>
  @endif
  </div>
</div>
</body>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</html>

