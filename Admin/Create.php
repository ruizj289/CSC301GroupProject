<?php

	session_start();
	require_once('../settings.php');
	require_once(APP_ROUTE.'/lib/auth_lib.php');
	
	require_once(APP_ROUTE.'/lib/Db.php');

	$pdo=Db::Connect(DB_SETTINGS);
	$user = new User();
	
	createDb($_POST);
	
    if(!($user->isAdmin('email'))){
		echo 'You do not have admin privileges on this account, click here to return to the <a href="../index.php">index page</a>';
		die();
	}
	

?>
<!doctype html>
<head>

	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Add a Non-Profit</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/starter-template/">

    <!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="../Styles/custom.css" rel="stylesheet">
	<link rel="icon" href="https://garfieldparkacademy.org/wp-content/uploads/2018/04/hand_heart_donate_icon.png" type="image/icon type">

</head>
</body>
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
	  <h1>Add a New Non-Profit</h1> 
	  <p>Please enter the fields to create the new Non-Profit</p>
	  
	<form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
		<div class="form-group">
			<label for="Name" >Name</label>
			<input type="text" id="Name" name="Name" class="form-control">
		</div>
			<div class="form-group">
			<label for="streetName">Street Name</label>
		<input type="text" id="streetName" name="streetName" class="form-control">
		</div>
		<div class="form-group">
			<label for="state">State</label>
			<input type="text" id="state" name="state" class="form-control">
		</div>
		<div class="form-group">
			<label for="city">City</label>
			<input type="text" id="city" name="city" class="form-control">
		</div>
		<div class="form-group">
			<label for="zipCode">Zip Code</label>
			<input type="text" id="zipCode" name="zipCode" class="form-control">
		</div>
		<div class="form-group">
			<label for="phone">Phone Number</label>
			<input type="text" id="phone" name="phone" class="form-control">
		</div>
		<div class="form-group">
			<label for="email">E-mail</label>
			<input type="text" id="email" name="email" class="form-control">
		</div>
		<div class="form-group">
			<label for="founderFirstName">Founder First Name</label>
			<input type="text" id="founderFirstName" name="founderFirstName" class="form-control">
		</div>
		<div class="form-group">
			<label for="founderLastName">Founder Last Name</label>
			<input type="text" id="founderLastName" name="founderLastName" class="form-control">
		</div>
		<div class="form-group">
			<label for="missionStatement">Mission Statement</label>
			<textarea id="missionStatement" name="missionStatement" rows="4" cols="65" class="form-control"></textarea><br>
		</div>
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
	</div>
	</main> 
	</body>
</html>
	