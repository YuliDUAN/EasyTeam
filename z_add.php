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
    <script src="js/laydate.js"></script>
</head>
<body>
<div class="panel admin-panel" style="margin-left: 10%;margin-right: 10%">
    <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>增加内容</strong></div>
    <div class="body-content">
        <form method="post" class="form-x" action="z_addAction.php" enctype="multipart/form-data">
            <div class="form-group">
                <div class="label">
                    <label><h5><b>标题：</b></h5></label>
                </div>
                <div class="field">
                    <input type="text" class="input w50" value="" name="title" maxlength="50" placeholder="字数请不要超过50"
                           data-validate="required:请输入标题"/>
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
            <div class="form-group">
                <div class="label">
                    <label><h5><b>描述：</b></h5></label>

                </div>
                <div class="field">
                    <textarea class="input" name="note" style=" height:90px;" maxlength="50" placeholder="字数请不要超过50"
                              data-validate="required:请输入描述"></textarea>
                    <div class="tips"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label><h5><b>内容：</b></h5></label>
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
                    <label><h5><b>发布时间：</b></h5></label>
                </div>
                <div class="field">
                    <input name="datetime" placeholder="请输入日期" class="laydate-icon"
                           onClick="laydate({istime: true, format: 'YYYY-MM-DD'})">
                    <div class="tips"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label><h5><b>发布单位：</b></h5></label>
                </div>
                <div class="field">
                    <input type="text" class="input w50" name="authour" value="" maxlength="30" placeholder="字数请不要超过30"
                           data-validate="required:请输入发布单位"/>
                    <div class="tips"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label><h5><b>点击次数：</b></h5></label>
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
                <div class="field" align="center">
                    <button class="button bg-main icon-check-square-o" type="submit"> 提交</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">


    //日期范围限制
    var start = {
        elem: '#start',
        format: 'YYYY-MM-DD',
        min: laydate.now(), //设定最小日期为当前日期
        max: '2099-06-16', //最大日期
        istime: true,
        istoday: false,
        choose: function (datas) {
            end.min = datas; //开始日选好后，重置结束日的最小日期
            end.start = datas //将结束日的初始值设定为开始日
        }
    };

    var end = {
        elem: '#end',
        format: 'YYYY-MM-DD',
        min: laydate.now(),
        max: '2099-06-16',
        istime: true,
        istoday: false,
        choose: function (datas) {
            start.max = datas; //结束日选好后，充值开始日的最大日期
        }
    };
    laydate(start);
    laydate(end);

    //自定义日期格式
    laydate({
        elem: '#test1',
        format: 'YYYY年MM月DD日',
        festival: true, //显示节日
        choose: function (datas) { //选择日期完毕的回调
            alert('得到：' + datas);
        }
    });

    //日期范围限定在昨天到明天
    laydate({
        elem: '#hello3',
        min: laydate.now(-1), //-1代表昨天，-2代表前天，以此类推
        max: laydate.now(+1) //+1代表明天，+2代表后天，以此类推
    });
</script>
</body>
</html>