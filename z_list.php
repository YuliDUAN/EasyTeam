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
<form method="post" action="" id="listform">
    <div class="panel admin-panel">
        <div class="panel-head"><strong class="icon-reorder"> 内容列表</strong> <a href=""
                                                                               style="float:right; display:none;">添加字段</a>
        </div>
        <div class="padding border-bottom">
            <ul class="search" style="padding-left:10px;">
                <li><a class="button border-main icon-plus-square-o" href="z_add.php"> 添加内容</a></li>
                <!--                <li>搜索：</li>-->
                <!---->
                <!--                <li>-->
                <!--                    <input type="text" placeholder="请输入比赛关键字" name="keywords" class="input" style="width:250px; line-height:17px;display:inline-block" />-->
                <!--                    <a href="javascript:void(0)" class="button border-main icon-search" onclick="changesearch()" > 搜索</a>-->
                <!--                </li>-->
            </ul>
        </div>
        <table class="table table-hover text-center">
            <tr>
                <th width="100" style="text-align:left; padding-left:20px;">序号</th>
                <th>图片</th>
                <th>名称</th>
                <th>发布单位</th>
                <th width="10%">发布日期</th>
                <th width="280">操作</th>
            </tr>
            <volist name="list" id="vo">
                <?php
                include("z_mysql.php");
                $i = 0;
                $result = $conn->query("SELECT * FROM article order by ar_time desc");
                while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                        <td style="text-align:left; padding-left:20px;"><?php echo ++$i ?></td>
                        <td width="10%"><img src="<?php echo $row[2] ?>" alt="" width="70" height="50"/></td>
                        <td><?php echo $row[1] ?></td>
                        <td><font color="#00CC99"><?php echo $row[6] ?></font></td>
                        <td><?php echo $row[5] ?></td>
                        <td>
                            <div class="button-group"><a class="button border-main"
                                                         href='z_article_modify.php?ar_id=<?php echo $row[0] ?>'><span
                                            class="icon-edit"></span> 修改</a>
                                <a class="button border-red"
                                   href='z_articleDeleteAction.php?ar_id=<?php echo $row[0] ?>'><span
                                            class="icon-trash-o"></span> 删除</a></div>
                        </td>
                        <!--                    <a class="button border-red" onclick="del();" ><span class="icon-trash-o"></span> 删除</a> </div></td>-->
                    </tr>
                <?php } ?>
                <!--                <tr>-->
                <!--                    <td colspan="8"><div class="pagelist"> <a href="z_list.php">上一页</a> <span class="current">1</span><a href="z_list.php">2</a><a href="z_list.php">3</a><a href="z_list.php">下一页</a><a href="z_list.php">尾页</a> </div></td>-->
                <!--                </tr>-->
            </volist>
        </table>
    </div>
</form>
<script type="text/javascript">

    //搜索
    function changesearch() {

    }

    //单个删除
    function del() {
        if (confirm("您确定要删除吗?")) {
        }
    }

    //全选
    $("#checkall").click(function () {
        $("input[name='id[]']").each(function () {
            if (this.checked) {
                this.checked = false;
            } else {
                this.checked = true;
            }
        });
    })

    //批量删除
    function DelSelect() {
        var Checkbox = false;
        $("input[name='id[]']").each(function () {
            if (this.checked == true) {
                Checkbox = true;
            }
        });
        if (Checkbox) {
            var t = confirm("您确认要删除选中的内容吗？");
            if (t == false) return false;
            $("#listform").submit();
        } else {
            alert("请选择您要删除的内容!");
            return false;
        }
    }

    //批量排序
    function sorts() {
        var Checkbox = false;
        $("input[name='id[]']").each(function () {
            if (this.checked == true) {
                Checkbox = true;
            }
        });
        if (Checkbox) {

            $("#listform").submit();
        } else {
            alert("请选择要操作的内容!");
            return false;
        }
    }


    //批量首页显示
    function changeishome(o) {
        var Checkbox = false;
        $("input[name='id[]']").each(function () {
            if (this.checked == true) {
                Checkbox = true;
            }
        });
        if (Checkbox) {

            $("#listform").submit();
        } else {
            alert("请选择要操作的内容!");

            return false;
        }
    }

    //批量推荐
    function changeisvouch(o) {
        var Checkbox = false;
        $("input[name='id[]']").each(function () {
            if (this.checked == true) {
                Checkbox = true;
            }
        });
        if (Checkbox) {


            $("#listform").submit();
        } else {
            alert("请选择要操作的内容!");

            return false;
        }
    }

    //批量置顶
    function changeistop(o) {
        var Checkbox = false;
        $("input[name='id[]']").each(function () {
            if (this.checked == true) {
                Checkbox = true;
            }
        });
        if (Checkbox) {

            $("#listform").submit();
        } else {
            alert("请选择要操作的内容!");

            return false;
        }
    }


    //批量移动
    function changecate(o) {
        var Checkbox = false;
        $("input[name='id[]']").each(function () {
            if (this.checked == true) {
                Checkbox = true;
            }
        });
        if (Checkbox) {

            $("#listform").submit();
        } else {
            alert("请选择要操作的内容!");

            return false;
        }
    }

    //批量复制
    function changecopy(o) {
        var Checkbox = false;
        $("input[name='id[]']").each(function () {
            if (this.checked == true) {
                Checkbox = true;
            }
        });
        if (Checkbox) {
            var i = 0;
            $("input[name='id[]']").each(function () {
                if (this.checked == true) {
                    i++;
                }
            });
            if (i > 1) {
                alert("只能选择一条信息!");
                $(o).find("option:first").prop("selected", "selected");
            } else {

                $("#listform").submit();
            }
        } else {
            alert("请选择要复制的内容!");
            $(o).find("option:first").prop("selected", "selected");
            return false;
        }
    }

</script>
</body>
</html>