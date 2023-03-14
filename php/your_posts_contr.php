<?php
include ("your_posts.php");

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $username = $_POST['username'];

    $user_posts = new your_posts();
    
    $user_posts->display_post($username);

}