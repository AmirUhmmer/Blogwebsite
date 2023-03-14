<?php

include ("conn.php");

class getPostSnipp extends db_connect{
    
    public function postSnipp(){
        $con = $this->connect();
        $sql = "SELECT * FROM posts LIMIT 4";
        $res = mysqli_query($con, $sql);

        if (mysqli_num_rows($res) > 0) {
            while($row_data = mysqli_fetch_array($res)){
                echo '
                <div class="flex-col pt-4 md:ml-24 mx-auto md:mx-0">
                    <div>
                        <img src="'.$row_data["picture"].'" class="mx-auto rounded-xl h-[180px] w-11/12 md:w-[600px]">
                    </div>
                    <div class="mx-auto md:h-fit w-11/12 md:w-[600px] border-2 border-solid border-white shadow-black shadow-lg rounded-lg p-8 text-black">
                        <span class="md:ml-3 text-sm md:text-base">'.$row_data["date_posted"].'</span>
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
                </div>
                    ';
            }
        }
    }
}

// <div class="mx-auto mt-4 w-11/12 md:h-72 md:w-[1160px] border-2 border-solid border-white shadow-black shadow-lg rounded-lg p-8 text-black">
//                 <span class="md:ml-3 text-sm md:text-base">'.$row_data["date_posted"].'</span>
//                 <div class="flex items-center text-sm md:text-base mt-2 md:-mt-8 md:ml-[800px]">
//                     <img src="dp/user_default.png" class="w-7 h-7 md:w-10 md:h-10 rounded-full">
//                     <span class="ml-2">'.$row_data["username"].'</span>
//                 </div>  
//                 <div class="mt-2 text-lg font-extrabold md:text-3xl text-red"><span>'.$row_data["title"].'</span></div>
//                 <div class="mt-4 text-sm md:text-base font-bold text-black">
//                     <span>'.substr($row_data["content"], 0, 300).'...</span>
//                 </div>
//                 <div class="mt-5 text-sm font-extrabold md:text-xl text-blue-500 decoration-blue-600 hover:cursor-pointer hover:text-2xl hover:underline transition-all duration-200">
//                     <a href="full_story.html?post_id='.$row_data["id"].'">Read Full</a>
//                 </div>
//                 </div>

$snip = new getPostSnipp();
$snip->postSnipp();