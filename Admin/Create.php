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
	
	createDb($_POST);
	
    if(!($user->isAdmin('email'))){
		echo 'You do not have admin privileges on this account, click here to return to the <a href="../index.php">index page</a>';
		die();
	}
	

?>
<!doctype html>
<form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
	<label for="Name">Name</label><br>
	<input type="text" id="Name" name="Name"><br>
	
	<label for="streetName">Street Name</label><br>
	<input type="text" id="streetName" name="streetName"><br>
	
	<label for="state">State</label><br>
	<input type="text" id="state" name="state"><br>
	
	<label for="city">City</label><br>
	<input type="text" id="city" name="city"><br>
	
	<label for="zipCode">Zip Code</label><br>
	<input type="text" id="zipCode" name="zipCode"><br>
	
	<label for="phone">Phone Number</label><br>
	<input type="text" id="phone" name="phone"><br>
	
	<label for="email">E-mail</label><br>
	<input type="text" id="email" name="email"><br>
	
	<label for="founderFirstName">Founder First Name</label><br>
	<input type="text" id="founderFirstName" name="founderFirstName"><br>
	
	<label for="founderLastName">Founder Last Name</label><br>
	<input type="text" id="founderLastName" name="founderLastName"><br>
	
	<label for="missionStatement">Mission Statement</label><br>
	<textarea id="missionStatement" name="missionStatement" rows="4" cols="65"></textarea><br>
	
	<input type="submit" value="Submit">
</form>
	