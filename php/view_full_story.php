<?php
include ("conn.php");

class view_full extends db_connect {
    public $post_id;

    public function view_full_story($post_id){
        $con = $this->connect();
        $this->post_id = $post_id;

        $sql = "SELECT * FROM posts WHERE id = '$this->post_id' LIMIT 1";
        $res = mysqli_query($con, $sql);

        if($res && mysqli_num_rows($res) > 0) {
			$res_data = mysqli_fetch_assoc($res);
            echo '<div class="mx-auto text-center">
                    <span class="font-extrabold text-3xl text-red dark:text-white">'.$res_data["title"].'</span>
                  </div>
                  <div class="mt-7 w-full dark:text-whish">
                    <span>Author:</span>
                    <span>'.$res_data["username"].'</span>
                  </div>
                  <div class="mt-4 w-full dark:text-whish">
                  <span>Date posted:</span>
                  <span>'.$res_data["date_posted"].'</span>
                  </div>
                  <img src="'.$res_data["picture"].'" class="mx-auto rounded-xl mt-5 w-11/12 md:w-[600px]">
                  <div class="mt-7 dark:text-card_white"">
                    <p>'.$res_data["content"].'</p>
                  </div>';
		}
        else {
            echo json_encode("error");
        }
    }
}

if($_SERVER['REQUEST_METHOD'] == 'GET'){

    $post_id = $_GET['postId'];

    $view_full_story = new view_full();

    $view_full_story->view_full_story($post_id);

}
