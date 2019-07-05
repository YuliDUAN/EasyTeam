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
<div class="panel admin-panel" style="margin-left: 10%;margin-right: 10%">
    <div class="panel-head"><strong><span class="icon-pencil-square-o"></span> 修改学号为：<?php echo $sno ?>
            &nbsp;的信息</strong></div>
    <form method="post" class="form-x" action="z_stu_modifyAction.php?sno=<?php echo $sno ?>">
        <div class="body-content">
            <div class="form-group">
                <div class="label">
                    <label><h5><b>姓名：</b></h5></label>
                </div>
                <div class="field">
                    <input type="text" id="url1" class="input tips" name="name" value="<?php echo $row[1] ?>"/>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label><h5><b>性别：</b></h5></label>
                </div>
                <div class="field">
                    <input type="text" id="url1" class="input tips" name="sex" value="<?php echo $row[2] ?>"/>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label><h5><b>电话：</b></h5></label>
                </div>
                <div class="field">
                    <input type="text" class="input" name="tel" value="<?php echo $row[3] ?>"/>
                </div>
            </div>
<!--            <div class="form-group">-->
<!--                <div class="label">-->
<!--                    <label><h5><b>学院：</b></h5></label>-->
<!--                </div>-->
<!--                <div class="field">-->
<!--                    <input type="text" class="input" name="adpt" value="--><?php //echo $row[4] ?><!--"/>-->
<!--                </div>-->
<!--            </div>-->
            <div class="form-group">
                <div class="label">
                    <label><h5><b>专业：</b></h5></label>
                </div>
                <div class="field">
                    <input type="text" class="input" name="major" value="<?php echo $row[5] ?>"/>

                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label><h5><b>班级：</b></h5></label>
                </div>
                <div class="field">
                    <input type="text" class="input" name="class" value="<?php echo $row[6] ?>"/>

                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label><h5><b>图片：</b></h5></label>
                </div>
                <div class="field">
                    <input type="text" class="input" name="image" value="<?php echo $row[7] ?>"/>

                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label></label>
                </div>
                <div class="field" align="center">
                    <button class="button bg-main icon-check-square-o" type="submit"> 修改</button>
                </div>
            </div>
        </div>
    </form>
</div>
</body>
</html>