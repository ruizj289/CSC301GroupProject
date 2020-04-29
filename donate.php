<?php
	session_start();
	require_once('settings.php');
	require_once(APP_ROUTE.'/lib/auth_lib.php');
	require_once(APP_ROUTE.'/lib/Db.php');
	require_once(APP_ROUTE.'/lib/DonationManager.php');

	$pdo=Db::Connect(DB_SETTINGS);
    $info=$pdo->query('SELECT * FROM nonprofits WHERE id='.$_GET['id']);
    $row=$info->fetch();
    $user = new User();
	$id=$_GET['id'];
	$result='';
	
    
  if ($_SERVER["REQUEST_METHOD"] === "POST") {
	Donation::MakeDonation($_POST['amount'], $id);
	$result ='<div class="alert alert-success" role="alert">Donation Completed!</div>'; 
  }
?>
<!doctype html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Donate</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/starter-template/">

    <!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="Styles/custom.css" rel="stylesheet">
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
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
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
	  <h1>Donate to <?= $row['Name']?></h1>
	  <p>Please input the amount you want to donate and the payment information then click Donate.</p>
		<form method="POST" action="<?php $_SERVER['PHP_SELF']?>">
			<div class="form-group">
				<label for="amount">Enter amount to donate</label>
				<input type="number" id="amount" name="amount" class="form-control" step="0.01" min="0" required>
			</div>
			<div class="form-group">
  				<label for="ccNum">Enter Card Number</label>
				<input type="text" id="ccNum" name="ccNum" class="form-control" required minlength="16">
			</div>
  			<div class="form-group">
			  <label for="expDate">Enter Expiration Date</label>
			  <input type="text" id="expDate" name="expDate" class="form-control" required>
			</div>
			<div class="form-group">
			  <label for="code">Enter CVV code</label>
			  <input type="text" id="code" name="code" class="form-control" required>
			</div>
			<button type="submit" value="Submit" class="btn btn-primary">Donate</button>
		</form>
	   </div>
	</main>
</body>
</html>