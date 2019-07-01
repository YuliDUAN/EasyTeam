<?php
include "MySqlConnect.php";
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH'])){
    $x = $_GET['content'];
    $sql = "select * from sendnews where id=$x";
    $result = $conn->query($sql);
    $values = array();
    while ($row = mysqli_fetch_array($result)){
        $values = $row;
    }
    $sqlupdate = "update sendnews set static_news='1' where id=$x";
    $conn ->query($sqlupdate);
    mysqli_free_result($result);
    mysqli_close($conn);
    echo "标题：".$values['titlenews']."\n".",";
    echo "正文：".$values['txtnews']."\n".",";
    echo "来源：".$values['send_name'];
    exit();
}
?>
