<?php
session_start();
include_once "../database/db.php";

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <?php
        if (!isset($_SESSION['username'])) { ?>

            <div class="col-12">
                <p>لطفا ابتدا وارد شوید</p>
                <a href="register.php">
                    <div class="btn btn-outline-warning"> ثبت نام</div>
                </a>
                <a href="login.php">
                    <div class="btn btn-outline-info"> ورود</div>
                </a>
            </div>

        <?php
        } else {

            $user = $_SESSION['username'];
            $comment = $_POST['comment'];
            $time = $_POST['date'];

            $query = "INSERT INTO `comments` (`id`, `username`, `content`, `date`) VALUES (NULL, '$user', '$comment', '$time' )";
            $result2 = $db->query($query);


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
            }
            

        ?>

    </div>





</body>

</html>