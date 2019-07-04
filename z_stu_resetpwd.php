<?php
$sno=$_GET["sno"];
include ("z_mysql.php");
$result=$conn->query("update ruser set password='111111' where sno='$sno'");
if($result==true){
    echo "<script>alert('密码重置成功');location.href='z_student.php';</script>";
}

?>