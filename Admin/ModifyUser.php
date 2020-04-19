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
	
	modify($_POST, 'users');
	
	
    if(!($user->isAdmin('email'))){
		echo 'You do not have admin privileges on this account, click here to return to the <a href="../index.php">index page</a>';
		die();
	}
?>
<!doctype html>
<body>
	<form method="POST" action="<?php $_SERVER['PHP_SELF']?>">
		<label for="drop">Select Field to Edit</label>
		<select id="drop" name="drop">
			<option value = "firstName">First Name</option>
			<option value = "lastName">Last Name</option>
			<option value = "email">Email</option>
			<option value = "password">Password</option>
			<option value = "userType">User Type</option>
		</select><br>
		<label for="id">Enter ID of Entry to Edit</label>
		<input type="text" id="id" name="id"><br>
		<label for="edit">Information to Insert</label>
		<textarea id="edit" name="edit" rows="4" cols="65"></textarea><br>
		<input type="submit" value="Submit">
	</form>
</body>