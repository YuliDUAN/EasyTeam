<?php
include "MySqlConnect.php";
if (!empty($_POST['sno'])){
    $sno = $_POST['sno'];
    $sql = "delete from sendnews where receive_id = $sno";
    $conn->query($sql);
    exit('已全部删除！');
}else{
    exit('操作失败请重新登陆！');
}
?>