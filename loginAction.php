<?php
session_start();
include "MySqlConnect.php";
if (!empty($_POST)){
    $sno = $_POST["sno"];
    $psd = $_POST["password"];
    $sql="select * from ruser";
    $result=$conn->query($sql);

    while ($row=mysqli_fetch_array($result)){
        if (empty($row)){
            echo '<script>alert("用户名或密码不存在");window.location.href="login.html"</script>';
            return;
        }
        if ($row['sno'] == $sno && $row['password']== $psd){
            $_SESSION['username'] = $row['username'];
            $_SESSION['sno'] = $sno;
            echo '<script>alert("登陆成功，即将跳转！");window.location.href="index.html"</script>';
        }
    }
    mysqli_free_result($result);
}
?>