<?php
$id = $_GET["id"];
$number = $_GET["number"];
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
<div class="panel admin-panel" style="margin-left: 10%;margin-right: 10%">
    <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>替换内容</strong></div>
    <div class="body-content">
        <form method="post" class="form-x" action="z_novaAction.php" enctype="multipart/form-data">
            <div class="form-group">
                <div class="label">
                    <label><h5><b>姓名：</b></h5></label>
                </div>
                <div class="field">
                    <input type="text" class="input w50" value="" name="title" maxlength="50" placeholder="字数请不要超过5"
                           data-validate="required:请输入标题"/>
                    <input type="hidden" name="id" value="<?php echo $id ?>"/>
                    <input type="hidden" name="number" value="<?php echo $number ?>"/>
                    <div class="tips"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label><h5><b>图片：</b></h5></label>
                </div>
                <div class="field" style="align:center">
                    <input type="file" name="fileField" id="fileField" accept="image/*" data-validate="required:请添加图片"/>

                </div>
            </div>


            <div class="clear"></div>

            <div class="form-group">
                <div class="label">
                    <label><h5><b>所属部门：</b></h5></label>
                </div>
                <div class="field">
                    <input type="text" class="input w50" name="authour" value="" maxlength="30" placeholder="字数请不要超过30"
                           data-validate="required:请输入发布单位"/>
                    <div class="tips"></div>
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