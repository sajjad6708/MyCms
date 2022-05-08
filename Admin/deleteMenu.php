<?php

include_once "../database/db.php";
$id= $_GET['id'];


$query= " DELETE  FROM `menu`  WHERE id= $id ";
$result = $db->query($query);


if($result){
    header("location:index.php");

}

?>