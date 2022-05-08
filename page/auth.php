<?php
session_start();

function islogin(){
    if (isset($_SESSION['login']) and $_SESSION['login']== 1){
        return true;
    }
    else
    {
        return false;

    }
   
     

}

function dologin($u,$p){
    include_once "../database/db.php";

    $query = $db->prepare("SELECT * from register where username= :username");
    $query->bindParam(':username',$u,PDO::PARAM_STR);
    $result = $query->execute();

    if(!$result){
        return false;
    }else{
        $row = $query->fetch();
        if($row['password'] == md5($p)){
            $_SESSION['login'] = 1;
            $_SESSION['displayName'] = $row['username'];
}


function logout(){
    unset($_SESSION['login'] , $_SESSION['username']);
}

    }}
    ?>