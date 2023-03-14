<?php
session_start();


if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $username = ($_SESSION['username'] ? $_SESSION['username'] : 'Login');

    echo $username;

}
