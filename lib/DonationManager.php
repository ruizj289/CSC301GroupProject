<?php

class Donation{
    public static function MakeDonation($amount, $id_of_nonprofit){
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

        $pdo = new PDO('mysql:host='.$settings['host'].';dbname='.$settings['db'].';charset=utf8mb4'
        ,$settings['user'],$settings['password'],$opt);

        $currentDate = date("Y-m-d");
        $email=$_SESSION['email'];
        $query='SELECT id from users WHERE email=?';
        $q=$pdo->prepare($query);
        $q->execute([$email]);
        $row= $q->fetch();

        $query='INSERT INTO donation (userID, nonprofitID, amount, dateOfTransaction) VALUES (?, ?, ?, CURDATE())';
        $q=$pdo->prepare($query);
        $q->execute([$row['id'], $id_of_nonprofit, $amount]);



    }
}

?>