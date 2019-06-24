<?php
include "MySqlConnect.php";
if (!empty($_POST['rinfo'])){
    $rid = $_GET['rid'];
    $reply = $_POST['rinfo'];
    $rtime = date("Y-m-d");
    $fid = $_GET['fid'];
    $name = $_GET['name'];
    $sql = "insert into replys(rid,name,reply,rtime,fid)values ('$rid','$name','$reply','$rtime','$fid')";
    $request = $conn->query($sql);
    header("location:apply.php");
}

?>