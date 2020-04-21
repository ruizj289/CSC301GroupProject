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
	$info=$pdo->query('SELECT * FROM users WHERE id='.$_GET['id']);
	$row=$info->fetch();
	
	$user = new User();
	if(!($user->isAdmin('email'))){
		echo 'You do not have admin privileges on this account, click here to return to the <a href="../index.php">index page</a>';
		die();
	}
	
	$id=$_GET['id'];
	$pdo = new PDO('mysql:host='.$settings['host'].';dbname='.$settings['db'].';charset=utf8mb4',
	$settings['user'],$settings['password'],$opt);
	$query='DELETE FROM users WHERE id = "'.$id.'"';
	$q=$pdo->query($query);
	
?>
<link rel="icon" href="https://garfieldparkacademy.org/wp-content/uploads/2018/04/hand_heart_donate_icon.png" type="image/icon type">
<a href="AdminMain.php">Entry deleted, return to main</a>