<?php

include ("conn.php");

class your_posts extends db_connect{

    public $username;

    public function display_post($username){

        $con = $this->connect();
        $this->username = $username;

        $sql = "SELECT * FROM posts WHERE username = '$this->username'";
        $res = mysqli_query($con, $sql);

        if (mysqli_num_rows($res) > 0) {
            while($row_data = mysqli_fetch_array($res)){
                echo '
                    <tr class="border-b-2 border-gray-600">
                    <td id="title" class="md:w-">'.$row_data["title"].'</td>
                    <td id="contentToDisplay" class="md:min-w-[550px] hidden md:table-cell">'.substr($row_data["content"], 0, 100).'...</td>
                    <td id="content" class="md:w-auto hidden">'.$row_data["content"].'</td>
                    <td id="pictureDB" class="md:w-auto hidden md:table-cell"><img src="'.$row_data["picture"].'" class="h-[150px] w-[150px]"></td>
                    <td class="md:w-1/6 md:pl-20"><input onclick="showEditPost(this)" type="button" name="edit" value="Edit" class="rounded-md text-whish bg-green-600 h-[40px] w-[100px] hover:cursor-pointer hover:bg-transparent hover:text-black hover:border-[1px] hover:border-green-600 transition-all duration-150" 
                    data-idEdit="'.$row_data["id"].'" data-titleEdit="'.$row_data["title"].'" data-contentEdit="'.htmlspecialchars($row_data["content"]).'" data-pictureEdit="'.$row_data["picture"].'"></td>
                    <td class="md:w-1/6 md:pr-20"><input onclick="deleteButton(this)" type="button" name="delete" value="Delete" class="rounded-md text-whish bg-red h-[40px] w-[100px] hover:cursor-pointer hover:bg-transparent hover:text-black hover:border-[1px] hover:border-red transition-all duration-150" 
                    data-id="'.$row_data["id"].'" data-title="'.$row_data["title"].'" data-content="'.htmlspecialchars($row_data["content"]).'" data-picture="'.$row_data["picture"].'"></td>
                    </tr>
                    ';
            }
        }
        
        else {
            echo '<tr class="border-b-2 border-gray-600">
            <td>No stories to tell</td>
            </tr>';
        }
    }
}