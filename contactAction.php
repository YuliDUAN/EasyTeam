<?php
session_start();
include "MySqlConnect.php";
/**
 * Created by PhpStorm.
 * User: 聚贤阁--康少
 * Date: 2019/6/25
 * Time: 20:05
 */

    $phone = $_POST['Phone'];
    $message = $_POST['Message'];
    $sno = $_SESSION['sno'];
    if (strlen($phone)!=0){
        $sql1 = "update ruser set phone = '$phone' where sno = '$sno'";
        $result = $conn->query($sql1);
        header("location:contact.php");
    }
    if (strlen($message)!=0){
        $sql2 = "update ruser set phone =phone ,brief = '$message' where sno = '$sno'";
        $result = $conn->query($sql2);
        header("location:contact.php");
    }

header("location:contact.php");
mysqli_free_result($result);
?>