<?php
include "../database/db.php";
include_once "../database/confing/jdf.php";
$input = $_GET['id'];

$posts = "SELECT * FROM `post` WHERE id= $input";
$result = $db->query($posts);

$p = $result->fetch();

$post_id = $p['id'];

$view = $db->prepare("INSERT INTO view values (null , :id)");
$view->bindParam(":id", $post_id, PDO::PARAM_INT);
$view->execute();

$views = $db->prepare(" SELECT  count(*) from view  where post = ?");
$views->bindValue(1, $post_id);
$views->execute();
$numviews = $views->fetch(PDO::FETCH_ASSOC);

foreach ($numviews as $numview) {
}

$members = "SELECT * FROM `register` ";
$result = $db->query($members);

$member = $result->fetch();










?>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <title><?php echo $p['title']; ?></title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="//cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>

    <script lang="javascript">
        $(document).ready (function(){
            var username = "<?php $_SESSION['username'] ; ?>";
            window.setInterval(updatecomments, 2000);

            function updatecomments(){
                $.ajax({
                    type: "POST",
                    url: "check_comment.php",

                    data: {
                        user: username
                    },
                    success: function(response) {
                       $(".commentBox").html(response);
                    },
                    error: function(xhr, status) {
                       
                     $(".commentBox").html(response);
                    }
                });

            }

            $("#sub_co").click(function(){
             comment = $("#editor1").val();
             time = <?php time() ;?>;
             $.ajax({
                 type: "POST",

                 url: "comments.php",

                 data : {
                     comment :comment ,
                     date:time
                 },
                 success:(function (response) {
                     $(".commentBox").html(response);
                     
                 }),
                 error : (function (xhr ,status ){
                    $(".commentBox").html(response);

                 }),


             })







            })


        })


    </script>



</head>

<body>
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
                    <li class="nav-item active">
                        <a class="nav-link" href="../">خانه <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">پروفایل</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            مقالات
                        </a>
                        <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#"> آموزش</a>
                            <a class="dropdown-item" href="#"> زندگی نامه</a>
                            <a class="dropdown-item" href="#"> ارتباط</a>
                        </div>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0 mr-auto">
                    <div><img src="../image/logo.png" alt="" id="logo"><b>
                            <p style="margin-right: 24px;">سجاد</p>
                        </b></div>

                </form>
            </div>
        </nav>
    </div>
    <!-- end headers -->
    <!-- ==========================================start post=================== -->
    <br><br><br>
    <div class="container">
        <div class="row">
            <div class="col-10">

                <div class="post-page">
                    <div class="image-post">
                        <img src="<?php echo $p['image']; ?>" alt="" style="max-width: 910px;">
                    </div>
                    <div class="information-post">
                        <div> <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                <path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                            </svg><?php echo $numview; ?></div>
                        <div style=" font-size:13px "><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                            </svg><?php echo $p['writter']; ?></div>

                        <div><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-calendar2-date-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 3.5c0-.276.244-.5.545-.5h10.91c.3 0 .545.224.545.5v1c0 .276-.244.5-.546.5H2.545C2.245 5 2 4.776 2 4.5v-1zm7.336 9.29c-1.11 0-1.656-.767-1.703-1.407h.683c.043.37.387.82 1.051.82.844 0 1.301-.848 1.305-2.164h-.027c-.153.414-.637.79-1.383.79-.852 0-1.676-.61-1.676-1.77 0-1.137.871-1.809 1.797-1.809 1.172 0 1.953.734 1.953 2.668 0 1.805-.742 2.871-2 2.871zm.066-2.544c.625 0 1.184-.484 1.184-1.18 0-.832-.527-1.23-1.16-1.23-.586 0-1.168.387-1.168 1.21 0 .817.543 1.2 1.144 1.2zm-2.957-2.89v5.332H5.77v-4.61h-.012c-.29.156-.883.52-1.258.777V8.16a12.6 12.6 0 0 1 1.313-.805h.632z" />
                            </svg><?php echo jdate('dF'); ?></div>
                    </div>
                    <br>
                    <div class="content-post">
                        <h5><?php echo $p['title']; ?></h5>
                        <br>
                        <p style="max-width: 910px;"><?php echo $p['content']; ?></p>

                    </div>

                    <br>
                    <div class="tag-post">
                        <?php $tags = explode(',', $p['tag']);
                        foreach ($tags as $tag) {
                        ?>

                            <span><?php echo $tag ?></span>
                        <?php } ?>

                    </div><br>

                    <!-- =====coments===== -->
                    <div>
                        <b>فیض میبریم از نظرات شما </b>

                        <br>
                        <form action="comments.php" method="POST">
                            <div class="form-group">
                                <label for="my-textarea"></label>
                                <textarea class="form-control" name="comment" id="editor1" rows="3"></textarea>
                                <script>
                                    CKEDITOR.replace('editor1');
                                </script><br>
                            </div>

                            <br>
                            <input type="submit" id="sub_co" name="sub_co" value="ثبت دیدگاه" class="btn btn-success">
                        </form>
                    </div>

                    <div class="commentBox">



                    </div>
                
                </div>

            </div>
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