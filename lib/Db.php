<?php

    class DB{
        public static function Connect($settings){
            $opt=[
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false
                ];

            $pdo = new PDO('mysql:host='.$settings['host'].';dbname='.$settings['db'].';charset=utf8mb4'
            ,$settings['user'],$settings['password'],$opt);

            return $pdo;
        }
    }