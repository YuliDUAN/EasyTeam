<?php
$id=$_POST["id"];
$ac_id=$_POST["ac_id"];
$prize=$_POST["team_prize"];
include "z_mysql.php";
$sql1="update team set team_prize='$prize' where team_id='$id'and ac_id='$ac_id'";
$result = $conn->query($sql1);
if($result==true){
    echo "<script>alert('修改成功！');location.href='z_team.php?id=$ac_id';</script>";
}else{
    echo "<script>alert('修改失败！');location.href='z_team.php?id=$ac_id';</script>";
}
mysqli_free_result($result);
?>