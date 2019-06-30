<?php
$sno = $_GET["sno"];
include("z_mysql.php");
$result = $conn->query("select password,username,sex,phone,adpt,major,cls,image from ruser where sno='$sno'");
$row = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <link rel="shortcut icon" href="images/logo.ico">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta name="renderer" content="webkit">
    <title>修改学生信息</title>
    <link rel="stylesheet" href="css/pintuer.css">
    <link rel="stylesheet" href="css/admin.css">
    <script src="js/jquery.js"></script>
    <script src="js/pintuer.js"></script>
</head>
<body>
<div class="panel admin-panel">
    <div class="panel-head"><strong><span class="icon-pencil-square-o"></span> 修改学号为：<?php echo $sno ?>
            &nbsp;的信息</strong></div>
    <form method="post" class="form-x" action="z_stu_modifyAction.php?sno=<?php echo $sno ?>">
        <div class="body-content">
            <div class="form-group">
                <div class="label">
                    <label>密码：</label>
                </div>
                <div class="field">
                    <input type="text" class="input" name="pass" value="<?php echo $row[0] ?>"/>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>姓名：</label>
                </div>
                <div class="field">
                    <input type="text" id="url1" class="input tips" name="name" value="<?php echo $row[1] ?>"/>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>性别：</label>
                </div>
                <div class="field">
                    <input type="text" id="url1" class="input tips" name="sex" value="<?php echo $row[2] ?>"/>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>电话：</label>
                </div>
                <div class="field">
                    <input type="text" class="input" name="tel" value="<?php echo $row[3] ?>"/>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>学院：</label>
                </div>
                <div class="field">
                    <input type="text" class="input" name="adpt" value="<?php echo $row[4] ?>"/>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>专业：</label>
                </div>
                <div class="field">
                    <input type="text" class="input" name="major" value="<?php echo $row[5] ?>"/>

                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>班级：</label>
                </div>
                <div class="field">
                    <input type="text" class="input" name="class" value="<?php echo $row[6] ?>"/>

                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>图片：</label>
                </div>
                <div class="field">
                    <input type="text" class="input" name="image" value="<?php echo $row[7] ?>"/>

                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label></label>
                </div>
                <div class="field">
                    <button class="button bg-main icon-check-square-o" type="submit"> 修改</button>
                </div>
            </div>
        </div>
    </form>
</div>
</body>
</html>