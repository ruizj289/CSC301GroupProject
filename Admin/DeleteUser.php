<?php
	session_start();
	require_once('../settings.php');
	require_once(APP_ROUTE.'/lib/auth_lib.php');
	require_once(APP_ROUTE.'/lib/Db.php');

	$pdo=Db::Connect(DB_SETTINGS);
	$info=$pdo->query('SELECT * FROM users');
	
	$user = new User();
	if(!($user->isAdmin('email'))){
		echo 'You do not have admin privileges on this account, click here to return to the <a href="../index.php">index page</a>';
		die();
	}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Delete User</title>

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
              <a class="nav-link" href="AdminMain.php">Admin Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../index.php">Home</a>
            </li>
        </div>
      </nav>
    <main role="main" class="container">

      <div class="template">
      <h1>Delete a User</h1>
      <p>Please click on More Details to look at the details and to be presented the option to delete the user</p>
	  <?php
		while($row=$info->fetch()){
			echo '<div class="card" style="width: 18rem;">
			<div class="card-body">
			<h5 class="card-title">'.$row['firstName'].' '.$row['lastName'].'</h5>
			<h6 class="card-subtitle mb-2 text-muted">'.$row['email'].'</h6>
			<p class="card-text">'.$row['userType'].'</p>
			<a href="DeleteUserFinal.php?id='.$row['id'].'" class="card-link">More Details</a>
			</div>
			</div>
			<hr>';
		}
	?>
      </div>

    </main><!-- /.container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
  </body>
</html>