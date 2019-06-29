<?php
/**
 * Created by PhpStorm.
 * User: DCY
 * Date: 2019/6/26
 * Time: 16:17
 */

include "MySqlConnect.php";
$_POST['submit'];

$ac_id = $_POST["ac_id"];
$name = $_POST["name"];
$cap = $_POST["cap"];
$tel = $_POST["tel"];
$mem = $_POST["mem1"];

if (!empty($_POST) && !empty($_POST["ac_id"]) && !empty($_POST["name"]) && !empty($_POST["cap"]) && !empty($_POST["tel"])) {
    $sql = "select * from team where ac_id='$ac_id' and team_name='$name' and team_cap='$cap'";
    $result = $conn->query($sql);
    $nums = mysqli_num_rows($result);
    if (!empty($nums)) {
        echo "<script>alert('创建失败');location.href='icons.php';</script>";
    } else {
        $result = $conn->query("insert into team(ac_id,team_name,team_cap,team_tel,team_mem) values ('$ac_id','$name','$cap','$tel','$mem')");
        echo "<script >alert('创建成功');location.href='icons.php';</script>";
    }
} else {
    echo '<script>alert("输入的内容不能为空！")</script>';
    header("location:cteam.php?id=$ac_id");
}

mysqli_free_result($result);
?>