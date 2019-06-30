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
    <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>增加内容</strong></div>
    <div class="body-content">
        <form method="post" class="form-x" action="z_addAction.php" enctype="multipart/form-data">
            <div class="form-group">
                <div class="label">
                    <label>标题：</label>
                </div>
                <div class="field">
                    <input type="text" class="input w50" value="" name="title" maxlength="50" placeholder="字数请不要超过50"
                           data-validate="required:请输入标题"/>
                    <div class="tips"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>图片：</label>
                </div>
                <div class="field" style="align:center">
                    <input type="file" name="fileField" id="fileField" accept="image/*" data-validate="required:请添加图片"/>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>描述：</label>

                </div>
                <div class="field">
                    <textarea class="input" name="note" style=" height:90px;" maxlength="50" placeholder="字数请不要超过50"
                              data-validate="required:请输入描述"></textarea>
                    <div class="tips"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>内容：</label>
                </div>
                <div class="field">
                    <textarea class="input" name="content" style=" height:450px;"
                              data-validate="required:请输入内容"></textarea>
                    <div class="tips"></div>
                </div>
            </div>
            <div class="clear"></div>
            <div class="form-group">
                <div class="label">
                    <label>发布时间：</label>
                </div>
                <div class="field">

                    <input type="text" class="laydate-icon input w50" value="" name="datetime" maxlength="50"
                           onclick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})"
                           placeholder="请输入日期，例如：2019-01-01" data-validate="required:请按照格式输入有效日期"/>
                    <!--<input type="text" class="laydate-icon input w50" name="datetime" onclick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})" value=""  data-validate="required:请按照格式输入有效日期" style="padding:10px!important; height:auto!important;border:1px solid #ddd!important;" placeholder="" />-->
                    <div class="tips"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>发布单位：</label>
                </div>
                <div class="field">
                    <input type="text" class="input w50" name="authour" value="" maxlength="30" placeholder="字数请不要超过30"
                           data-validate="required:请输入发布单位"/>
                    <div class="tips"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>点击次数：</label>
                </div>
                <div class="field">
                    <input type="text" class="input w50" name="views" value="" placeholder="请输入数字"
                           data-validate="required:请输入浏览次数"/>
                    <div class="tips"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label></label>
                </div>
                <div class="field">
                    <button class="button bg-main icon-check-square-o" type="submit"> 提交</button>
                </div>
            </div>
        </form>
    </div>
</div>

</body>
</html>