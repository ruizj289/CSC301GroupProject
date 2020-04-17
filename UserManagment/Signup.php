<?php
    session_start();
    require_once('../lib/auth_lib.php');
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $user = new User($_POST['inputEmail'], $_POST['inputPassword'], $_POST['inputFirstName'], $_POST['inputLastName']);
        $error= $user->signup();
          if(isset($error{0})) echo $error;
    }
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Sign Up</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


    <!-- Custom styles for this template -->
    <link href="../Styles/signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form class="form-signin" method="POST" action="Signup.php">
      <h1 class="h3 mb-3 font-weight-normal">Please sign up</h1>
      <label for="inputFirstName" class="sr-only">First Name</label>
      <input type="text" name="inputFirstName" id="inputFirstName" class="form-control" placeholder="First Name" required autofocus>
      <br>
      <label for="inputLastName" class="sr-only">Last Name</label>
      <input type="text" id="inputLastName" name="inputLastName" class="form-control" placeholder="Last Name" required>
      <br>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" id="inputEmail" class="form-control" name="inputEmail" placeholder="Email address" required>
      <br>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Password" required>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2020</p>
    </form>
  </body>
</html>