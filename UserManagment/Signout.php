<?php
    session_start();
    require_once('../lib/auth_lib.php');
    $user = new User();
    $user->signout('email');
?>