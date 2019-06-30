<?php
include "z_mysql.php";
$id=$_GET["ac_id"];
$stitle=$_POST["stitle"];
$slogo=$_POST["slogo"];
$skeywords=$_POST["skeywords"];
$s_name=$_POST["s_name"];
$s_tel=$_POST["s_tel"];
$s_qq=$_POST["s_qqu"];
$s_time=$_POST["s_time"];
$s_address=$_POST["s_address"];

 if($stitle==''||$slogo==''||$skeywords==''||$s_name==''||$s_tel==''||$s_qq==''||$s_time==''||$s_address==''){
            echo "<script>alert('不能为空!');location.href='z_modify.php';</script>";
             
        }else{        
        $result=$conn->query("update activity set name='$stitle',image='$slogo',title='$skeywords',host='$s_name',limi='$s_tel',number='$s_qq',time='$s_time',prize='$s_address' where id='$id'");
        if($result==true){
            echo "<script >alert('修改成功');location.href='z_page.php';</script>";
        }else{
  
            echo "<script>alert('修改失败');location.href='z_page.php';</script>";
        }
        
        }
?>