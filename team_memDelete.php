<?php
$teamid=$_GET["teamid"];
$sno=$_GET["sno"];
include("z_mysql.php");
$result=$conn->query("delete from team_mem where team_id='$teamid'");
$result1=$conn->query("delete from static where tm_id='$teamid' and membersno='$sno'");
if($result==true&&$result1==true){
    echo "<script>alert('退出成功');location.href='team.php';</script>";
}else{
    echo "<script>alert('退出失败');location.href='team.php';</script>";

}
mysqli_free_result($result);
?>
