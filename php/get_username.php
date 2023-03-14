<?php
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    try {
        
        if(isset($_SESSION['username'])){
            echo $_SESSION['username'];
        }
           
    }
    catch(Exception $e) {
        $_SESSION['username'] = 'Login';
    }
    

}