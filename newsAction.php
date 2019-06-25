<?php
include "MySqlConnect.php";
$send_id = $_GET['send_id'];
$receive_id = $_GET['receive_id'];
$send_name = $_GET['send_name'];
$titlenews = $_POST['titlenews'];
$txtnews = $_POST['txtnews'];
$send_time = date("Y-m-d");
$sql = "insert into sendnews(send_id,send_name,titlenews,txtnews,receive_id,send_time)
values('$send_id','$send_name','$titlenews','$txtnews','$receive_id','$send_time')";
$conn->query($sql);
header("location:apply.php");
?>