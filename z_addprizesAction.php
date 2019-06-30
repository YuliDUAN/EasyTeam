<?php
$id=$_GET["id"];
$team_name=$_POST["team_name"];
$team_cap=$_POST["team_cap"];
$prize=$_POST["team_prize"];
include "z_mysql.php";
$sql1="SELECT team_id FROM team where team_name='$team_name'and team_cap='$team_cap'";
$result = $conn->query($sql1);
$row = mysqli_fetch_array($result);
if($row>0){
    $sql2="update team set team_prize='$prize' where team_id='$row[0]'";
    $result2 = $conn->query($sql2);
    echo "<script>alert('录入成功！');location.href='z_addprizes.php?id=$id';</script>";
}else{
    echo "<script>alert('该队伍不存在！');location.href='z_addprizes.php?id=$id';</script>";
}
//for($i=0;$i<count($row);$i++){
//    $prize=$_POST["$id"];
//    $sql2="update team set team_prize='$prize'where team_id='$row[$i]'";
//    $result = $conn->query($sql2);
//}
//mysqli_free_result($result);
//
//echo "<script >alert('录入成功');location.href='z_page.php';</script>";
?>