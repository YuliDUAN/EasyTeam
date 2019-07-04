<?php
$ac_id = $_GET["id"];
include "z_mysql.php";
$sql = "SELECT name FROM activity where id='$ac_id'";
$result = $conn->query($sql);
$row = mysqli_fetch_array($result);
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
    <div class="panel-head"><strong class="icon-reorder"> <?php echo $row[0] ?>获奖信息</strong></div>


    <table class="table table-hover text-center">
        <tr>
            <!--            <th width="120">获奖队伍ID</th>-->
            <th width="120">获奖队伍ID</th>
            <th colspan="2">队名</th>
            <th>队长</th>
            <th>学号</th>
            <th colspan="5">所获奖项</th>
        </tr>
        <?php
        include "z_mysql.php";
        $num_rec_per_page = 4;   // 每页显示数量
        if (isset($_GET["page"])) {
            $page = $_GET["page"];
        } else {
            $page = 1;
        };
        $start_from = ($page - 1) * $num_rec_per_page;
        $sql2 = "SELECT team_id,team_name,team_cap,team_prize,cap_sno FROM team,activity where team.ac_id=activity.id and activity.id='$ac_id' and team_prize in(1,2,3,4) order by team_prize desc LIMIT $start_from, $num_rec_per_page";
        $result2 = $conn->query($sql2);
        while ($rows = mysqli_fetch_array($result2)) { ?>
            <tr>
                <td> <?php echo $rows[0] ?></td>
                <td colspan="2"> <?php echo $rows[1] ?></td>
                <td> <?php echo $rows[2] ?></td>
                <td> <?php echo $rows[4] ?></td>
                <td colspan="5"><?php
                    if ($rows[3] == 1) {
                        echo "优胜奖";
                    } else if ($rows[3] == 2) {
                        echo "三等奖";
                    } else if ($rows[3] == 3) {
                        echo "二等奖";
                    } else if ($rows[3] == 4) {
                        echo "一等奖";
                    }
                    ?></td>
            </tr>
        <?php }
        $rs_result = $conn->query("SELECT * FROM team,activity where team.ac_id=activity.id and activity.id='$ac_id' and team_prize in(1,2,3,4)"); //查询数据
        $total_records = mysqli_num_rows($rs_result);  // 统计总共的记录条数
        $total_pages = ceil($total_records / $num_rec_per_page);  // 计算总页数
        mysqli_free_result($result);
        ?>
        <tr>
            <td colspan="8">
                <div class="pagelist"><a href="z_prizeinformation.php?page=1&id=<?php echo $ac_id ?>">首页</a>

                    <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                        <a href='z_prizeinformation.php?page=<?php echo $i ?>&id=<?php echo $ac_id ?>'><?php echo $i ?></a>
                    <?php } ?>

                    <a href="z_prizeinformation.php?page=<?php echo $total_pages ?>&id=<?php echo $ac_id ?>">末页</a>
                </div>
            </td>
            <td></td>
            <td></td>
        </tr>
    </table>
</div>


</body>
</html>