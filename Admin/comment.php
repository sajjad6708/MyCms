<?php 
if (isset($_POST['sub'])) {

    $name =  $_POST['name'];

    include_once "../database/db.php";
    $query  = "INSERT INTO `writter` (`id`, `name`) VALUES (NULL, '$name')";
    $result = $db->query($query);

    if($result){
        header("location:index.php");

    }
}




?>





