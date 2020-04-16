<?php
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
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Group Project</title>
	
  </head>
  <body>
  <div class="container">
	
	<a type="button" href="signin.php" class="btn btn-primary">Sign In</a>
	<a type="button" href="signup.php" class="btn btn-secondary">Sign Up</a>
	<h1>List of Non-Profits</h1>
	<!-- Prints out List of Non-Profits -->
	<?php
		while($row=$info->fetch()){
			echo '<div class="card" style="width: 18rem;">
			<div class="card-body">
			<h5 class="card-title">'.$row['Name'].'</h5>
			<h6 class="card-subtitle mb-2 text-muted">'.$row['phone'].' '.$row['email'].'</h6>
			<p class="card-text">'.$row['missionStatement'].'</p>
			<a href="detail.php" class="card-link">More Details</a>
			<a href="donate.php" class="card-link">Donate</a>
			</div>
			</div>
			<hr>';
		}
	?>
	</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>