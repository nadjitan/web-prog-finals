<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport", content="width=device-width, initial-scale=1.0">
  <title>Agila @yield('pageTitle')</title>
  
  <link rel="icon" href="{{ asset('img/Symbol.svg') }}"/>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}" />
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link
    href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap"
    rel="stylesheet"
  />
</head>

  <body>
    <nav class="main-navigation-scroll">
      <input type="checkbox" id="nav-toggle" />

      <a href="{{ route('home') }}" class="logo" tabindex="-1"
        ><img src="{{ asset('img/Horizontal.svg') }}" />
      </a>

      <div class="nav-links">
        <a href="{{ route('home') }}" class="link-enabled">Home</a>
        <a href="#ABOUT" class="link-disabled">About</a>

        @guest
          <a href="{{ route('signup') }}" class="btn btn-signup">
            <div class="icon icon-person-add"></div>
            Sign Up
          </a>
          <a href="{{ route('login') }}" class="btn btn-login">
            <div class="icon icon-person"></div>
            Log In
          </a>
        @endguest

        @auth
          <a href="{{ route('store') }}" class="link-disabled">Places</a>
          <a href="{{ route('profile') }}" class="link-disabled">Profile</a>
          <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-logout"><div class="icon icon-person"></div> Logout</button>
          </form>
        @endauth
      </div>

      <label for="nav-toggle" class="icon-menu">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
      </label>
    </nav>
    
    <div class="main-body">
      @yield('content')
    </div>
    
    <footer>
      <img src="{{ asset('img/Horizontal.svg') }}" />

      <div>
        <h4>COMPANY</h4>
        <a href="#ABOUT">About</a>
        <a href="#PLACE">Partners</a>
      </div>

      <div>
        <h4>CUSTOMER SERVICE</h4>
        <a href="#ABOUT">Contact Us</a>
        <a href="#PLACE">My Account</a>
        <a href="#PLACE">Help Center</a>
      </div>

      <div>
        <h4>JOIN US</h4>
        <p>
          Booking a destination have never been more easier than before thanks
          to our innovative online service. Join us now to experience a fun
          travel!
        </p>
        <form action="">
          <input
            type="email"
            class="input"
            name="footer-email"
            placeholder="email@example.com"
          /><button class="btn btn-footer-signup">Sign Up</button>
        </form>
      </div>

      <div>© 2020 SomeStudents</div>
    </footer>

    <!-- Scripts -->
    <script
      src="https://code.jquery.com/jquery-3.5.1.min.js"
      integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
      crossorigin="anonymous"
    ></script>
    <script type="text/javascript" src="js/app.js"></script>
  </body>

</html>