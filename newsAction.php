<?php
include "MySqlConnect.php";
$titlenews = $_POST['titlenews'];
$txtnews = $_POST['txtnews'];
$a_id=$_POST['a_id'];
if (!empty($_POST) && !empty($titlenews) && !empty($txtnews)) {
    $send_id = $_GET['send_id'];
    $receive_id = $_GET['receive_id'];
    $send_name = $_GET['send_name'];
    $send_time = date("Y-m-d");
    if ($send_id == $receive_id){
        echo '<script>alert("发送失败！");</script>';
        header("location:apply.php?id=".$a_id);
    }else{
        $sql = "insert into sendnews(send_id,send_name,titlenews,txtnews,receive_id,send_time)
values('$send_id','$send_name','$titlenews','$txtnews','$receive_id','$send_time')";
        $conn->query($sql);
        header("location:apply.php?id=".$a_id);
    }

} else {
    echo '<script>alert("发送内容不能为空！");</script>';
    header("location:apply.php?id=".$a_id);
}
mysqli_free_result($result);
?>