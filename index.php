<?php
		session_start();
		require_once('lib/auth_lib.php');
		$settings=[
		'host'=>'localhost',
		'db'=>'nonprofitlistingdb',
		'user'=>'root',
		'password'=>''
		];

		$opt=[
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
		PDO::ATTR_EMULATE_PREPARES => false
		];
		//connecting to database
		$pdo = new PDO('mysql:host='.$settings['host'].';dbname='.$settings['db'].';charset=utf8mb4',
		$settings['user'],$settings['password'],$opt);	
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
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="Styles/custom.css" rel="stylesheet">
  </head>

  <body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="index.php">Non-Profit Connections</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars" aria-controls="navbars" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbars">
        <ul class="navbar-nav mr-auto">
		<?php
			if($login_check->is_logged('email')){
?>
			 <li class="nav-item active">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="UserManagment/Signout.php">Sign Out</a>
          </li>
<?php
			}
			else{
				?>
				 <li class="nav-item active">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="UserManagment/Signin.php">Sign In</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="UserManagment/SignUp.php">Sign Up</a>
          </li>
<?php
			}
?>
         
      </div>
    </nav>

    <main role="main" class="container">

      <div class="template">
	  <?php
		while($row=$info->fetch()){
			echo '<div class="card" style="width: 18rem;">
			<div class="card-body">
			<h5 class="card-title">'.$row['Name'].'</h5>
			<h6 class="card-subtitle mb-2 text-muted">'.$row['phone'].' '.$row['email'].'</h6>
			<p class="card-text">'.$row['missionStatement'].'</p>
			<a href="detail.php?id='.$row['id'].'" class="card-link">More Details</a>
			<a href="donate.php?id='.$row['id'].'" class="card-link">Donate</a>
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