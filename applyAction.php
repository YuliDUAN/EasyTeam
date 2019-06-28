<?php
session_start();
include "MySqlConnect.php";
$comment = $_POST["comment"];
$ac_id=$_GET["ac_id"];
if (!empty($_POST)&&!empty($comment)){
    $ctime = date("Y-m-d");
    $sno = $_SESSION["sno"];
    echo $sno;
    $name = $_SESSION["username"];
    $sql = "insert into forum(name,comment,ctime,uid,ac_id)values ('$name','$comment','$ctime','$sno','$ac_id')";
    $request = $conn->query($sql);
    header("location:apply.php?id=".$ac_id);
}else{
    echo '<script>alert("跟帖内容不能为空")</script>';
    header("location:apply.php?id=".$ac_id);
}
mysqli_free_result($result);
?>