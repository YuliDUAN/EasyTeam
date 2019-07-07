<?php
include "MySqlConnect.php";
if (!empty($_POST['sno'])){
    $sno = $_POST['sno'];
    $sql = "update sendnews set static_news = 1 where receive_id = '$sno'";
    $conn->query($sql);
    mysqli_close($conn);
    exit('全部已读！');
}else{
    exit('操作失败请重新登陆！');
}
?>