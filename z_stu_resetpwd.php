<?php
$sno=$_GET["sno"];
include ("z_mysql.php");
$a='111111';
//对密码进行加密处理
function createPassword($password){
    if(!$password){
        return false;
    }
    return md5(md5($password).'eTeam');
}
$psd=createPassword($a);

$result=$conn->query("update ruser set password='$psd' where sno='$sno'");
if($result==true){
    echo "<script>alert('密码重置成功');location.href='z_student.php';</script>";
}

?>