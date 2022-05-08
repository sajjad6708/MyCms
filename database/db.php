<?php
$db= new PDO("mysql:host=localhost;dbname=mycms","root","");

if($db->errorCode()){
    die('could not connect'. $db->errorInfo());

}