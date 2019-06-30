<?php


session_start();
$username=$_POST["name"];
$pwd=$_POST["pwd"];

include("z_mysql.php");
$result=$conn->query("select * from admin where name='$username'and pass='$pwd'");
$rows = mysqli_fetch_array($result);

if($rows[1]==$pwd){
    echo "<script>alert('登陆成功');</script>";
    header("location:z_index.php?name=$username");

}else{
    echo "<script>alert('登陆失败');location.href='z_login.php';</script>";

}
mysqli_free_result($result);
?>