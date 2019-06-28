<?php
include "MySqlConnect.php";
if (!empty($_POST)&&!empty($_POST['leaveText'])){
    $uid = $_GET['uid'];
    $sno = $_GET['sno'];
    $id = $_GET['id'];
    $leaveText = $_POST['leaveText'];
    echo $leaveText;
    $lmtime = date("Y-m-d");
    $sql = "insert into lvmessage(lmsno,lmessage,selfsno,lmtime)values ('$uid','$leaveText','$sno','$lmtime')";
    $res=$conn->query($sql);
    header("location:leaveword_other.php?uid=".$uid.'&'.'id='.$id);
}
?>