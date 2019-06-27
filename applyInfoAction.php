<?php
include "MySqlConnect.php";
if (!empty($_POST['rinfo'])){
    $rid = $_GET['rid'];
    $reply = $_POST['rinfo'];
    $rtime = date("Y-m-d");
    $fid = $_GET['fid'];
    $name = $_GET['name'];
    $id = $_GET['id'];
    $sql = "insert into replys(rid,name,reply,rtime,fid,replyid) values ('$rid','$name','$reply','$rtime','$fid','$id')";
    $request = $conn->query($sql);
    header("location:apply.php");
}

?>