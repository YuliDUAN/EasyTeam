<?php
session_start();
include "MySqlConnect.php";
$sno = $_SESSION['sno'];
$q_question=$_POST['question'];
$t=date('Y-m-d');

if($q_question==''){
    echo "<script>alert('问题反馈不能为空!');location.href='question.php';</script>";

}else{
    $sql="insert into question(sno,q_question,q_time) values ('$sno','$q_question','$t')";
    $result=$conn->query($sql);
    if($result==true){
        echo "<script >alert('提交成功');location.href='question.php';</script>";
    }else{

        echo "<script>alert('提交失败');location.href='question.php';</script>";
    }
}

?>
