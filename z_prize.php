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
    <div class="panel-head"><strong class="icon-reorder"> 获奖录入</strong></div>

    <form method="post" action="z_prizeAction.php">
        <table class="table table-hover text-center">
            <tr>
                <th width="120">队伍ID</th>
                <th>参加活动</th>
                <th>队名</th>
                <th>队长</th>
                <th colspan="5">奖项</th>
                <th>操作</th>
            </tr>
            <?php
            $id = $_GET["id"];
            include "z_mysql.php";
            $sql = "SELECT team_id,activity.name,team_name,team_cap,team_prize FROM team,activity where team.ac_id=activity.id and activity.id='$id'";
            $result = $conn->query($sql);
            while ($row = mysqli_fetch_array($result)) { ?>

                <tr>

                    <td> <?php echo $row[0] ?></td>
                    <td> <?php echo $row[1] ?></td>
                    <td> <?php echo $row[2] ?></td>
                    <td> <?php echo $row[3] ?></td>
                    <?php if ($row[4] == 0) { ?>
                        <td><input type="radio" name="<?php echo $row[0] ?>" value="0" checked="checked"/>未获奖</td>
                        <td><input type="radio" name="<?php echo $row[0] ?>" value="1"/>优胜奖</td>
                        <td><input type="radio" name="<?php echo $row[0] ?>" value="2"/>三等奖</td>
                        <td><input type="radio" name="<?php echo $row[0] ?>" value="3"/>二等奖</td>
                        <td><input type="radio" name="<?php echo $row[0] ?>" value="4"/>一等奖</td>

                        <td>
                            <button class="button bg-main icon-check-square-o" type="submit"> 确定</button>
                        </td>
                    <?php } ?>
                    <?php if ($row[4] == 1) { ?>
                        <td><input type="radio" name="<?php echo $row[0] ?>" value="0"/>未获奖</td>
                        <td><input type="radio" name="<?php echo $row[0] ?>" value="1" checked="checked"/>优胜奖</td>
                        <td><input type="radio" name="<?php echo $row[0] ?>" value="2"/>三等奖</td>
                        <td><input type="radio" name="<?php echo $row[0] ?>" value="3"/>二等奖</td>
                        <td><input type="radio" name="<?php echo $row[0] ?>" value="4"/>一等奖</td>

                        <td>
                            <button class="button bg-main icon-check-square-o" type="submit"> 确定</button>
                        </td>
                    <?php } ?>
                    <?php if ($row[4] == 2) { ?>
                        <td><input type="radio" name="<?php echo $row[0] ?>" value="0"/>未获奖</td>
                        <td><input type="radio" name="<?php echo $row[0] ?>" value="1"/>优胜奖</td>
                        <td><input type="radio" name="<?php echo $row[0] ?>" value="2" checked="checked"/>三等奖</td>
                        <td><input type="radio" name="<?php echo $row[0] ?>" value="3"/>二等奖</td>
                        <td><input type="radio" name="<?php echo $row[0] ?>" value="4"/>一等奖</td>

                        <td>
                            <button class="button bg-main icon-check-square-o" type="submit"> 确定</button>
                        </td>
                    <?php } ?>
                    <?php if ($row[4] == 3) { ?>
                        <td><input type="radio" name="<?php echo $row[0] ?>" value="0"/>未获奖</td>
                        <td><input type="radio" name="<?php echo $row[0] ?>" value="1"/>优胜奖</td>
                        <td><input type="radio" name="<?php echo $row[0] ?>" value="2"/>三等奖</td>
                        <td><input type="radio" name="<?php echo $row[0] ?>" value="3" checked="checked"/>二等奖</td>
                        <td><input type="radio" name="<?php echo $row[0] ?>" value="4"/>一等奖</td>

                        <td>
                            <button class="button bg-main icon-check-square-o" type="submit"> 确定</button>
                        </td>
                    <?php } ?>
                    <?php if ($row[4] == 4) { ?>
                        <td><input type="radio" name="<?php echo $row[0] ?>" value="0"/>未获奖</td>
                        <td><input type="radio" name="<?php echo $row[0] ?>" value="1"/>优胜奖</td>
                        <td><input type="radio" name="<?php echo $row[0] ?>" value="2"/>三等奖</td>
                        <td><input type="radio" name="<?php echo $row[0] ?>" value="3"/>二等奖</td>
                        <td><input type="radio" name="<?php echo $row[0] ?>" value="4" checked="checked"/>一等奖</td>

                        <td>
                            <button class="button bg-main icon-check-square-o" type="submit"> 确定</button>
                        </td>
                    <?php } ?>

                </tr>

            <?php }
            mysqli_free_result($result);
            ?>
            <tr>
                <td colspan="8">
                    <div class="pagelist"><a>上一页</a> <span class="current">1</span><a>2</a><a>3</a><a>下一页</a><a>尾页</a>
                    </div>
                </td>
                <td></td>
                <td></td>
            </tr>
        </table>
    </form>
</div>


</body>
</html>