<?php
$ac_id = $_GET["id"];
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
    <div class="panel-head"><strong class="icon-reorder"> 队伍管理</strong></div>
    <div class="padding border-bottom">
        <ul class="search" style="padding-left:10px;">
            <li><a class="button border-main icon-plus-square-o" href="z_addprizes.php?id=<?php echo $ac_id ?>">
                    获奖信息管理</a></li>
            <li>搜索：</li>

            <li>
                <input type="text" placeholder="请输入比赛关键字" name="keywords" class="input"
                       style="width:250px; line-height:17px;display:inline-block"/>
                <a href="javascript:void(0)" class="button border-main icon-search" onclick="changesearch()"> 搜索</a>
            </li>
        </ul>
    </div>

    <table class="table table-hover text-center">
        <tr>
            <th width="120">队伍ID</th>
            <th>参加活动</th>
            <th>队名</th>
            <th>队长</th>
            <!--            <th>成员</th>-->

            <th colspan="2">操作</th>
        </tr>
        <?php
        include "z_mysql.php";
        $sql = "SELECT team_id,activity.name,team_name,team_cap FROM team,activity where team.ac_id=activity.id and activity.id='$ac_id'";
        $result = $conn->query($sql);
        while ($row = mysqli_fetch_array($result)) { ?>
            <tr>
                <td> <?php echo $row[0] ?></td>
                <td> <?php echo $row[1] ?></td>
                <td> <?php echo $row[2] ?></td>
                <td> <?php echo $row[3] ?></td>
                <!--                <td> --><?php //echo $row[4]?><!--</td>-->

                <!--                <td><div class="button-group"> <a class="button border-red" href='#?id=-->
                <?php // echo $row[0] ?><!--'><span class="icon-edit"></span> 获奖记录</a> </div></td>-->
                <td>
                    <div class="button-group"><a class="button border-red"
                                                 href='z_teamDelete.php?id=<?php echo $row[0] ?>'><span
                                    class="icon-trash-o"></span> 删除</a></div>
                </td>
            </tr>
        <?php }
        mysqli_free_result($result);
        ?>
        <tr>
            <td colspan="8">
                <div class="pagelist"><a>上一页</a> <span class="current">1</span><a>2</a><a>3</a><a>下一页</a><a>尾页</a></div>
            </td>
            <td></td>
            <td></td>
        </tr>
    </table>
</div>


</body>
</html>