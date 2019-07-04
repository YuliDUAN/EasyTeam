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
        <form method="post" action="z_teamSearch.php?ac_id=<?php echo $ac_id ?>">
            <ul class="search" style="padding-left:10px;">
                <li>搜索：</li>

                <li>
                    <input type="text" placeholder="请输入队伍名称" name="keywords" class="input"
                           style="width:250px; line-height:17px;display:inline-block"/>
                    <button class="button border-main icon-search" type="submit"> 搜索</button>
                </li>
            </ul>
        </form>
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
        $num_rec_per_page = 4;   // 每页显示数量
        if (isset($_GET["page"])) {
            $page = $_GET["page"];
        } else {
            $page = 1;
        };
        $start_from = ($page - 1) * $num_rec_per_page;
        $sql = "SELECT team_id,team_name,team_cap,team_prize FROM team,activity where team.ac_id=activity.id and activity.id='$ac_id' LIMIT $start_from, $num_rec_per_page ";
        $result = $conn->query($sql);
        while ($row = mysqli_fetch_array($result)) { ?>
            <tr>
                <td> <?php echo $row[0] ?></td>
                <td colspan="2"> <?php echo $row[1] ?></td>
                <td> <?php echo $row[2] ?></td>
                <!--                <td> --><?php //echo $row[4]?><!--</td>-->
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
        $rs_result = $conn->query("SELECT * FROM team where ac_id='$ac_id'"); //查询数据
        $total_records = mysqli_num_rows($rs_result);  // 统计总共的记录条数
        $total_pages = ceil($total_records / $num_rec_per_page);  // 计算总页数
        mysqli_free_result($result);
        ?>
        <tr>
            <td colspan="8">
                <div class="pagelist"><a href="z_team.php?page=1&id=<?php echo $ac_id ?>">首页</a>

                    <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                        <a href='z_team.php?page=<?php echo $i ?>&id=<?php echo $ac_id ?>'><?php echo $i ?></a>
                    <?php } ?>

                    <a href="z_team.php?page=<?php echo $total_pages ?>&id=<?php echo $ac_id ?>">末页</a>
                </div>
            </td>
            <td></td>
            <td></td>
        </tr>
    </table>
</div>


</body>
</html>