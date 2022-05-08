<?php
session_start();
// include_once("menu.php");
include_once("blog.php");





?>




<html lang="fa">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="css/admin.css">
    <script src="//cdn.ckeditor.com/4.17.2/standard/ckeditor.js"></script>
    <title>cms</title>
</head>

<body>
    <div class="container-fluid"><br>
        <div class="row">
            <div class="col-12">
                <div class="card " style="text-align: right;">
                    <div class="card-header" style="text-align: right;">
                        پنل مدیریت
                       <div style="float: left;"><a href="../index.php"> <button  class=" btn btn-success">ورود به سایت</button></a></div>
                    </div>
                    <div class="card-body">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#menu" role="tab" aria-controls="nav-home" aria-selected="true">مدیریت منوها </a>
                                <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#writter" role="tab" aria-controls="nav-profile" aria-selected="false">نویسندگان </a>
                                <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#blog" role="tab" aria-controls="nav-profile" aria-selected="false"> پست </a>
                            </div>
                        </nav>

                        <!-- =====....<...menu.....>==== -->
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="menu" role="tabpanel" aria-labelledby="pills-home-tab">
                                <div class="row">
                                    <div class="col-8"><br>
                                        <div class="alert alert-success" role="alert">
                                            <h4 class="alert-heading">افزودن منو :</h4>

                                        </div>
                                        <form action="menu.php" method="POST">
                                            عنوان :<input type="text" class="form-control" name="title">
                                            اولویت بدی:<input class="form-control" type="text" name="sort">
                                            وضعیت: <div class="form-check " style="padding-right: 10;">
                                                <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="1" checked>
                                                <label class="form-check-label" for="exampleRadios1">
                                                    فعال
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="status" id="exampleRadios2" value="0">
                                                <label class="form-check-label" for="exampleRadios2">
                                                    غیرفعال
                                                </label>
                                            </div>
                                            <br>
                                            <button type="submit" name="sub" class="btn btn-primary">ثبت </button>

                                        </form>

                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="alert alert-success" role="alert">
                                            <h4 class="alert-heading">نمایش منوها :</h4>

                                        </div>
                                        <?php
                                        include_once "../database/db.php";

                                        $r = "SELECT * from menu ";
                                        $result = $db->query($r);
                                        ?>



                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">عنوان</th>
                                                    <th scope="col">اولویت</th>
                                                    <th scope="col">وضعیت</th>
                                                    <th scope="col">عملیات</th>
                                                </tr>
                                            </thead>
                                            <?php
                                            $num = 1;
                                            while ($row = $result->fetch()) {
                                                echo "<tbody>";
                                                echo "<tr>";
                                                echo "<th scope='row'>" . $num++ . "</th>";
                                                echo "<td>" . $row['title'] . "</td>";
                                                echo "<td>" . $row['sort'] . "</td>";
                                                echo "<td>" . $row['status'] . "</td>";
                                                echo "<td> <a href='deleteMenu.php?id=" . $row['id'] . "'> <div class='btn btn-danger' </a>حذف</td>";
                                                echo "<td> <a href='editMenu.php?id=" . $row['id'] . "'><div class='btn btn-warning' </a>ویرایش</td>";
                                                echo "</tr>";

                                                echo "</tbody>";
                                            }
                                            ?>






                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="writter" role="tabpanel" aria-labelledby="nav-profile-tab">

                                <!-- =======writter=== -->
                                <div class="row">
                                    <div class="col-8">
                                        <div class="alert alert-success" role="alert">
                                            <h4 class="alert-heading">افزودن نویسنده :</h4>
                                        </div>
                                        <form action="comment.php" method="POST">
                                            نام و نام خانوادگی نویسنده جدید:<input type="text" class="form-control" name="name" style="padding: 6px;"><br>
                                            <button type="submit" name="sub" class="btn btn-primary">ثبت </button>
                                        </form>
                                    </div>


                                </div>
                            </div>

                            <!-- ====end-writter=== -->

                            <div class="tab-pane fade" id="blog" role="tabpanel" aria-labelledby="nav-profile-tab">

                                <!-- ===start-blog=== -->
                                <div class="row">
                                    <div class="col-5">
                                        <div class="alert alert-success" role="alert">
                                            <h4 class="alert-heading">افزودن پست :</h4>

                                        </div>
                                        <form action="blog.php" method="POST">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">عنوان : </label>
                                                <input type="text" class="form-control" name="title">

                                            </div>
                                            <div class="form-group">
                                                <label"> تصویر:</label>
                                                    <input type="text" class="form-control" name="image">
                                            </div>

                                            <div class="form-group">
                                                <label for="my-textarea">متن:</label>
                                                <textarea class="form-control" name="content" id="editor1" rows="3"></textarea>
                                                <script>
                                                    CKEDITOR.replace('editor1');
                                                </script><br>
                                            </div>

                                            <div class="form-group">
                                                <label"> برچسب:</label>
                                                    <input type="text" class="form-control" name="tag">
                                            </div>

                                            <div class="form-group">

                                            نویسنده:
                                            <select name="writter" class="form-control">

                                                <?php
                                                $r = "SELECT * from writter ";
                                                $result = $db->query($r);

                                                while ($writter = $result->fetch()) { ?>
                                                    <option value="<?php echo $writter['name']; ?>"> <?php echo $writter['name']; ?></option>

                                                <?php } ?>


                                            </select>
                                            </div>
                                            <br>

                                            <button type="submit" class="btn btn-primary" name="add">ثبت </button>
                                        </form>
                                    </div>
                                </div>

                                <!-- ===================================================SHOW__POST===================== -->
                                <div class="row">
                                    <div class="col-12">
                                        <div class="alert alert-success" role="alert">
                                            <h4 class="alert-heading">نمایش پست ها:</h4>

                                        </div>
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">عنوان</th>
                                                    <th scope="col">تصویر </th>
                                                    <th scope="col">نویسنده</th>
                                                    <th scope="col">تاریخ</th>
                                                    <th scope="col">عملیات</th>
                                                </tr>
                                            </thead>
                                            <?php
                                           

                                            $num = 1;
                                            $mypost = "SELECT * from post order by id DESC ";
                                            $post = $db->query($mypost);



                                            while ($upost = $post->fetch()) {
                                                echo "<tbody>";
                                                echo "<tr>";
                                                echo "<th scope='row'>" . $num++ . "</th>";
                                                echo "<td>" . $upost['title'] . "</td>";
                                                echo "<td><img style='height: 150px;
                                                    ' src=" . $upost['image'] . " </td>";     ?>

                                                <td> <?php
                                                        echo $upost['writter'];
                                                        ?> </td>

                                                <td><?php echo jdate('Y/m/d', $upost['date']) ; ?></td>
                                                <?php
                                                echo "<td> <a href='deletePost.php?id=" . $upost['id'] . "'> <div class='btn btn-danger' </a>حذف</td>";
                                                echo "<td> <a href='editPost.php?id=" . $upost['id'] . "'><div class='btn btn-warning' </a>ویرایش</td>";

                                                ?>



                                            <?php
                                            }
                                            ?>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>


                </div>


            </div>

        </div>

    </div>





    <script src="../js/jquery-3.5.1.slim.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.js"></script>
</body>

</html>