<?php

	session_start();
	require_once('../lib/auth_lib.php');
	
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
	$pdo = new PDO('mysql:host='.$settings['host'].';dbname='.$settings['db'].';charset=utf8mb4',$settings['user'],$settings['password'],$opt);
		
	$user = new User();
	
	createUser($_POST);
	
    if(!($user->isAdmin('email'))){
		echo 'You do not have admin privileges on this account, click here to return to the <a href="../index.php">index page</a>';
		die();
	}
	

?>
<!doctype html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<title>Create a User</title>

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
				<h1>Create a new User</h1>
				<p>Please Enter all of the information, and then click submit to create the new user</p>
				<form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
					<div class="form-group">
						<label for="firstName">First Name</label>
						<input type="text" id="firstName" name="firstName" class="form-control" required>
					</div>

					<div class="form-group">
						<label for="lastName">Last Name</label>
						<input type="text" id="lastName" name="lastName" class="form-control" required>
					</div>

					<div class="form-group">
						<label for="email2">Email</label>
						<input type="text" id="email2" name="email2" class="form-control" required>
					</div>

					<div class="form-group">
						<label for="password">Password</label>
						<input type="text" id="password" name="password" minlength="8" class="form-control" required>
					</div>

					<div class="form-group">
						<label for="userType">User Type</label>
						<input type="text" id="userType" name="userType" class="form-control" required>
					</div>

					<button type="submit" value="Submit" class="btn btn-primary">Submit</button>
				</form>
			</div>
		</main>
	</body>
</html>