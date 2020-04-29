<?php
	session_start();
	require_once('../settings.php');
	require_once(APP_ROUTE.'/lib/auth_lib.php');
	require_once(APP_ROUTE.'/lib/Db.php');

	$pdo=Db::Connect(DB_SETTINGS);
		
	$user = new User();
	$result = '';
	$result = modify($_POST, 'nonprofits');
	
    if(!($user->isAdmin('email'))){
		echo 'You do not have admin privileges on this account, click here to return to the <a href="../index.php">index page</a>';
		die();
	}
?>
<!doctype html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Modify a Non-Profit</title>

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

	<div class="form-group">
        <div class="col-sm-10 col-sm-offset-2">
            <?php echo $result; ?>    
        </div>
    </div>
	
	<main role="main" class="container">

      <div class="template">
	  <h1>Modify a Non-Profit</h1>
	  <p>Please select what to modify, the id of the Non-Profit and then enter the modification in the text box</p>
		<form method="POST" action="<?php $_SERVER['PHP_SELF']?>">
			<div class="form-group">
				<label for="drop">Select Field to Edit</label>
				<select id="drop" name="drop" class="form-control">
					<option value = "Name">Name</option>
					<option value = "streetName">Street Name</option>
					<option value = "state">State</option>
					<option value = "city">City</option>
					<option value = "zipCode">Zip Code</option>
					<option value = "phone">Phone</option>
					<option value = "email">Email</option>
					<option value = "founderFirstName">Founder's First Name</option>
					<option value = "founderLastName">Founder's Last Name</option>
					<option value = "missionStatement">Mission Statement</option>
				</select>
			</div>
			<div class="form-group">
				<label for="id">Enter ID of Entry to Edit</label>
				<input type="text" id="id" name="id" class="form-control">
			</div>
			<div class="form-group">
				<label for="edit">Information to Insert</label>
				<textarea id="edit" name="edit" rows="4" cols="65" class="form-control"></textarea>
			</div>
			<button type="submit" value="Submit" class="btn btn-primary">Submit</button>
		</form>
	   </div>
	</main>
</body>
</html>