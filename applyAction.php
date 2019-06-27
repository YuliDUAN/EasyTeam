<?php
session_start();
include "MySqlConnect.php";
if (!empty($_POST["comment"])){
    $comment = $_POST["comment"];
    $ctime = date("Y-m-d");
    $sno = $_SESSION["sno"];
    echo $sno;
    $name = $_SESSION["username"];
    $sql = "insert into forum(name,comment,ctime,uid)values ('$name','$comment','$ctime','$sno')";
    $request = $conn->query($sql);
    header("location:apply.php");
}
?>