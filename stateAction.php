<?php
session_start();
$sno = $_SESSION["sno"];
$zhuangtai=$_SESSION["zhuangtai"];
$sql1 = "select Astate from ruser where sno='$sno' ";
$result1 = $conn->query($sql1);
$nums = mysqli_fetch_array($result1);
if($nums[0]!=$zhuangtai) {
    //header("location:index.html");
    echo '<script>alert("账号在其它地方登陆！");window.location.href="index.html"</script>';
}
?>