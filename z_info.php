<?php
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
<div align="center">
    <div class="panel admin-panel" style="width: 45%" align="left">
        <div style="width: 100%;padding: 5px">
            <div class="panel-head"><strong><span class="icon-pencil-square-o"></span> 添加活动信息</strong></div>
            <div class="body-content">
                <form method="post" class="form-x" action="z_infoAction.php">
                    <div class="form-group">
                        <div class="label">
                            <label>活动名称：</label>
                        </div>
                        <div class="field">
                            <input type="text" class="input" name="stitle" value="" style="width: 45%"/>

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="label">
                            <label>活动图片：</label>
                        </div>
                        <div class="field">
                            <input type="text" id="url1" name="slogo" class="input tips" style="width:25%; float:left;"
                                   value=""
                                   data-toggle="hover" data-place="right" data-image=""/>
                            <input type="button" class="button bg-blue margin-left" id="image1" value="+ 浏览上传">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="label">
                            <label>活动简介：</label>
                        </div>
                        <div class="field">
                            <textarea class="input" name="skeywords" style="height:100px"></textarea>

                        </div>
                    </div>

                    <div class="form-group">
                        <div class="label">
                            <label>负责人：</label>
                        </div>
                        <div class="field">
                            <input type="text" class="input" name="s_name" value="" style="width: 20%"/>

                        </div>
                    </div>

                    <div class="form-group">
                        <div class="label">
                            <label>参赛对象：</label>
                        </div>
                        <div class="field">
                            <input type="text" class="input" name="s_tel" value="" style="width: 35%"/>

                        </div>
                    </div>


                    <div class="form-group">
                        <div class="label">
                            <label>限制人数：</label>
                        </div>
                        <div class="field">
                            <input type="text" class="input" name="s_qqu" value="" style="width: 10%"/>

                        </div>
                    </div>

                    <div class="form-group">
                        <div class="label">
                            <label>发布时间：</label>
                        </div>
                        <div class="field">
                            <input type="text" class="input" name="s_time" value="" style="width: 35%"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="label">
                            <label>奖项：</label>
                        </div>
                        <div class="field">
                            <input type="text" class="input" name="s_address" value="" style="width: 70%"/>

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
    </div>
</div>
</body>
</html>