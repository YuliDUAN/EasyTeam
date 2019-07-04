<?php
include "MySqlConnect.php";
session_start();
if (!empty($_POST['id'])&&!empty($_POST['url'])){
    $id = $_POST['id'];
    $url = $_POST['url'];
    $c_sno = $_SESSION['sno'];
    $c_time = date("Y-m-d");
    $sqlurl = "select c_ar_id from collect where a_id = '$id' and c_sno = '$c_sno'";
    $resulturl = $conn->query($sqlurl);
    if (empty($rowurl = mysqli_fetch_array($resulturl))){
        $sql = "insert into collect(c_ar_id,url,c_sno,c_time,a_id)values ('0','$url','$c_sno','$c_time','$id')";
        $conn->query($sql);
        exit('收藏成功！');
    }else{
        exit('你已收藏！');
    }


}
?>