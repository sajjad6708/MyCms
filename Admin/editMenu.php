<?php
include "../database/db.php";
$id = $_GET['id'];

if (isset($_POST['sub'])) {
    $title =  $_POST['title'];
    $sort = $_POST['sort'];
    $status = $_POST['status'];


$query = $db->prepare("UPDATE menu set title=? , sort=? , status=? where id=?");
$query->bindValue(1,$title);
$query->bindValue(2,$sort);
$query->bindValue(3,$status);
$query->bindValue(4,$id);

$resultupdate = $query->execute();

}


$query = $db->prepare("SELECT * from `menu` where id=?");
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
    <title>ویرایش منو</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card " style="text-align: right;">
                    <div class="card-header" style="text-align: right;">
                        ویرایش
                    </div>
                    <div class="card-body">
                        <form  method="POST">
                            عنوان :<input type="text" class="form-control" name="title" value="<?php echo $row['title'];  ?>">
                            اولویت بدی:<input class="form-control" type="text" name="sort" value="<?php echo $row['sort'];  ?>">
                            وضعیت: <div class="form-check " style="padding-right: 10;">
                                <input class="form-check-input" type="radio" name="status" id="exampleRadios1"<?php if($row['status']==1){ ?> checked <?php ;}?>>
                                <label class="form-check-label" for="exampleRadios1">
                                    فعال
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="exampleRadios2" "<?php if($row['status']==0){ ?> checked <?php ;}?>>
                                <label class="form-check-label" for="exampleRadios2">
                                    غیرفعال
                                </label>
                            </div>
                            <input type="submit" value="ثبت" name="sub">

                        </form>
                        <a href="index.php">
                            <div class="btn btn-info">بازگشت</div>
                        </a>
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