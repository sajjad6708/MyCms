<?php
include_once("../database/db.php");

$id = $_GET['id'];

if (isset($_POST['sub'])) {

    $title = $_POST['title'];
    $image = $_POST['image'];
    $content = $_POST['content'];
    $tag = $_POST['tag'];
    $writer = $_POST['writter'];
    $time = time();


    $query = $db->prepare("UPDATE post set title=? , image=? , content=?  , tag=? , writter=? , date=?  where id=?");
    $query->bindValue(1, $title);
    $query->bindValue(2, $image);
    $query->bindValue(3, $content);
    $query->bindValue(4, $tag);
    $query->bindValue(5, $writer);
    $query->bindValue(6, $time );
    $query->bindValue(7, $id );


    $query->execute();

}










$r = "SELECT * from writter ";
$result = $db->query($r);
$writters = $result->fetch();



$query = $db->prepare("SELECT * from `post` where id=?");
$query->bindValue(1, $id);

$result = $query->execute();

$row = $query->fetch();


?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="css/admin.css">
    <script src="//cdn.ckeditor.com/4.17.2/standard/ckeditor.js"></script>
    <title>ویرایش پست ها</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-5">
                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">افزودن پست :</h4>

                </div>
                <form method="POST">
                    <div class="form-group">
                        <label for="exampleInputEmail1">عنوان : </label>
                        <input type="text" class="form-control" name="title" value="<?php echo $row['title'];  ?>">

                    </div>
                    <div class="form-group">
                        <label"> تصویر:</label>
                            <input type="text" class="form-control" name="image" value="<?php echo $row['image'];  ?>">
                    </div>

                    <div class="form-group">
                        <label for="my-textarea">متن:</label>
                        <textarea class="form-control" name="content" id="editor1" rows="3"><?php echo $row['content'];  ?></textarea>
                        <script>
                            CKEDITOR.replace('editor1');
                        </script><br>
                    </div>

                    <div class="form-group">
                        <label"> برچسب:</label>
                            <input type="text" class="form-control" name="tag" value="<?php echo $row['tag'];  ?>">
                    </div>
                    نویسنده:
                    <select name="writter" class="form-control">

                        <option value="<?php echo $row['writter']; ?>" <?php if ($row['writter'] == $writters['name']) {  ?> selecte <?php ;
                                                                                                                                } ?>>

                            <?php
                            echo $row['writter'];

                            ?>





                        </option>



                    </select>




                    <br>

                    <button type="submit" class="btn btn-primary d-block" name="sub">ثبت </button>
                </form>
                <a href="index.php"> <button class="btn btn-light"> بازگشت</button></a>
            </div>
        </div>
    </div>
</body>

</html>