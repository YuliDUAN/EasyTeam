<?php
include "z_mysql.php";
$stitle=$_POST["stitle"];
$skeywords=$_POST["skeywords"];
$s_name=$_POST["s_name"];
$s_tel=$_POST["s_tel"];
$s_qq=$_POST["s_qqu"];
$s_time=$_POST["s_time"];
$s_address=$_POST["s_address"];
$lmtime = date("Y-m-d H:i:s");
$sql="insert into activity(name,title,host,limi,number,time,prize,inputtime) values('$stitle','$skeywords','$s_name','$s_tel','$s_qq','$s_time','$s_address','$lmtime')";
    $result=$conn->query($sql);
    if($result==true){
        echo "<script >alert('添加成功');location.href='z_info.php';</script>";
    }else{
        echo "<script>alert('添加失败')</script>";
    }
    mysqli_free_result($result);

?>

