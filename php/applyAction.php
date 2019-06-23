<?php
session_start();
include "MySqlConnect.php";
if (!empty($_POST["comment"])){
    $image = "images/t21.jpg";
    $comment = $_POST["comment"];
    $ctime = date("Y-m-d");
    $uid = $_SESSION["uid"];
    $name = $_SESSION["username"];
    $sql = "insert into forum(name,image,comment,ctime,uid)values ('$name','$image','$comment','$ctime','$uid')";
    $request = $conn->query($sql);
    header("location:apply.php");
}
?>