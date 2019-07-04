<?php
$name = $_GET["name"];
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <link rel="shortcut icon" href="images/logo.ico">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta name="renderer" content="webkit">
    <title></title>
    <link rel="stylesheet" href="css/pintuer.css">
    <link rel="stylesheet" href="css/admin.css">
    <script src="js/jquery.js"></script>
    <script src="js/pintuer.js"></script>
</head>
<body>
<?php include "z_mysql.php";

?>
<div class="panel admin-panel" style="margin-left: 10%;margin-right: 10%">
    <div class="panel-head"><strong><span class="icon-key"></span> 修改管理员密码</strong></div>
    <div class="body-content">
        <form method="post" class="form-x" action="z_passAction.php?name=<?php echo $name ?>">
            <div class="form-group">
                <div class="label">
                    <label for="sitename"><h5><b>管理员帐号：</b></h5></label>
                </div>
                <div class="field">
                    <label style="line-height:33px;">
                        <?php echo $name ?>
                    </label>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label for="sitename"><h5><b>原始密码：</b></h5></label>
                </div>
                <div class="field">
                    <input type="password" class="input w50" id="mpass" name="mpass" size="50" placeholder="请输入原始密码"
                           data-validate="required:请输入原始密码"/>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label for="sitename"><h5><b>新密码：</b></h5></label>
                </div>
                <div class="field">
                    <input type="password" class="input w50" name="newpass" size="50" placeholder="请输入新密码"
                           data-validate="required:请输入新密码,length#>=5:新密码不能小于5位"/>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label for="sitename"><h5><b>确认新密码：</b></h5></label>
                </div>
                <div class="field">
                    <input type="password" class="input w50" name="renewpass" size="50" placeholder="请再次输入新密码"
                           data-validate="required:请再次输入新密码,repeat#newpass:两次输入的密码不一致"/>
                </div>
            </div>

            <div class="form-group">
                <div class="label">
                    <label></label>
                </div>
                <div class="field" align="center">
                    <button class="button bg-main icon-check-square-o" type="submit"> 提交</button>
                </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>