<?php
include "database/db.php";
include "database/jdf.php";
include_once  "page/auth.php";


$num_blog = $db->prepare("SELECT * from post ");

$num_blog->execute();
$blogs = $num_blog->fetch();
$blogs_num = $num_blog->rowCount();

$views = $db->prepare(" SELECT  count(*) from view  where post = ?");
$views->bindValue(1 , $blogs['id']);
$views->execute();
$numviews = $views->fetch(PDO::FETCH_ASSOC);

foreach ($numviews as $numview) {}

$num_writter = $db->prepare("SELECT * from writter ");

$num_writter->execute();
$writters = $num_writter->fetch();
$writters_num = $num_writter->rowCount();

$num_register = $db->prepare("SELECT * from register ");

$num_register->execute();
$registers = $num_register->fetch();
$registers_num = $num_register->rowCount();

// ==================menu===================

$menu = $db->prepare("SELECT *  from menu order by sort  ");
$menu->execute();

// ========================= post======================


$post = $db->prepare("SELECT *  from post ");
$post->execute();

function limit_words($string, $word_limit)
{
    $words = explode(" ", $string);
    return implode(" ", array_splice($words, 0, $word_limit));
}







?>






<html lang="fa">

<head>
    <meta charset="UTF-8">
    <title>weblog</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery-3.6.0.min.js"></script>
</head>

<body>
    <?php

        ?>

        <div class="container">
        <br>

        <!-- start headers -->

       

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">وبلاگ</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <?php
                    while ($menus = $menu->fetch()) {
                        if ($menus['status'] == 1) {
                    ?>
                            <li class="nav-item active">
                                <a class="nav-link" href="#"><?php echo $menus['title'];  ?> </a>
                            </li>
                    <?php

                        }
                    }





                    ?>




                    <?php if (isset ($_SESSION['login'])){  ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            حساب کاربری
                        </a>
                       
                   

                        <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
                                <p class="dropdown-item"> خوش اومدی</p>
                                <a class="dropdown-item" href="page/log.php">خروج</a>
                                <a class="dropdown-item" href="Admin/index.php">پنل کاربری</a>
                            </div>
                    </li>




                 <?php       
                    } 
                    else
                    {
                        ?>
                        
                    <li class="nav-item">
                        <a class="nav-link" href="page/register.php">ثبت نام </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="page/login.php"> ورود</a>
                    </li>

<?php
                    } 
                    ?>

               
           

                    <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="page/login.php"> ورود </a>

                    </div>
                    </li>

                <?php

                      


                ?>

                </ul>
                <form class="form-inline my-2 my-lg-0 mr-auto">
                    <div><img src="image/logo.png" alt="" id="logo" ><b><p style="margin-right: 24px;">سجاد</p></b></div>
                 
                   
                </form><br>
                
            </div>
            
        </nav>
        
        <!-- end headers -->

        <!-- start content -->
        <br>
        <hr>
        <br>
        <div>
            <div class="row d-none d-lg-flex">
                <div class="col-4 information-site">
                    <img src="image/blog1.svg" alt="">
                    <span>تعداد مقالات</span>:
                    <span><?php echo $blogs_num; ?></span>
                </div>
                <div class="col-4 information-site">
                    <img src="image/writer.svg" alt="">
                    <span>نویسندگان ما : <?php echo $writters_num; ?></span>
                </div>
                <div class="col-4 information-site">
                    <img src="image/member1.svg" alt="">
                    <span>تعداد کاربران : <?php echo $registers_num; ?></span>
                </div>
            </div>
        </div>
        <!-- end content -->
        <br><br class="d-none d-lg-block"><br class="d-none d-lg-block">
        <!-- start posts -->

        <div>
            <h5 style="padding: 10px;">
                زندگی نامه بوکسور های مشهور
            </h5>
            <div class="row">
                <?php while ($posts = $post->fetch()) { ?>

                    <div class="col-12 col-lg-4">
                        <div class="post-item">
                            <a href="page/singel.php?id= <?php echo $posts['id'];  ?>" class="item-hover-btn"><img src="<?php echo $posts['image'];  ?>" alt="" width="100%">
                               
                                   
                             
                            </a>

                            <div class="post-caption">
                                <p><a href="page/singel.php?id= <?php echo $posts['id'];  ?>"> <?php echo $posts['title'];  ?></a></p>
                                <span>
                                    <?php echo limit_words($posts['content'], 20); ?>

                                </span>
                                <br><br>
                                <span class="seen-post">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                        <path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                    </svg><?php  echo $numview; ?>
                                </span>

                                <span class="seen-post post-comment">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chat-square-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M2 0a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h2.5a1 1 0 0 1 .8.4l1.9 2.533a1 1 0 0 0 1.6 0l1.9-2.533a1 1 0 0 1 .8-.4H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                    </svg>۷
                                </span>

                                <span class="float-left post-m">
                                    <a href="">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                        </svg> <?php echo $posts['writter'];    ?>
                                    </a>
                                </span>
                            </div>
                        </div>
                    </div>
                <?php

                }

                ?>
            </div>
        </div>
    </div>

    <br><br>
    <hr><br><br>

    <!-- footer my website -->

    <footer>
        <div class="footer1">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-7"><br><br><br>
                        <form>
                         
                            <a href="page/register.php"><input type="button" class="btn btn-success" value="عضویت در سایت ما"></a>
                        </form>
                    </div>
                    <div class="col-12 col-lg-5">
                        <div class="namad">
                            <img src="image/namad1.jpg" alt="">
                            <img src="image/namad2.jpg" height="166px" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer2">
            <p class="container">تمام حقوق این وبسایت برای اینجانب سجاددشتبان وزیر محفوظ است و هرگونه استفاده بدونه اجازه از ما پیگرد قانونی دارد</p>
        </div>
    </footer>



   
</body>
<script src="js/jquery-3.5.1.slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.js"></script>

</html>