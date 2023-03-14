<?php
include ("conn.php");

class add_post extends db_connect{
    public $title;
    public $content;
    public $username;

    public function add_to_db($title, $content, $username, $new_path, $path){
        $con = $this->connect();
        $this->title = $title;
        $this->content = $content;
        $this->username = $username;
        $date = date("Y-m-d");

        
        $sql = $con->prepare("INSERT INTO posts (username, title, content, picture, date_posted) VALUES (?, ?, ?, ?, ?)");
        $sql->bind_param("sssss", $this->username, $this->title, $this->content, $new_path, $date);

        if ($sql->execute()) {
            // Insertion was successful
            echo "Post inserted successfully!";
            move_uploaded_file($path, '../'.$new_path);

          } else {
            // There was an error
            echo "Error: " . $sql->error;
          }
          
        $sql->close();
    }
}