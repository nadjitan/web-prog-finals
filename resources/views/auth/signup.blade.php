<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Agila - Signup</title>

  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link
    href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap"
    rel="stylesheet"
  />
</head>

  <body class="main-body" style="background-color: white; background-image: none;">
    <a href="{{ route('home') }}" id="logo"><img src="{{ asset('img/Vertical.svg') }}" alt="Agila logo" /></a> 
    
    <div class="container-signup">
        <div class="sign-block-1">
            <h1>SIGN UP</h1>
            <img src="{{ asset('img/undraw_sign_in_e6hj.svg') }}" alt="" />
            <p>Don't worry we're almost there...</p>
        </div>
    
        <div class="sign-block-2">
            <form action="{{ route('signup') }}" method="POST">
                @csrf

                <section>
                  <p>
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="input @error('username') border-red @enderror" value="{{ old('username') }}"/>
                    @error('username')
                      <div class="text-alert" style="padding-top: 5px">
                          {{ $message }}
                      </div>
                    @enderror  
                  </p>

                  <p>
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="input @error('email') border-red @enderror" value="{{ old('email') }}"/>
                    @error('email')
                      <div class="text-alert" style="padding-top: 5px">
                          {{ $message }}
                      </div>
                    @enderror
                  </p>

                  <p>
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="input @error('password') border-red @enderror" />
                    @error('password')
                      <div class="text-alert" style="padding-top: 5px">
                          {{ $message }}
                      </div>
                    @enderror    
                  </p>

                  <p>
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="input" />    
                  </p>
                </section>

                <section>
                  <button type="submit" class="btn btn-form-signup">SIGN UP</button>
                </section>
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