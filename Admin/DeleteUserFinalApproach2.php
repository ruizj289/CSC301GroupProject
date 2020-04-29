<?php
	session_start();
	require_once('../settings.php');
	require_once(APP_ROUTE.'/lib/auth_lib.php');
	require_once(APP_ROUTE.'/lib/Db.php');

	$pdo=Db::Connect(DB_SETTINGS);
	$info=$pdo->query('SELECT * FROM users WHERE id='.$_GET['id']);
	$row=$info->fetch();
	
	$user = new User();
	if(!($user->isAdmin('email'))){
		echo 'You do not have admin privileges on this account, click here to return to the <a href="../index.php">index page</a>';
		die();
	}
	
	$id=$_GET['id'];
	$query='DELETE FROM users WHERE id = "'.$id.'"';
	$q=$pdo->query($query);
	
?>
<link rel="icon" href="https://garfieldparkacademy.org/wp-content/uploads/2018/04/hand_heart_donate_icon.png" type="image/icon type">
<a href="AdminMain.php">Entry deleted, return to main</a>