<?php
include "MySqlConnect.php";
//aid=${aid}&&asno=${asno}
if (!empty($_POST['c_id'])&&!empty($_POST['c_sno'])){
    $c_ar_id = $_POST['c_id'];
    $c_sno = $_POST['c_sno'];
    $sql = "delete from collect where c_ar_id=$c_ar_id and c_sno = $c_sno";
    $conn->query($sql);
    exit('取消成功');
}
?>