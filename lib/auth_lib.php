<?php
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
        $settings=[
            'host'=>'localhost',
            'db'=>'nonprofitlistingdb',
            'user'=>'root',
            'pass'=>''
        ];
        
        $opt=[
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];
        
        $pdo= new PDO('mysql:host='.$settings['host'].';dbname='.$settings['db'].
        ';charset=utf8mb4', $settings['user'], $settings['pass'], $opt);

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
        $settings=[
            'host'=>'localhost',
            'db'=>'nonprofitlistingdb',
            'user'=>'root',
            'pass'=>''
        ];
        
        $opt=[
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];
        
        $pdo= new PDO('mysql:host='.$settings['host'].';dbname='.$settings['db'].
        ';charset=utf8mb4', $settings['user'], $settings['pass'], $opt);

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
        $settings=[
            'host'=>'localhost',
            'db'=>'nonprofitlistingdb',
            'user'=>'root',
            'pass'=>''
        ];
        
        $opt=[
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];
        
        $pdo= new PDO('mysql:host='.$settings['host'].';dbname='.$settings['db'].
        ';charset=utf8mb4', $settings['user'], $settings['pass'], $opt);


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
        $settings=[
            'host'=>'localhost',
            'db'=>'nonprofitlistingdb',
            'user'=>'root',
            'pass'=>''
        ];
        
        $opt=[
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];
        
        $pdo= new PDO('mysql:host='.$settings['host'].';dbname='.$settings['db'].
        ';charset=utf8mb4', $settings['user'], $settings['pass'], $opt);


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