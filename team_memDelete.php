<?php
$teamid=$_GET["teamid"];
include("z_mysql.php");
$result=$conn->query("delete from team_mem where team_id='$teamid'");
if($result==true){
    echo "<script>alert('退出成功');location.href='team.php';</script>";
}else{
    echo "<script>alert('退出失败');location.href='team.php';</script>";

}
mysqli_free_result($result);
?>
