<?php
session_start();
include ("login.php");

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $uname = $_POST['username'];
    $upass = $_POST['password'];

    $user = new login();

    $user->login_user($uname, $upass);

}