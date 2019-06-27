<?php
session_start();
include "MySqlConnect.php";
$comment = $_POST["comment"];
if (!empty($_POST)&&!empty($comment)){
    $ctime = date("Y-m-d");
    $sno = $_SESSION["sno"];
    echo $sno;
    $name = $_SESSION["username"];
    $sql = "insert into forum(name,comment,ctime,uid)values ('$name','$comment','$ctime','$sno')";
    $request = $conn->query($sql);
    header("location:apply.php");
}else{
    echo '<script>alert("跟帖内容不能为空");window.location.href="apply.php"</script>';
}
mysqli_free_result($result);
?>