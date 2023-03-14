<?php

include ("conn.php");

class display_posts_page extends db_connect{
    
    public function show_all_posts(){
        $con = $this->connect();
        $sql = "SELECT * FROM posts";
        $res = mysqli_query($con, $sql);

        if (mysqli_num_rows($res) > 0) {
            while($row_data = mysqli_fetch_array($res)){
                echo '
                <div class="mx-auto mt-4 w-11/12 md:h-fit md:w-[1160px] border-2 border-solid border-white shadow-black shadow-lg rounded-lg p-8 text-black">
                <span class="md:ml-1 text-sm md:text-base">'.$row_data["date_posted"].'</span>
                <div class="flex items-center text-sm md:text-base mt-2">
                    <img src="dp/user_default.png" class="w-7 h-7 md:w-10 md:h-10 rounded-full">
                    <span class="ml-2">'.$row_data["username"].'</span>
                </div>  
                <div class="mt-2 text-lg font-extrabold md:text-3xl text-red"><span>'.$row_data["title"].'</span></div>
                <div class="mt-4 text-sm md:text-base font-bold text-black">
                    <span>'.substr($row_data["content"], 0, 300).'...</span>
                </div>
                <div class="mt-5 text-sm font-extrabold md:text-xl text-blue-500 decoration-blue-600 hover:cursor-pointer hover:text-2xl hover:underline transition-all duration-200">
                    <a href="full_story.html?post_id='.$row_data["id"].'">Read Full</a>
                </div>
                </div>
                    ';
            }
        }
    }
}

$snips = new display_posts_page();
$snips->show_all_posts();