<?php
	session_start();
	include_once('../lib/auth_lib.php');

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
	$info=$pdo->query('SELECT * FROM nonprofits WHERE id='.$_GET['id']);
	$row=$info->fetch();
	
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


    <title><?= $row['Name']?></title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/starter-template/">

    <!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="Styles/custom.css" rel="stylesheet">
  </head>

  <body>
    <main role="main" class="container">

      <div class="template">
	  <?php
		echo '<div>
			<h3>'.$row['Name'].'</h3>
			<h5>Contact Information</h5>
			<p>'.$row['founderFirstName'].' '.$row['founderLastName'].'<br>
			'.$row['email'].' ('.$row['phone'].') <br>
			'.$row['streetName'].'  '.$row['city'].', '.$row['state'].'  '.$row['zipCode'].'<br>
			</p>
			<h5>Mission Statement</h5>
			<p>'.$row['missionStatement'].'</p>
			</div>
			<a href="DeleteFinalApproach2.php?id='.$_GET['id'].'" type="button">Delete</button>';
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