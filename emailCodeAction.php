<?php
session_start();
include "MySqlConnect.php";
if (!empty($_POST)){
    $sno = $_POST['sno'];
    if (empty($sno)){
        echo '<script>alert("学号不能为空！");window.location.href="retrieve.php"</script>';
    }
    $email = $_POST['email'];
    $num = $_POST['code'];
    echo $num;
    $code = $_SESSION['code'];
    unset($_SESSION['code']);
    echo $code;
    $password = $_POST['password'];
    $sql = "select email from ruser where sno = $sno";
    $res = $conn->query($sql);
    $row = mysqli_fetch_array($res);
    if ($row['email'] == $email){
        if ($num == $code){
            //对密码进行加密处理
            function createPassword($password){
                if(!$password){
                    return false;
                }
                return md5(md5($password).'eTeam');
            }
            $password=createPassword($password);

            $sql = "update ruser set password = '$password' where sno = '$sno' and email='$email'";
            $conn->query($sql);
            mysqli_close($conn);
            echo '<script>alert("修改成功，可登陆！");window.location.href="index.html"</script>';
        }else{
            echo '<script>alert("验证码错误，请重新输入！");window.location.href="retrieve.php"</script>';
        }
    }else{
        echo '<script>alert("绑定邮箱错误，请重新输入！");window.location.href="retrieve.php"</script>';
    }
}
?>


