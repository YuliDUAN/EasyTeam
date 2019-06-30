<?php
    session_start();
    include "z_mysql.php";
    $ar_id=$_GET["ar_id"];
    $title=$_POST["title"];
    $note=$_POST["note"];
    $content=$_POST["content"];
    $datetime=$_POST["datetime"];
    $authour=$_POST["authour"];
    $views=$_POST["views"];
    $result=$conn->query("update article set ar_title='$title',ar_description='$note',ar_content='$content',ar_time='$datetime',ar_repoter='$authour',ar_clicknum='$views' where ar_id='$ar_id'");
    if($result==true){
        echo "<script >alert('修改成功');location.href='z_list.php';</script>";
    }else{

        echo "<script>alert('修改失败');location.href='z_list.php';</script>";
    }

?>