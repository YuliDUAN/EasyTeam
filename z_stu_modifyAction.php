<?php
include "z_mysql.php";
$sno=$_GET["sno"];
$pass=$_POST["pass"];
$name=$_POST["name"];
$sex=$_POST["sex"];
$tel=$_POST["tel"];
$adpt=$_POST["adpt"];
$major=$_POST["major"];
$class=$_POST["class"];
$image=$_POST["image"];

 if($pass==''||$name==''||$sex==''||$tel==''||$adpt==''||$major==''||$class==''||$image==''){
            echo "<script>alert('不能为空!');location.href='z_stu_modify.php';</script>";
             
        }else{        
        $result=$conn->query("update ruser set password='$pass',username='$name',sex='$sex',phone='$tel',adpt='$adpt',major='$major',cls='$class',image='$image' where sno='$sno'");
        if($result==true){
            echo "<script >alert('修改成功');location.href='z_student.php';</script>";
        }else{
  
            echo "<script>alert('修改失败');location.href='z_student.php';</script>";
        }
        
        }
?>