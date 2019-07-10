<?php
session_start();
include "MySqlConnect.php";
/**
 * Created by PhpStorm.
 * User: 聚贤阁--康少
 * Date: 2019/6/25
 * Time: 21:38
 */
if($_SERVER['REQUEST_METHOD']=='POST'){
    //var_dump($_FILES);
    if (!isset($_FILES['avatar'])){
        $GLOBALS['message'] = '未上传文件';
        return;
    }
    $avatar = $_FILES['avatar'];
    //var_dump($avatar);
    if ($avatar['error']!=UPLOAD_ERR_OK){
        $GLOBALS['message'] = '上传失败';
        return;
    }
    $source = $avatar['tmp_name'];
    $target = './images/' . $avatar['name'];
    $moved = move_uploaded_file($source,$target);
    if (!$moved){
        $GLOBALS['message'] = '上传失败';
        return;
    }
    $sno = $_SESSION['sno'];
    $sql = "update ruser set image='$target' where sno='$sno'";
    $result = $conn->query($sql);
    header("location:contact.php");
}else{
    echo "<script>alert('未上传头像');window.location.href='contact.php'</script>";
}

?>