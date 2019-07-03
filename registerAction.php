<?php
include 'MySqlConnect.php';
$_POST['register'];

//第一步获取输入框里的内容
$sno = $_POST['sno'];
$password = $_POST['password'];
$username = $_POST['username'];
$phone = $_POST['phone'];
$email=$_POST['email'];
$sex = $_POST['sex'];
$major = $_POST['major'];
$cls = $_POST['cls'];
$image="./images/t21.jpg";
$newEmp = array("sno" => $sno, "password" => $password, "username" => $username, "phone" => $phone,
    "sex" => $sex, "major" => $major, "cls" => $cls,"image"=>$image);

if (strlen($sno) != 12) {
    echo '<script>alert("输入学号的格式有误！");window.location.href="register.html"</script>';
} elseif (strlen($password) < 6 || strlen($password) > 16) {
    echo '<script>alert("请输入6~16位密码！");window.location.href="register.html"</script>';
} elseif (strlen($username) < 6 || strlen($username) > 12) {
    echo '<script>alert("输入姓名的格式有误！");window.location.href="register.html"</script>';
}elseif (!empty($_POST)&&!empty($email)) {
    echo '<script>alert("邮箱输入错误！");window.location.href="register.html"</script>';
} elseif (strlen($phone) != 11) {
    echo '<script>alert("输入手机号的格式有误！");window.location.href="register.html"</script>';
} elseif ($sno != null && $password != null && $username != null && $phone != null && $sex != null &&$email!=null && $major != null && $cls != null) {
    $sql = "select * from ruser where sno='$sno'";
    $result = $conn->query($sql);
    $nums = mysqli_num_rows($result);
    if (!empty($nums)) {
        echo '<script>alert("注册失败，已有该用户！");window.location.href="register.html"</script>';
    } else {
        //对密码进行加密处理
        function createPassword($password){
            if(!$password){
                return false;
            }
            return md5(md5($password).'eTeam');
        }
        $password=createPassword($password);
        //第二步：获取内存段中的数组，将数据添加到数据库
        $sql = "insert into ruser (sno,password,username,email,phone,sex,major,cls,image) values 
                            ('$sno','$password','$username','$email','$phone','$sex','$major','$cls','$image')";
        mysqli_query($conn, $sql);
        //第四步：跳转到登陆页面
        echo '<script>alert("注册成功，返回登陆界面！");window.location.href="index.html"</script>';
    }
} else {
    echo '<script>alert("注册错误，请按要求输入！");window.location.href="register.html"</script>';
}
mysqli_free_result($result);
?>