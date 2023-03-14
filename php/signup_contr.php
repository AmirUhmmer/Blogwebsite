<?php
session_start();
include ("signup.php");

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $uname = $_POST['username'];
    $upass = $_POST['password'];
    $upass1 = $_POST['password1'];

    $Adduser = new sign_up();

    $Adduser->add_user($uname, $upass, $upass1);

}