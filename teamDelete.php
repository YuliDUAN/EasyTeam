<?php
$tid=$_POST["teamid"];
include "MySqlConnect.php";
$sql3="select team_name,email,sno from team,team_mem,ruser where team.team_id=team_mem.team_id 
and team_mem.member_sno=ruser.sno and team.team_id='$tid'";
$result3=$conn->query($sql3);
$arr = array();
while ($rows = mysqli_fetch_array($result3)){
    $txtnews = $rows[0].'队伍已解散！';
    $receive_id = $rows[2];
    $send_time = date("Y-m-d");
    $sql_c = "insert into sendnews(send_id,send_name,titlenews,txtnews,receive_id,send_time)
        values('111111111111','系统','队伍解散提示','$txtnews','$receive_id','$send_time')";
    $conn->query($sql_c);
}
$conn->query("delete from team_mem where team_id='$tid'");
$conn->query("delete from team where team_id='$tid'");
$conn->query("delete from static where tm_id='$tid'");
mysqli_close($conn);
exit("解散成功,消息已发送！");
?>