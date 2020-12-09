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
    <div class="container-signup">
        <div class="sign-block-1">
            <h1>SIGN UP</h1>
            <img src="{{ asset('img/undraw_sign_in_e6hj.svg') }}" alt="" />
            <p>Don't worry we're almost there...</p>
        </div>
    
        <div class="sign-block-2">
            <form action="">
                <a href="{{ route('home') }}"><img src="{{ asset('img/Vertical.svg') }}" alt="" /></a> 
                <input
                type="text"
                placeholder="Username"
                name="input-username"
                id="input-username"
                class="input"
                />
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
    
                <button class="btn btn-form-signup">SIGN UP</button>
            </form>
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