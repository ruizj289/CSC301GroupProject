<?php

  session_start();
  require_once('../settings.php');
	require_once(APP_ROUTE.'/lib/auth_lib.php');
	
	$user = new User();
    if(!($user->isAdmin('email'))){
		echo 'You do not have admin privileges on this account, click here to return to the <a href="../index.php">index page</a>';
		die();
	}
	

?>
<!doctype html><!--no page formatting yet just functional-->

<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Admin Page</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/starter-template/">

    <!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="../Styles/custom.css" rel="stylesheet">
    <link rel="icon" href="https://garfieldparkacademy.org/wp-content/uploads/2018/04/hand_heart_donate_icon.png" type="image/icon type">
</head>

<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="#">Non-Profit Connections</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars" aria-controls="navbars" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbars">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="../index.php">Home</a>
          </li>
      </div>
    </nav>
	<main role="main" class="container">

      <div class="template">
	  <h1>Welcome to the Admin Home</h1>
	  <p>Please select an action you would like to perform:</p>
	<a href="Create.php" class="text-decoration-none">Click here to create a new non-profit</a><br>
	<a href="Delete.php" class="text-decoration-none">Click here to delete a non-profit</a><br>
	<a href="Modify.php" class="text-decoration-none">Click here to modify an existing non-profit</a><br>
	<a href="CreateUser.php" class="text-decoration-none">Click here to add a new user</a><br>
	<a href="DeleteUser.php" class="text-decoration-none">Click here to delete a user</a><br>
	<a href="ModifyUser.php" class="text-decoration-none">Click here to modify an existing user</a>
	</div>
	</main>
</body>