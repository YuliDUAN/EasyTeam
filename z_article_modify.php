<?php
$ar_id = $_GET["ar_id"];
include("z_mysql.php");
$result = $conn->query("select * from article where ar_id='$ar_id'");
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
    <title></title>
    <link rel="stylesheet" href="css/pintuer.css">
    <link rel="stylesheet" href="css/admin.css">
    <script src="js/jquery.js"></script>
    <script src="js/pintuer.js"></script>
</head>
<body>
<div class="panel admin-panel">
    <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>修改文章ID为：<?php echo $ar_id ?>
            &nbsp;的信息</strong></div>
    <div class="body-content">
        <form method="post" class="form-x" action="z_article_modifyAction.php?ar_id=<?php echo $ar_id ?>">
            <div class="form-group">
                <div class="label">
                    <label>标题：</label>
                </div>
                <div class="field">
                    <input type="text" class="input w50" value="<?php echo $row[1] ?>" name="title" maxlength="50"
                           placeholder="字数请不要超过50" data-validate="required:请输入标题"/>
                    <div class="tips"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>描述：</label>

                </div>
                <div class="field">
                    <textarea class="input" name="note" style=" height:90px;" maxlength="50" placeholder="字数请不要超过50"
                              data-validate="required:请输入描述"><?php echo $row[3] ?>
                    </textarea>
                    <div class="tips"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>内容：</label>
                </div>
                <div class="field">
                    <textarea class="input" name="content" style=" height:450px;"
                              data-validate="required:请输入内容"><?php echo $row[4] ?></textarea>
                    <div class="tips"></div>
                </div>
            </div>
            <div class="clear"></div>
            <div class="form-group">
                <div class="label">
                    <label>发布时间：</label>
                </div>
                <div class="field">
                    <input type="text" class="laydate-icon input w50" value="<?php echo $row[5] ?>" name="datetime"
                           maxlength="50" onclick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})"
                           placeholder="请输入日期，例如：2019-01-01" data-validate="required:请按照格式输入有效日期"/>
                    <div class="tips"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>发布单位：</label>
                </div>
                <div class="field">
                    <input type="text" class="input w50" name="authour" value="<?php echo $row[6] ?>" maxlength="30"
                           placeholder="字数请不要超过30" data-validate="required:请输入发布单位"/>
                    <div class="tips"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>点击次数：</label>
                </div>
                <div class="field">
                    <input type="text" class="input w50" name="views" value="<?php echo $row[7] ?>"
                           data-validate="required:请输入浏览次数" placeholder="请输入数字"/>
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