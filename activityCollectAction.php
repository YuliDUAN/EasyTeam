<?php
include "MySqlConnect.php";
session_start();
if (!empty($_POST['arid'])&&!empty($_POST['url'])){
    $c_ar_id = $_POST['arid'];
    $url = $_POST['url'];
    $c_sno = $_SESSION['sno'];
    $c_time = date("Y-m-d");
    $sqlurl = "select c_ar_id from collect where c_ar_id = $c_ar_id";
    $resulturl = $conn->query($sqlurl);
    if (empty($rowurl = mysqli_fetch_array($resulturl))){
        $sql = "insert into collect(c_ar_id,url,c_sno,c_time)values ('$c_ar_id','$url','$c_sno','$c_time')";
        $conn->query($sql);
        exit('收藏成功！');
    }else{
        exit('你已收藏！');
    }

}
?>