<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="./assets/css/all.min.css">
    <link rel="stylesheet" href="./assets/css/uf-style.css">
    <title>Psa | Login</title>
  </head>
  <body>
    <div class="uf-form-signin">
      <div class="text-center">
      <h2 class="text-wite"></h2>
      </div>
      <form class="mt-4" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="input-group uf-input-group input-group-lg mb-3">
          <span class="input-group-text fa fa-user"></span>
          <input id="email" type="email" name="email" class="form-control" placeholder="Username or Email address">
        </div>
        <div class="input-group uf-input-group input-group-lg mb-3">
          <span class="input-group-text fa fa-lock"></span>
          <input id="password" type="password" name="password" class="form-control" placeholder="Password">
        </div>
        
        <div class="d-grid mb-4">
          <button type="submit" class="btn uf-btn-primary btn-lg">Login</button>
        </div>
        <div class="mt-4 text-center">
          <span class="text-danger">Don't have an account?</span>
          <a href="{{route('register')}}">Sign Up</a>
        </div>
      </form>
    </div>

    <!-- JavaScript -->

    <!-- Separate Popper and Bootstrap JS -->
    <script src="./assets/js/popper.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
  </body>
</html>
