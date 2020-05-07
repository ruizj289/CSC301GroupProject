<?php
    session_start();
    require_once('settings.php');
		require_once(APP_ROUTE.'/lib/auth_lib.php');
	  require_once(APP_ROUTE.'/lib/Db.php');

	$pdo=Db::Connect(DB_SETTINGS);
		$info=$pdo->query('SELECT * FROM nonprofits');
		$login_check = new User();
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Non-Profit Connections</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/starter-template/">

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <!-- Custom styles for this template -->
  <link href="Styles/custom.css" rel="stylesheet">
  <link rel="icon" href="https://garfieldparkacademy.org/wp-content/uploads/2018/04/hand_heart_donate_icon.png"
    type="image/icon type">
</head>

<body>
  <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="index.php">Non-Profit Connections</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars" aria-controls="navbars"
      aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbars">

      <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
          <a class="nav-link" href="index.php">Home</a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <?php
			if($login_check->is_logged('email')){
?>
        <a class="nav-link text-light" href="UserManagment/Signout.php">Sign Out</a>

        <?php
			}
			else{
				?>

        <a class="nav-link text-light" href="UserManagment/Signin.php">Sign In</a>
        <a class="nav-link text-light" href="UserManagment/SignUp.php">Sign Up</a>
        <?php
			}
?>
      </form>
  </nav>
  <div class="jumbotron">
    <div class="container">
      <h1 class="display-4 text-center">Welcome to Non-Profit Connections</h1>
      <p class="lead text-center">We offer different Non-Profits, please click on more details to learn more about each
        of the
        Non-Profits.
        In order to donate to a Non-Profit, please either sign up or sign in to your account to make a contribution.</p>
    </div>
  </div>
  <main role="main" class="container">

    <div class="card-deck">
      <?php
		while($row=$info->fetch()){
      ?>
      <div class="card" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title"><?=$row['Name'] ?></h5>
          <h6 class="card-subtitle mb-2 text-muted"><?= $row['phone'].' '.$row['email'] ?></h6>
          <p class="card-text"><?= $row['missionStatement'] ?></p>
          <a href="detail.php?id='<?=$row['id']?>'" class="card-link">More Details</a>
          <?php 
        if($login_check->is_logged('email')){
          ?>
          <a href="donate.php?id='<?=$row['id']?>'" class="card-link">Donate</a>
          <?php
        }
        ?>
        </div>
      </div>
      <?php 
		}
	?>
    </div>

  </main><!-- /.container -->

  <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
  </script>
  <script>
    window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')
  </script>
  <script src="../../assets/js/vendor/popper.min.js"></script>
  <script src="../../dist/js/bootstrap.min.js"></script>
</body>

</html>