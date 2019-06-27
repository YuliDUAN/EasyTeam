<?php
include "MySqlConnect.php";
$reply = $_POST['rinfo'];
if (!empty($_POST)&&!empty($reply)){
    $rid = $_GET['rid'];
    $rtime = date("Y-m-d");
    $fid = $_GET['fid'];
    $name = $_GET['name'];
    $id = $_GET['id'];
    $sql = "insert into replys(rid,name,reply,rtime,fid,replyid)values ('$rid','$name','$reply','$rtime','$fid','$id')";
    $request = $conn->query($sql);
    header("location:apply.php");
}else{
    echo '<script>alert("回复内容不能为空");window.location.href="apply.php"</script>';
}
mysqli_free_result($result);
?>