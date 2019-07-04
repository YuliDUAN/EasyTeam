<?php

$id = $_GET["id"];
include("z_mysql.php");
$result = $conn->query("select name,title,host,limi,number,time,prize,state from activity where id='$id'");
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
    <title>添加活动信息</title>
    <link rel="stylesheet" href="css/pintuer.css">
    <link rel="stylesheet" href="css/admin.css">
    <script src="js/jquery.js"></script>
    <script src="js/pintuer.js"></script>
</head>
<body>
<div class="panel admin-panel">
    <div class="panel-head"><strong><span class="icon-pencil-square-o"></span> 修改活动信息</strong></div>
    <div class="body-content">
        <form method="post" class="form-x" action="z_modifyAction.php?ac_id=<?php echo $id ?>">
            <div class="form-group">
                <div class="label">
                    <label>活动名称：</label>
                </div>
                <div class="field">
                    <input type="text" class="input" name="stitle" value="<?php echo $row[0] ?>"/>
                    <div class="tips"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>活动简介：</label>
                </div>
                <div class="field">
                    <textarea class="input" name="skeywords" style="height:80px""><?php echo $row[1] ?></textarea>
                    <div class="tips"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>负责人：</label>
                </div>
                <div class="field">
                    <input type="text" class="input" name="s_name" value="<?php echo $row[2] ?>"/>
                    <div class="tips"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>参赛对象：</label>
                </div>
                <div class="field">
                    <input type="text" class="input" name="s_tel" value="<?php echo $row[3] ?>"/>
                    <div class="tips"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>限制人数：</label>
                </div>
                <div class="field">
                    <input type="text" class="input" name="s_qqu" value="<?php echo $row[4] ?>"/>
                    <div class="tips"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>赛事截止时间：</label>
                </div>
                <div class="field">
                    <input type="text" class="input" name="s_time" value="<?php echo $row[5] ?>"/>
                    <div class="tips"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>奖项：</label>
                </div>
                <div class="field">
                    <input type="text" class="input" name="s_address" value="<?php echo $row[6] ?>"/>
                    <div class="tips"></div>
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
        </form>
    </div>
</div>
</body>
</html>