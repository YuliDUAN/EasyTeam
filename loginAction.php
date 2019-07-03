<?php
session_start();
include "MySqlConnect.php";
$sno = $_POST["sno"];
$psd = $_POST["password"];

//对密码进行加密处理
function createPassword($password){
    if(!$password){
        return false;
    }
    return md5(md5($password).'eTeam');
}
$psd=createPassword($psd);

if (!empty($_POST)&&!empty($sno) && !empty($psd)) {
    $sql = "select * from ruser where sno='$sno' and password='$psd'";
    $result = $conn->query($sql);
    $row = mysqli_fetch_array($result);
    if (empty($row)) {
        echo '<script>alert("账号或密码不正确！");window.location.href="index.html"</script>';
    } else {
        if ($row['sno'] == $sno && $row['password'] == $psd) {
            $_SESSION['username'] = $row['username'];
            $_SESSION['sno'] = $sno;
            //产生一个六位随机数
            $randStr=str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890');
            $rand=substr($randStr,0,6);
            //将六位随机数存储到数据库
            $sql2 = "update ruser set Astate='$rand' where sno='$sno' ";
            $result2 = $conn->query($sql2);
            $_SESSION['zhuangtai'] = $rand;
            //登陆成功跳转页面到首页
//            header("location:homepage.php?zhuangtai=$rand");
            header("location:homepage.php");
        }
    }
} else {
    echo '<script>alert("用户名或密码不能为空");window.location.href="index.html"</script>';
}
mysqli_free_result($result);
?>