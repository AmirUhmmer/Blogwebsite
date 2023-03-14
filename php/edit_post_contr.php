<?php
include ("edit_post.php");

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $title = $_POST['titleToEdit'];
    $content = $_POST['contentToEdit'];
    $id = $_POST['idEdit'];

    $filename = ($_FILES['pictureToEdit']['name'] ? $_FILES['pictureToEdit']['name'] : $_POST['origPic']);
    $path = ($_FILES['pictureToEdit']['tmp_name'] ? $_FILES['pictureToEdit']['tmp_name'] : $_POST['origPic']);
    $new_path = ($_FILES['pictureToEdit']['name'] ? "pictures/" . $filename : $filename);

    $post = new edit_post();

    $post->update_db($title, $content, $new_path, $path, $id);

}