<?php
$key = $_POST["keywords"];
$ac_id = $_GET["ac_id"]
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
    <div class="panel-head"><strong class="icon-reorder"> 搜索结果</strong></div>
    <div class="padding border-bottom">
        <ul class="search" style="padding-left:10px;">
            <li><a class="button border-main icon-plus-square-o" href="z_team.php?id=<?php echo $ac_id ?>"> 返回</a></li>
        </ul>
    </div>
    <table class="table table-hover text-center">
        <tr>
            <th width="120">队伍ID</th>
            <th colspan="2">队名</th>
            <th>队长</th>
            <th colspan="2">获奖情况</th>
            <th colspan="4">操作</th>
        </tr>
        <?php
        include "z_mysql.php";
        $sql = "SELECT team_id,team_name,team_cap,team_prize,otherprize FROM team where team_name LIKE '%$key%' or team_cap like '%$key%' and ac_id='$ac_id' ";
        $result = $conn->query($sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) { ?>
                <tr>
                    <td> <?php echo $row[0] ?></td>
                    <td colspan="2"> <?php echo $row[1] ?></td>
                    <td> <?php echo $row[2] ?></td>
                    <td colspan="2"><?php
                        if ($row[3] == 1) {
                            echo "优胜奖";
                        } else if ($row[3] == 2) {
                            echo "三等奖";
                        } else if ($row[3] == 3) {
                            echo "二等奖";
                        } else if ($row[3] == 4) {
                            echo "一等奖";
                        } else if ($row[3] == 0) {
                            echo "未获奖";
                        }else if ($row[3] == 5) {
                            echo $row[4];
                        }
                        ?></td>
                    <td colspan="2">
                        <div class="button-group"><a class="button border-blue"
                                                     href='z_addprizes.php?id=<?php echo $row[0] ?>&ac_id=<?php echo $ac_id ?>'><span
                                        class="icon-trash-o"></span> 获奖录入</a></div>
                    </td>
                    <td colspan="2">
                        <div class="button-group"><a class="button border-red"
                                                     href='z_teamDelete.php?id=<?php echo $row[0] ?>'><span
                                        class="icon-trash-o"></span> 删除</a></div>
                    </td>
                </tr>
            <?php }
        } else {
            echo "<script>alert('无查询结果');location.href='z_team.php?id=$ac_id';</script>";
        }
        mysqli_free_result($result);
        ?>
    </table>

</div>

</body>
</html>
