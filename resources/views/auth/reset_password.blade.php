<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Agila - Reset Password</title>

  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link
    href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap"
    rel="stylesheet"
  />
</head>

  <body class="main-body" style="background-color: white; background-image: none;">
    <div class="container-reset">
      <form action="{{ route('reset_password') }}" method="POST">
        @csrf
        <a href="{{ route('home') }}" id="logo"><img src="{{ asset('img/Vertical.svg') }}" alt="Agila logo" /></a> 

        <section>
          <input type="hidden" name="email" id="email" value="{{app('request')->input('email')}}" />  
          <input type="hidden" name="token" id="token" value="{{app('request')->input('token')}}" />  

          <p>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="input @if(session('status')) border-red @endif" />  
          </p>

          <p>
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="input" />    
          </p>
        </section>

        <section>
          <div class="text-alert" style="text-align:center; width: 100%;">
            {{ $errors->first('password') }}
          </div>

          @if (session('success'))
            <div  style="padding-top: 15px; color: green;">
              {{ session('success') }}
            </div>
          @endif
        </section>

        <section>
          <button type="submit" class="btn btn-reset">Reset Password</button>
        </section>
      </form>
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