<?php
include "MySqlConnect.php";
$team_id = $_POST['team_id'];
if (!empty($_POST['team_id'])){
    $sql = "select * from team_mem where team_id = '$team_id'";
    $res = $conn->query($sql);
    while($row = mysqli_fetch_array($res)){
        echo "队伍成员信息"."\n".",";
        echo "队伍成员："."学号:".$row['member_sno']." 姓名:".$row['team_member']."\n".",";
    }
}
mysqli_close($conn);
?>


