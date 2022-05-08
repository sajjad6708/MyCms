<?php
if (isset($_POST['sub'])) {


    $title =  $_POST['title'];
    $sort = $_POST['sort'];
    $status = $_POST['status'];

    include_once "../database/db.php";
    $query  = "INSERT INTO `menu` (`id`, `title`, `sort`, `status`) VALUES (NULL, '$title', '$sort', '$status')";
    $result = $db->query($query);
}



if($result){
    header("location:index.php");
}
?>
