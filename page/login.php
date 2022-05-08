<?php
session_start();
include "../database/db.php";
if (isset($_POST['sub'])){
    $username = $_POST['username'];
    $password =  md5($_POST['password']) ;

    $result = $db->prepare("SELECT * from register where username = ? AND  password=? ");

    $result->bindParam(1, $username);
    $result->bindParam(2, $password);
    $result->execute();

    if ($result->rowCount()>=1){
        $row = $result->fetch(PDO::FETCH_ASSOC);
        $_SESSION['login']= true;
        $_SESSION['username'] = $row['username'];
        $_SESSION['password'] = $row['password'];
        header("location:../index.php");

        
    }
    else
    {
echo "nono";
    }


}


 
        ?>

<html lang="fa">

<head>
    <meta charset="UTF-8">
    <title>weblog</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="//cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
</head>

<body>
    <div class="container">
        <br>

        <!-- start headers -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">وبلاگ</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">خانه <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">پروفایل</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            مقالات
                        </a>
                       
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0 mr-auto">
                <div><img src="../image/logo.png" alt="" id="logo" ><b><p style="margin-right: 24px;">سجاد</p></b></div>
                 
                   
                </form>
            </div>
        </nav>
    </div>
    <!-- end headers -->

    <br><br><br><br><br>
    <div class="container">
        <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-12 col-lg-4">
                <form method="POST" class="register-form" action="login.php">
                    <input type="text" placeholder="نام کاربری" name="username">
                    <input type="password" placeholder="رمز عبور" name="password"><br>
                    <input type="checkbox" class="rememberme" ><span class="remembermelabel">مرا به خاطر بسپار</span>
                    <input  name="sub" type="submit" value="ورود " class="btn btn-primary submit-register">
                </form>
            </div>
            <div class="col-lg-4"></div>
        </div>
    </div>


    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <!-- footer my website -->

    <footer>
        <div class="footer1">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-7"><br><br><br>
                        <form>
                         
                            <a href="register.php"><input type="button" class="btn btn-success" value="عضویت در سایت ما"></a>
                        </form>
                    </div>
                    <div class="col-12 col-lg-5">
                        <div class="namad">
                            <img src="../image/namad1.jpg" alt="">
                            <img src="../image/namad2.jpg" height="166px" alt="">
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





































