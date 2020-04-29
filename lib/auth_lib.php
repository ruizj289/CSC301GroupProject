<?php


function createDb($data){
	require_once('../settings.php');
        require_once('Db.php');

        $pdo= DB::Connect(DB_SETTINGS);
	if(isset($data['streetName'])){
        $query='INSERT INTO nonprofits (Name, streetName, state, city, zipCode, phone, email, founderFirstName, founderLastName, missionStatement) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
        $q=$pdo->prepare($query);
        $q->execute([$data['Name'], $data['streetName'], $data['state'], $data['city'], $data['zipCode'], $data['phone'], $data['email'], $data['founderFirstName'], $data['founderLastName'], $data['missionStatement']]);
	}
	
}

function modify($data, $table){
	require_once('../settings.php');
        require_once('Db.php');

        $pdo= DB::Connect(DB_SETTINGS);
	if(isset($data['edit'])){
		if(strcmp($data['drop'],"password")==0){
			$data['edit'] = trim($data['edit']);
			$data['edit']= password_hash($data['edit'], PASSWORD_DEFAULT);
		}
		
        $query='UPDATE '.$table.' SET '.$data['drop'].'="'.$data['edit'].'" WHERE id = "'.$data['id'].'"';
        $q=$pdo->prepare($query);
        $q->execute();
		return '<div class="alert alert-success" role="alert">information successfully edited</div>';
	}
    return '';
}

function createUser($data){
    require_once('../settings.php');
        require_once('Db.php');

        $pdo= DB::Connect(DB_SETTINGS);

	if(isset($data['userType'])){
		if(!filter_var($data['email2'], FILTER_VALIDATE_EMAIL)) return '<div class="alert alert-danger" role="alert">The email that you entered is not valid</div>';
		$data['email2'] = strtolower($data['email2']);

		$data['password'] = trim($data['password']);
		if(strlen($data['password'])<8) return '<div class="alert alert-danger" role="alert">Password must be at least 8 characters long!</div>';

		$query='SELECT id FROM users WHERE email=?';
		$q=$pdo->prepare($query);
		$q->execute([$data['email2']]);

		if($q->rowCount()>0) return '<div class="alert alert-danger" role="alert">The email entered is already registered!</div>';

		$data['password']=password_hash($data['password'], PASSWORD_DEFAULT);

		$query='INSERT INTO users (firstName, lastName, email, password, userType) VALUES (?, ?, ?, ?, ?)';
		$q=$pdo->prepare($query);
		$q->execute([$data['firstName'], $data['lastName'], $data['email2'], $data['password'], $data['userType']]);

		return '<div class="alert alert-success" role="alert">User registered</div>';
    }
    return '';
}


class User{
    private $firstName;
    private $lastName;
    private $email;
    private $pwd;

    public function __construct($email=null, $pwd=null, $firstName=null, $lastName=null){
        $this->email = $email;
        $this->pwd = $pwd;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    public function isAdmin($field_name){
        require_once('../settings.php');
        require_once('Db.php');

        $pdo= DB::Connect(DB_SETTINGS);
        $user=$_SESSION[$field_name];
        $query='SELECT userType FROM users WHERE email=?';
        $q=$pdo->prepare($query);
        $q->execute([$user]);
        $result=$q->fetch();

        if(strcmp('admin', $result['userType']) == 0){
            return true;
        }
        else
            return false;
    }


    public function is_super_admin($field_name){
        require_once('../settings.php');
        require_once('Db.php');

        $pdo= DB::Connect(DB_SETTINGS);

        $user=$_SESSION[$field_name];
        $query='SELECT userType FROM users WHERE email=?';
        $q=$pdo->prepare($query);
        $q->execute([$user]);
        $result=$q->fetch();

        if(strcmp('superadmin', $result['userType']) == 0){
            return true;
        }
        else
            return false;
    }
    
    public function is_logged($field_name){
        return isset($_SESSION[$field_name]{0});
    }

    public function signup(){
        require_once('../settings.php');
        require_once('Db.php');

        $pdo= DB::Connect(DB_SETTINGS);


        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) return "The email that you entered is not valid";
        $this->email = strtolower($this->email);

        $this->pwd = trim($this->pwd);
        if(strlen($this->pwd)<8) return '<div class="alert alert-danger" role="alert">Password must be at least 8 characters long!</div>';

        $query='SELECT id FROM users WHERE email=?';
        $q=$pdo->prepare($query);
        $q->execute([$this->email]);

        if($q->rowCount()>0) return '<div class="alert alert-danger" role="alert">The email entered is already regestered!</div>';


        $this->pwd=password_hash($this->pwd, PASSWORD_DEFAULT);

        $query='INSERT INTO users (firstName, lastName, email, password, userType) VALUES (?, ?, ?, ?, ?)';
        $q=$pdo->prepare($query);
        $q->execute([$this->firstName, $this->lastName, $this->email, $this->pwd, 'user']);

        echo '<div class="alert alert-success" role="alert">You have successfully registered now you can <a href="../UserManagment/Signin.php">Sign in!</a></div>';
		return '';
    }
    public function signin(){
        require_once('../settings.php');
        require_once('Db.php');

        $pdo= DB::Connect(DB_SETTINGS);


        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) return "The email that you entered is not valid";
        $this->email = strtolower($this->email);

        $this->pwd = trim($this->pwd);
        
        $query='SELECT password FROM users WHERE email=?';
        $q=$pdo->prepare($query);
        $q->execute([$this->email]);

        if($q->rowCount()>0){
            $pwdArr=$q->fetch();
            $pwdDB=$pwdArr['password'];
            if(!password_verify($this->pwd, $pwdDB)){
                return '<div class="alert alert-danger" role="alert">Password does not match!</div>';
            }
            else{
                $_SESSION['email'] = $this->email;
                return '<div class="alert alert-success" role="alert">You have sucessfully signed in to your account. <a href="../index.php">Welcome!</a></div>';
            }  
        }
        return '<div class="alert alert-danger" role="alert">The credentials entered are not registered, you may need to <a href="../UserManagment/Signup.php">Sign Up</a></div>';
    }
    public function signout($field_name){
        if($_SESSION[$field_name]{0}) header('location: ../index.php');
        session_start();
        $_SESSION=[];
        session_destroy();
        header('location: ../index.php');
    }

    
}
?>