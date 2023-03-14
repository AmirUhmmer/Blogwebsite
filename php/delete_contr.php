<?php
session_start();
include ("delete.php");

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $id = $_POST['id'];

    $delete_post = new delete_post();

    $delete_post->delete_in_db($id);

}