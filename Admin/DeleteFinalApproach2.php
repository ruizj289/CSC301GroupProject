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
	
	$id=$_GET['id'];
	$pdo = new PDO('mysql:host='.$settings['host'].';dbname='.$settings['db'].';charset=utf8mb4',
	$settings['user'],$settings['password'],$opt);
	$query='DELETE FROM nonprofits WHERE id = "'.$id.'"';
	$q=$pdo->query($query);
	
?>
<a href="AdminMain.php">Entry deleted, return to main</a>