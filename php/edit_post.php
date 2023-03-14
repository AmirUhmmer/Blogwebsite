<?php
include ("conn.php");

class edit_post extends db_connect{
    public $title;
    public $content;
    public $id;

    public function update_db($title, $content, $new_path, $path, $id){
        $con = $this->connect();
        $this->title = $title;
        $this->content = $content;
        $this->id = $id;
        $date = date("Y-m-d");

        $sql_del = "SELECT * FROM posts WHERE id = '$this->id'";
        $res = mysqli_query($con, $sql_del);
            
            if (mysqli_num_rows($res) > 0) {
              $row_data = mysqli_fetch_array($res);
              if($row_data['picture'] != $new_path){
                unlink('../'.$row_data['picture']);
              }
            }

        $sql = $con->prepare("UPDATE posts SET title=?, content=?, picture=?, date_posted=? WHERE id='$this->id'");
        
        $sql->bind_param("ssss",  $this->title, $this->content, $new_path, $date);

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