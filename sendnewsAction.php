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

    echo "标题-".$values['titlenews']."\n";
    echo "正文:".$values['txtnews']."\n";
    echo "来源:".$values['send_name'];
}
?>
