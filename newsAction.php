<?php
include "MySqlConnect.php";
$titlenews = $_POST['titlenews'];
$txtnews = $_POST['txtnews'];
if (!empty($_POST) && !empty($titlenews) && !empty($txtnews)) {
    $send_id = $_GET['send_id'];
    $receive_id = $_GET['receive_id'];
    $send_name = $_GET['send_name'];
    $send_time = date("Y-m-d");
    $sql = "insert into sendnews(send_id,send_name,titlenews,txtnews,receive_id,send_time)
values('$send_id','$send_name','$titlenews','$txtnews','$receive_id','$send_time')";
    $conn->query($sql);
    header("location:apply.php");
} else {
    echo '<script>alert("发送内容不能为空！");window.location.href="apply.php"</script>';
}

mysqli_free_result($result);
?>