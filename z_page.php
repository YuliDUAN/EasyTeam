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
<form method="post" action="">
    <div class="panel admin-panel">
        <div class="panel-head"><strong class="icon-reorder"> 活动管理</strong></div>
        <!--<div class="padding border-bottom">
          <ul class="search">
            <li>
              <button type="button"  class="button border-green" id="checkall"><span class="icon-check"></span> 全选</button>
              <button type="submit" class="button border-red"><span class="icon-trash-o"></span> 批量删除</button>
            </li>
          </ul>
        </div>-->

        <table class="table table-hover text-center">
            <tr>
                <th width="120">ID</th>
                <th>活动名称</th>
                <th>主办方</th>
                <th>活动状态</th>
                <th>发布时间</th>
                <!-- <th width="120">留言时间</th>-->
                <th colspan="5">操作</th>
            </tr>
            <?php
            include "z_mysql.php";
            $result = $conn->query("SELECT id,name,host,state,time FROM activity");
            while ($row = mysqli_fetch_array($result)) { ?>
                <tr>
                    <td> <?php echo $row[0] ?></td>
                    <td> <?php echo $row[1] ?></td>
                    <td> <?php echo $row[2] ?></td>
                    <td> <?php echo $row[3] ?></td>
                    <td> <?php echo $row[4] ?></td>

                    <td>
                        <div id="<?php echo $row[0] ?>" class="button-group"><a class="button border-red"
                                                                                href='z_prizeinformation.php?id=<?php echo $row[0] ?>'><span
                                        class="icon-edit"></span> 获奖详情</a></div>
                    </td>
                    <td>
                        <div class="button-group"><a class="button border-red"
                                                     href='z_team.php?id=<?php echo $row[0] ?>'><span
                                        class="icon-user"></span> 队伍</a></div>
                    </td>
                    <td>
                        <div class="button-group"><a class="button border-red"
                                                     href='z_modify.php?id=<?php echo $row[0] ?>'><span
                                        class="icon-edit"></span> 修改</a></div>
                    </td>
                    <?php
                    if ($row[3] == 1) {
                        ?>
                        <td>
                            <div class="button-group"><a class="button border-red"
                                                         href="z_state.php?id=<?php echo $row[0] ?>"><span
                                            class="icon-trash-o"></span> 进行中</a></div>
                        </td>

                    <?php } else { ?>
                        <td>
                            <div class="button-group"><a class="button border-blue"><span class="icon-trash-o"></span>
                                    已结束</a></div>
                        </td>

                    <?php } ?>

                </tr>
            <?php }
            mysqli_free_result($result);
            ?>


            <tr>
                <td colspan="8">
                    <div class="pagelist"><a href="z_page.php">上一页</a> <span class="current">1</span><a
                                href="z_page.php">2</a><a href="z_page.php">3</a><a href="z_page.php">下一页</a></div>
                </td>
                <td></td>
                <td></td>
            </tr>
        </table>
    </div>
</form>

</body>
</html>