<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Cache-Control" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title>找回密码</title>
    <link rel="shortcut icon" href="images/logo.ico">
    <link href="css/register.css" rel="stylesheet" type="text/css"/>
</head>

<body>
<div class="login_box">
    <div class="login_l_img"></div>
    <div class="register">
        <div class="login_logo"><a href="#"><img src="images/login_logo.png"/></a></div>
        <div class="login_name">
            <p>请填写相应信息</p>
        </div>
        <form  action="emailCodeAction.php" method="post">
            <table style="table-layout: fixed;word-break: break-all; word-wrap: break-word;">
                <tr>
                    <input name="sno" type="text" placeholder="学号"
                           onkeyup="if(!/^\d+$/.test(this.value)) {this.value=this.value.replace(/[^\d]+/g,'');}">
                </tr>
                <tr>
                    <input type="text" id="email" name="email" title="email"  placeholder="邮箱" title="请输入正确的邮箱格式" />
                </tr>
                <tr>
                    <input name="password" type="password" placeholder="密码"
                           onkeyup="value=value.replace(/[^\a-\z\A-\Z0-9]/g,'')">
                </tr>
            </table>
            <div>
                <div style="width: 60%;float: left">
                    <input name="code" type="text"  placeholder="验证码"
                                           onkeyup="if(!/^\d+$/.test(this.value)) {this.value=this.value.replace(/[^\d]+/g,'');}">
                </div>
                <div style="width: 25%;float: left;margin-left: 45px;margin-top: 5px">
                   <input type="button"  onclick="gain()" style="height: 30px;width: 50px;border:1px solid black;background-image: url('images/huoqu.jpg');z-index: 2">
                </div>
            </div>
            <div style="margin-top: 20px">
                <div style="float: left;width: 45%"><a href="index.html"><input value="返回" style="width:100%;" type="button"></a></div>
                <div style="float: right;width: 45%"><input name="retrieve" value="确定" style="width:100%;" type="submit"></div>
            </div>
        </form>
    </div>
    <div  class="copyright">APP创意俱乐部 版权所有©2019-2021</div>
</div>

<script type="text/javascript">
    function gain() {
        var email = document.getElementById("email").value;
        var xhr = new XMLHttpRequest();
        xhr.open('POST','emailAction.php');
        xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
        xhr.send(`email=${email}`);
        xhr.onreadystatechange = function () {
            if (this.readyState != 4) return;
            alert(this.responseText);
        }

    }
</script>
</body>
</html>