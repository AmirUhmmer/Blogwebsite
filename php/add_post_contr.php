<?php
session_start();
include ("add_post.php");

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $title = $_POST['title'];
    $content = $_POST['content'];
    $username = $_SESSION['username'];

    $filename = $_FILES['picture']['name'];
    $path = $_FILES['picture']['tmp_name'];
    $new_path = "pictures/" . $filename;

    $post = new add_post();

    $post->add_to_db($title, $content, $username, $new_path, $path);

}