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
    <script language="javascript">
        function exit(news) {
            var se = confirm("是否将该比赛状态修改为已结束？警告：此操作不可撤销！！！");
            var id = news.getAttribute('data-type');
            if (se == true) {
                location.href = "z_state.php?id="+id;
            }
        }
    </script>
</head>
<body>
<form method="post" action="">
    <div class="panel admin-panel">
        <div class="panel-head"><strong class="icon-reorder"> 活动管理</strong></div>

        <table class="table table-hover text-center">
            <tr>
                <th width="120">序号</th>
                <th>活动名称</th>
                <th>主办方</th>
                <th>截止时间</th>
                <!-- <th width="120">留言时间</th>-->
                <th colspan="5">操作</th>
            </tr>
            <?php
            include "z_mysql.php";
            $i=0;
            $num_rec_per_page = 6;   // 每页显示数量
            if (isset($_GET["page"])) {
                $page = $_GET["page"];
            } else {
                $page = 1;
            };
            $start_from = ($page - 1) * $num_rec_per_page;
            $result = $conn->query("SELECT id,name,host,state,time FROM activity  LIMIT $start_from, $num_rec_per_page");
            while ($row = mysqli_fetch_array($result)) { ?>
                <tr>
                    <td> <?php echo ++$i ?></td>
                    <td> <?php echo $row[1] ?></td>
                    <td> <?php echo $row[2] ?></td>
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
                            <div class="button-group"><a class="button border-red"><span
                                            class="icon-trash-o"></span><span data-type="<?php echo $row[0];?>" onclick="exit(this)"> 进行中</span></a></div>
                        </td>

                    <?php } else { ?>
                        <td>
                            <div class="button-group"><a class="button border-blue"><span class="icon-trash-o"></span>
                                    已结束</a></div>
                        </td>

                    <?php } ?>

                </tr>
            <?php }
            $rs_result = $conn->query("SELECT * FROM activity"); //查询数据
            $total_records = mysqli_num_rows($rs_result);  // 统计总共的记录条数
            $total_pages = ceil($total_records / $num_rec_per_page);  // 计算总页数
            mysqli_free_result($result);
            ?>


            <tr>
                <td colspan="8">
                    <div class="pagelist"><a href="z_page.php?page=1">首页</a>

                        <?php
                        if($total_pages==0)
                            $total_pages=1;
                        for ($i = 1; $i <= $total_pages; $i++) { ?>
                            <a href='z_page.php?page=<?php echo $i ?>'><?php echo $i ?></a>
                        <?php } ?>

                        <a href="z_page.php?page=<?php echo $total_pages ?>">末页</a>
                    </div>
                </td>
                <td></td>
                <td></td>
            </tr>
        </table>
    </div>
</form>

</body>
</html>