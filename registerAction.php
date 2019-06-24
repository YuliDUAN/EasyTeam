<?php
include 'MySqlConnect.php';

if(!empty($_POST)){
    //第一步获取输入框里的内容
    $sno=$_POST['sno'];
    $password=$_POST['password'];
    $username=$_POST['username'];
    $phone=$_POST['phone'];
    $sex=$_POST['sex'];
    $major=$_POST['major'];
    $cls=$_POST['cls'];

    $newEmp=array("sno"=>$sno,"password"=>$password,"username"=>$username,"phone"=>$phone,
                    "sex"=>$sex,"major"=>$major,"cls"=>$cls);
    //第二步：获取内存段中的数组，将数据添加到数据库
    $sql="insert into ruser (sno,password,username,phone,sex,major,cls) values 
                            ('$sno','$password','$username','$phone','$sex','$major','$cls')";

    mysqli_query($conn,$sql);
    //第四步：跳转到登陆页面
    echo '<script>alert("注册成功，返回登陆界面！");window.location.href="index.html"</script>';

    /*    while ($row=mysqli_fetch_array($result)){
        if (empty($row)){
            echo '<script>alert("用户名或密码不存在");window.location.href="index.html"</script>';
            return;
        }
        if ($row['sno'] == $sno && $row['password']== $psd){
            $_SESSION['username'] = $row['username'];
            $_SESSION['sno'] = $sno;
            echo '<script>alert("登陆成功，即将跳转！");window.location.href="homepage.html"</script>';
        }
    }
    mysqli_free_result($result);*/
}
?>