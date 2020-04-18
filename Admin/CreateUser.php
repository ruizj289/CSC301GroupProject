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
<form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
	<label for="firstName">First Name</label><br>
	<input type="text" id="firstName" name="firstName"><br>
	
	<label for="lastName">Last Name</label><br>
	<input type="text" id="lastName" name="lastName"><br>
	
	<label for="email2">Email</label><br>
	<input type="text" id="email2" name="email2"><br>
	
	<label for="password">Password</label><br>
	<input type="text" id="password" name="password"><br>
	
	<label for="userType">User Type</label><br>
	<input type="text" id="userType" name="userType"><br>
	
	<input type="submit" value="Submit">
</form>