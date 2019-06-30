<?php
include "z_mysql.php";
$stitle=$_POST["stitle"];
$slogo=$_POST["slogo"];
$skeywords=$_POST["skeywords"];
$s_name=$_POST["s_name"];
$s_tel=$_POST["s_tel"];
$s_qq=$_POST["s_qqu"];
$s_time=$_POST["s_time"];
$s_address=$_POST["s_address"];


$result=$conn->query("insert into activity(name,image,title,host,limi,number,time,prize) values ('$stitle','$slogo','$skeywords','$s_name','$s_tel','$s_qq','$s_time','$s_address')");
if($result==true){
    echo "<script >alert('添加成功');location.href='z_info.php';</script>";
     
}else{


    echo "<script>alert('添加失败')</script>";
}

mysqli_free_result($result);
?>

