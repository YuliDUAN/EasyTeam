<?php
$teamid=$_GET["teamid"];

include("z_mysql.php");
$result1=$conn->query("delete from team_mem where team_id='$teamid'");
$result2=$conn->query("delete from team where team_id='$teamid'");
if($result1==true&&$result2==true){
    echo "<script>alert('删除成功');location.href='team.php';</script>";
}else{
    echo "<script>alert('删除失败');location.href='team.php';</script>";

}
mysqli_free_result($result);
?>