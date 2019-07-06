<?php
$name = $_GET["name"];
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <link rel="shortcut icon" href="images/logo.ico">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta name="renderer" content="webkit">
    <title>后台管理中心</title>
    <link rel="stylesheet" href="css/pintuer.css">
    <link rel="stylesheet" href="css/admin.css">
    <script src="js/jquery.js"></script>
</head>
<body style="background-color:#f2f9fd;">
<div class="header bg-main">
    <div class="logo margin-big-left fadein-top">
        <h1><img src="images/y.jpg" class="radius-circle rotate-hover" height="50" alt=""/>易组队后台管理</h1>
    </div>
    <div class="head-l">&nbsp;&nbsp;
        <label class="button button-little bg-green"><span class="icon-home"></span> 你好！管理员<?php echo $name ?></label>
        <a class="button button-little bg-red" href="z_login.php"><span class="icon-power-off"></span> 退出登录</a></div>
</div>
<div class="leftnav">
    <div class="leftnav-title"><strong><span class="icon-list"></span>菜单列表</strong></div>
    <h2><span class="icon-user"></span>活动管理</h2>
    <ul style="display:block">

        <!--<li><a href="z_frist.php" target="right"><span class="icon-caret-right"></span>首页</a></li>-->
        <li><a href="z_page.php" target="right"><span class="icon-caret-right"></span>活动信息</a></li>
        <li><a href="z_info.php" target="right"><span class="icon-caret-right"></span>活动添加</a></li>


    </ul>
    <h2><span class="icon-pencil-square-o"></span>人员管理</h2>
    <ul>
        <li><a href="z_pass.php?name=<?php echo $name ?>" target="right"><span class="icon-caret-right"></span>修改密码</a>
        </li>
        <li><a href="z_student.php" target="right"><span class="icon-caret-right"></span>学生信息</a></li>

    </ul>
    <h2><span class="icon-pencil-square-o"></span>栏目管理</h2>
    <ul>
        <li><a href="z_list.php" target="right"><span class="icon-caret-right"></span>新闻管理</a></li>
        <li><a href="z_lecture.php" target="right"><span class="icon-caret-right"></span>宣讲会管理</a></li>
        <li><a href="z_nova.php" target="right"><span class="icon-caret-right"></span>赛事新星管理</a></li>
        <li><a href="z_message.php" target="right"><span class="icon-caret-right"></span>问题反馈</a></li>
    </ul>
</div>
<script type="text/javascript">
    $(function () {
        $(".leftnav h2").click(function () {
            $(this).next().slideToggle(200);
            $(this).toggleClass("on");
        })
        $(".leftnav ul li a").click(function () {
            $("#a_leader_txt").text($(this).text());
            $(".leftnav ul li a").removeClass("on");
            $(this).addClass("on");
        })
    });
</script>
<div class="admin">
    <iframe scrolling="auto" rameborder="0" src="z_page.php" name="right" width="100%" height="100%"></iframe>
</div>
</body>
</html>