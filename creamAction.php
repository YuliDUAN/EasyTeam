<?php
/**
 * Created by PhpStorm.
 * User: DCY
 * Date: 2019/6/26
 * Time: 16:17
 */
include"MySqlConnect.php";
$ac_id=$_POST["ac_id"];
$name=$_POST["name"];
$cap=$_POST["cap"];
$tel=$_POST["tel"];
$mem=$_POST["mem1"];

if($name==""||$cap==""||$tel==""){
    echo "<script >alert('不能为空！');</script>";
    header("location:cteam.php?id=$ac_id");

}else{

    $result=$conn->query("insert into team(ac_id,team_name,team_cap,team_tel,team_mem) values ('$ac_id','$name','$cap','$tel','$mem')");
    if($result==true){
        echo "<script >alert('创建成功');location.href='icons.php';</script>";

    }else{
        echo "<script>alert('创建失败');location.href='icons.php';</script>";
    }
}



?>