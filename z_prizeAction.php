<?php
include "z_mysql.php";
$id=$_GET["id"];
$sql1="SELECT team_id FROM team";
$result = $conn->query($sql1);
$row = mysqli_fetch_array($result);
for($i=0;$i<count($row);$i++){
    $prize=$_POST["$id"];
    $sql2="update team set team_prize='$prize'where team_id='$row[$i]'";
    $result = $conn->query($sql2);
}
         mysqli_free_result($result);
        
         echo "<script >alert('录入成功');location.href='z_page.php';</script>";
 ?>        
