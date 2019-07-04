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
    <script src="js/laydate.js"></script>

</head>
<body>
<div class="panel admin-panel" style="margin-left: 10%;margin-right: 10%">
    <div class="panel-head"><strong><span class="icon-pencil-square-o"></span> 添加活动信息</strong></div>
    <div class="body-content">
        <form method="post" class="form-x" action="z_infoAction.php" enctype="multipart/form-data">
            <div class="form-group">
                <div class="label">
                    <label><h5><b>活动名称：</b></h5></label>
                </div>
                <div class="field">
                    <input type="text" class="input" name="stitle" value=""/>

                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label><h5><b>活动简介：</b></h5></label>
                </div>
                <div class="field">
                    <textarea class="input" name="skeywords" style="height:80px"></textarea>

                </div>
            </div>

            <div class="form-group">
                <div class="label">
                    <label><h5><b>负责人：</b></h5></label>
                </div>
                <div class="field">
                    <input type="text" class="input" name="s_name" value=""/>

                </div>
            </div>

            <div class="form-group">
                <div class="label">
                    <label><h5><b>参赛对象：</b></h5></label>
                </div>
                <div class="field">
                    <input type="text" class="input" name="s_tel" value=""/>

                </div>
            </div>


            <div class="form-group">
                <div class="label">
                    <label><h5><b>限制人数：</b></h5></label>
                </div>
                <div class="field">
                    <input type="text" class="input" name="s_qqu" value=""/>

                </div>
            </div>

            <div class="form-group">
                <div class="label">
                    <label><h5><b>赛事截止时间：</b></h5></label>
                </div>
                <div class="label" style="width: auto">
                    <!-- <input type="text" class="input" name="s_time" value="" />-->
                    <input name="s_time" placeholder="请输入日期" class="laydate-icon"
                           onClick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})">
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label><h5><b>奖项：</b></h5></label>
                </div>
                <div class="field">
                    <input type="text" class="input" name="s_address" value=""/>

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