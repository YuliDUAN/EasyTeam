<?php
include "MySqlConnect.php";
if (empty($_POST['static_join'])&&empty($_POST['mber'])&&empty($_POST['cap_sno'])){
    exit('提交不成功请重新提交！');
}
$static_join = $_POST['static_join'];
$mber = $_POST['mber'];
$cap_sno = $_POST['cap_sno'];
$tm_id = $_POST['team_id'];
if ($static_join == 2){
    $sql = "update static set static_join=$static_join where membersno=$mber and capsno=$cap_sno and tm_id = $tm_id";
    $result = $conn->query($sql);
    $row = mysqli_affected_rows($result);
    exit('提交成功');
}
exit();
?>