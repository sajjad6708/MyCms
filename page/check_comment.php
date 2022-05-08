<?php
session_start();
include_once "../database/db.php";

if(isset($_SESSION['username'])){
    $username = $_SESSION['username'];
}





    $comments = "SELECT * FROM `comments` ";
    $result = $db->query($comments);



if($result->rowCount()>0){
     while($comment = $result->fetch()){; ?>



    <div class="comments">
        <div class="comment-item">
            <div class="comment-image">
                <img src="../image/prof<?php echo rand(1, 5); ?>.png" alt="">
            </div>
            <div class="comment-text">
                <p class="username-comment"> <?php echo $comment['username'];   ?></p>
                <span>ارسال شده در <?php echo jdate('Y/m/d', $comment['date']);   ?></span>
                <p class="text-comment"><?php echo $comment['content'];   ?></p>

            </div>
        </div>


    </div>


<?php

          }
        }



?>