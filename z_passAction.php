<?php
include "z_mysql.php";
$username=$_GET["name"];
$mpass=$_POST["mpass"];
$newpass=$_POST["newpass"];
$renewpass=$_POST["renewpass"];

if($mpass==""||$newpass==""||$renewpass==""){
    echo "<script>alert('密码不允许为空！');</script>";  
}else if($newpass==$renewpass){
    $result=$conn->query("select pass from admin where name='$username'");
    if($result==true){
        $row = mysqli_fetch_array($result);
        if($row[0]==$mpass){
            $conn->query("update admin set pass='$newpass' where name='$username'");
            echo "<script>alert('修改成功！');location.href='z_pass.php?name=$username';</script>";
            //echo "<script type='text/javascript'>document.onload = window.close();</script>";
    
        }else{
            echo "<script>alert('密码错误！重新输入！');location.href='z_pass.php?name=$username';</script>";
    
        } 
    }
}else{
    echo "<script>alert('两次密码不一致！');location.href='z_pass.php?name=$username';</script>";
    
}
  ?>
