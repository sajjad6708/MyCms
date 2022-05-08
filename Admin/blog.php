<?php
include_once "../database/db.php";
include "../database/jdf.php";


if (isset($_POST['add'])){

 
    $title = $_POST['title'];
    $image = $_POST['image'];
    $content = $_POST['content'];
    $tag = $_POST['tag'];
    $writer = $_POST['writter'];
    $time = time();
    
    
    
    $query = "INSERT INTO `post` (`id`, `title`, `image`, `content`, `tag`,`writter` ,`date`) VALUES (NULL, '$title', '$image', '$content', '$tag' ,'$writer' , '$time')";
    $result2 = $db->query($query);

    if($result2){
        header("location:index.php");
    }
    else
    {
        echo "oops   error";
    }
    
    
    
     }

?>

