<?php
  session_start();
  require_once('../lib/auth_lib.php');
  $error_msg = '';

  if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user = new User($_POST['inputEmail'], $_POST['inputPassword']);
    $error=$user->signin();
	  if(isset($error{0})){
      $error_msg = $error;
    }
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Sign In</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


    <!-- Custom styles for this template -->
    <link href="../Styles/signin.css" rel="stylesheet">
    <link rel="icon" href="https://garfieldparkacademy.org/wp-content/uploads/2018/04/hand_heart_donate_icon.png" type="image/icon type">
  </head>

  <body class="text-center">
    <form class="form-signin" method="POST" action="Signin.php">
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <div><?=$error_msg ?></div>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input name="inputEmail" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <br>
      <input type="password" name="inputPassword" id="inputPassword" class="form-control" placeholder="Password" required>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      <br>
      <span>Don't have an account? </span><a href="signup.php">Create an account</a>
      <br>
      <a href="../index.php">Back to home</a>
      <p class="mt-5 mb-3 text-muted">&copy; 2020</p>
    </form>
  </body>
</html>