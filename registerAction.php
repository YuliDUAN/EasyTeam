<?php
include 'MySqlConnect.php';
$_POST['register'];

//第一步获取输入框里的内容
$sno = $_POST['sno'];
$password = $_POST['password'];
$username = $_POST['username'];
$phone = $_POST['phone'];
$sex = $_POST['sex'];
$major = $_POST['major'];
$cls = $_POST['cls'];

$newEmp = array("sno" => $sno, "password" => $password, "username" => $username, "phone" => $phone,
    "sex" => $sex, "major" => $major, "cls" => $cls);
if ($sno != null && $password != null && $username != null && $phone != null && $sex != null && $major != null && $cls != null) {
    //第二步：获取内存段中的数组，将数据添加到数据库
    $sql = "insert into ruser (sno,password,username,phone,sex,major,cls) values 
                            ('$sno','$password','$username','$phone','$sex','$major','$cls')";

    mysqli_query($conn, $sql);
    //第四步：跳转到登陆页面
    echo '<script>alert("注册成功，返回登陆界面！");window.location.href="index.html"</script>';
} else {
    echo '<script>alert("注册错误，请按要求输入！");window.location.href="register.html"</script>';
}
?>