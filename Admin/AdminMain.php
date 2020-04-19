<?php

	session_start();
	require_once('../lib/auth_lib.php');
	
	$user = new User();
    if(!($user->isAdmin('email'))){
		echo 'You do not have admin privileges on this account, click here to return to the <a href="../index.php">index page</a>';
		die();
	}
	

?>
<!doctype html><!--no page formatting yet just functional-->
<title>Admin Page</title>

<head>
</head>

<body>
	<a href="Create.php">Click here to create a new non-profit</a><br>
	<a href="Delete.php">Click here to delete a non-profit</a><br>
	<a href="Modify.php">Click here to modify an existing non-profit</a><br>
	<a href="CreateUser.php">Click here to add a new user</a><br>
	<a href="DeleteUser.php">Click here to delete a user</a><br>
	<a href="ModifyUser.php">Click here to modify an existing user</a>
</body>