<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>

  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link
    href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap"
    rel="stylesheet"
  />
</head>

  <body class="main-body" style="background-color: white; background-image: none;">
    <div class="container-sign">
        <div class="sign-block-1">
            <form action="">
                <a href="{{ route('home') }}"><img src="{{ asset('img/Vertical.svg') }}" alt="" /></a> 
                <input
                    type="email"
                    placeholder="Email"
                    name="input-email"
                    id="input-email"
                    class="input"
                />
                <input
                    type="password"
                    placeholder="Password"
                    name="input-password"
                    id="input-password"
                    class="input"
                />
                <a href="#FORGOT-PASSWORD">Forgot your password?</a>
                <button class="btn btn-form-login">LOG IN</button>
            </form>
    
            <div class="form-divider">
            <div class="form-divider-line"></div>
            <div class="form-divider-text">OR CONNECT WITH</div>
            <div class="form-divider-line"></div>
            </div>
    
            <div class="form-social-btns">
                <button class="btn btn-facebook">
                    <div class="icon icon-facebook"></div>
                    FACEBOOK
                </button>
                <button class="btn btn-google">
                    <div class="icon icon-google"></div>
                    GOOGLE
                </button>
            </div>
        </div>
    
        <div class="sign-block-2">
            <h1>LOG IN</h1>
            <img src="{{ asset('img/undraw_authentication_fsn5.svg') }}" alt="" />
            <p>Welcome back!</p>
        </div>
    </div>

    <!-- Scripts -->
    <script
      src="https://code.jquery.com/jquery-3.5.1.min.js"
      integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
      crossorigin="anonymous"
    ></script>
    <script src="{{ asset('js/app.js') }}"></script>
  </body>

</html>