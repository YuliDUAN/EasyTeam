<?php
session_start();
include "MySqlConnect.php";
$sno = $_POST["sno"];
$psd = $_POST["password"];
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
            echo '<script>window.location.href=homepage.php/script>';
        }
    }
} else {
    echo '<script>alert("用户名或密码不能为空");window.location.href="index.html"</script>';
}
mysqli_free_result($result);
?>