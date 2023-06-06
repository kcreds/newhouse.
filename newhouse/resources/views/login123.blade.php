<!doctype html>
<style>
  body {
    margin: 0;
    padding: 0;
    font-family: sans-serif;
    background: linear-gradient(to right, #b92b27, #1565c0)
}

.card{
    margin-bottom:20px;
    border:none;
}

.box {
    width: 500px;
    padding: 40px;
    position: absolute;
    top: 50%;
    left: 50%;
    background: #191919;
    ;
    text-align: center;
    transition: 0.25s;
    margin-top: 100px
}

.box input[type="text"],
.box input[type="password"] {
    border: 0;
    background: none;
    display: block;
    margin: 20px auto;
    text-align: center;
    border: 2px solid #3498db;
    padding: 10px 10px;
    width: 250px;
    outline: none;
    color: white;
    border-radius: 24px;
    transition: 0.25s
}

.box h1 {
    color: white;
    text-transform: uppercase;
    font-weight: 500
}

.box input[type="text"]:focus,
.box input[type="password"]:focus {
    width: 300px;
    border-color: #2ecc71
}

.box input[type="submit"] {
    border: 0;
    background: none;
    display: block;
    margin: 20px auto;
    text-align: center;
    border: 2px solid #2ecc71;
    padding: 14px 40px;
    outline: none;
    color: white;
    border-radius: 24px;
    transition: 0.25s;
    cursor: pointer
}

.box input[type="submit"]:hover {
    background: #2ecc71
}

.forgot {
    text-decoration: underline
}

  </style>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
    <body class="text-center" cz-shortcut-listen="true">
      <div class="container"> 
        <div class="row"> 
          <div class="col-md-6"> 
            <div class="card"> 
      <form action="" method="POST" class="box">
        {{csrf_field()}}
        <img class="mb-4" src="" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
        <div class="width">
        <label for="name" class="sr-only">Name</label>
        <input name="name" type="text" id="name" class="form-control" placeholder="Name" required autofocus="">
        <label for="inputPassword" class="sr-only">Password</label>
        <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <div class="checkbox mb-3">
          <label>
            <input id="remember" name="remember" type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </div>
      </form>
      @if (session()-> has('message'))
      <div id="liveAlertPlaceholder">
          <div>
              <div class="alert alert-success alert-dismissible" role="alert">   
                  <div>{{session()-> get('message')}}</div>   
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
          </div>
      </div>
      @endif
    </div>
  </div>
</div>
</div>
  </body>


      {{-- <section class="signup-section" id="signup">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5">
            <div class="col-md-10 col-lg-8 mx-auto text-center">
                <i class="far fa-paper-plane fa-2x mb-2 text-white"></i>
                <h2 class="text-white mb-3 ">Jesteś zainteresowany {{$immovable->name}}?</h2>
                <p class=" text-white mb-5 h5">Pozostaw swój e-mail a my skontaktujemy się z <b>Tobą!</b></p>
                <!-- * * * * * * * * * * * * * * *-->
                <!-- * * SB Forms Contact Form * *-->
                <!-- * * * * * * * * * * * * * * *-->
                <!-- This form is pre-integrated with SB Forms.-->
                <!-- To make this form functional, sign up at-->
                <!-- https://startbootstrap.com/solution/contact-forms-->
                <!-- to get an API token!-->
                <form class="form-signup" id="contactForm">
                    <!-- Email address input-->
                    <div class="row input-group-newsletter">
                        <div class="col">
                            <input class="form-control" id="emailAddress" type="email" name="email" placeholder="Twój adres e-mail" aria-label="Twój adres e-mail" required/> 
                            <textarea class="form-control mt-3" id="emailAddress" type="text" name="message" placeholder="W czym możemy pomóc?" aria-label="Twoja wiadomość" rows="3"required></textarea>
                        </div>
                        <button class="btn btn-primary mt-5" id="submitButton" type="submit">Wyślij</button>
                    </div>
                    <div class="invalid-feedback mt-2" data-sb-feedback="emailAddress:required">An email is required.</div>
                    <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3 mt-2">Error sending message!</div></div>
                </form>
            </div>
        </div>
    </div>
</section> --}}


  
</html>



