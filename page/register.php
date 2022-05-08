<?php
session_start();

$successmessage = null;


if (isset($_POST['sub'])) {

    $username = $_POST['username'];
    $age = $_POST['age'];
    $pass = $_POST['password'];
    $email = $_POST['email'];






    include_once "../database/db.php";

    $query = "INSERT INTO `register` (`id`, `username`, `email`, `age`,`password`) VALUES (NULL, '$username','$email','$age', MD5('$pass')); ";

    $result = $db->query($query);
    if ($result) {
        $successmessage = true;
        $_SESSION['user'] = $username;
        $_SESSION['password'] = $pass;
        $_SESSION['login']=1;
      

       
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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        .r {
            width: 30%;
            height: 30%;
            margin: 0 auto;
        }
    </style>

</head>

<body>

    <div id="header">
        <div class="r">
            <form method="POST" class="register-form">
                <input type="text" placeholder="نام کاربری" name="username">
                <input type="email" placeholder="ایمیل" name="email">
                <input type="number" placeholder="سن" name="age">
                <input type="password" placeholder="رمز عبور" name="password"><br>
                <input type="submit" name="sub" value="ثبت نام" class="btn btn-primary submit-register">
            </form>
           <a href="../index.php"> <div class="btn btn-info "> صفحه اصلی</div> </a>
        </div>
        <br />
    </div>


</body>

<?php if ($successmessage) { ?>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'success',
            title: 'ثبت نام با موفقیت انجام شد'
        })
    </script>


<?php
   }  

   ?>
<script src="js/jquery-3.5.1.slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.js"></script>

</html>
 
