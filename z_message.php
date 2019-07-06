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
        <div class="panel-head"><strong class="icon-reorder"> 问题反馈</strong></div>

        <table class="table table-hover text-center">
            <tr>
                <th colspan="2">学号</th>
                <th colspan="2">姓名</th>
                <th colspan="6">问题内容</th>
                <th>反馈时间</th>
            </tr>
            <?php
            include "z_mysql.php";
            $num_rec_per_page = 6;   // 每页显示数量
            if (isset($_GET["page"])) {
                $page = $_GET["page"];
            } else {
                $page = 1;
            };
            $start_from = ($page - 1) * $num_rec_per_page;
            $result = $conn->query("SELECT question.sno,username,q_question,q_time FROM ruser,question where ruser.sno=question.sno order by q_time desc LIMIT $start_from, $num_rec_per_page");
            while ($row = mysqli_fetch_array($result)) { ?>
                <tr>
                    <td colspan="2"> <?php echo $row[0] ?></td>
                    <td colspan="2"> <?php echo $row[1] ?></td>
                    <td colspan="6"> <?php echo $row[2] ?></td>
                    <td> <?php echo $row[3] ?></td>
                </tr>
            <?php }
            $rs_result = $conn->query("SELECT * FROM question"); //查询数据
            $total_records = mysqli_num_rows($rs_result);  // 统计总共的记录条数
            $total_pages = ceil($total_records / $num_rec_per_page);  // 计算总页数
            mysqli_free_result($result);
            ?>


            <tr>
                <td colspan="10">
                    <div class="pagelist"><a href="z_message.php?page=1">首页</a>
                        <?php
                        if ($total_pages == 0)
                            $total_pages = 1;
                        for ($i = 1; $i <= $total_pages; $i++) { ?>
                            <a href='z_message.php?page=<?php echo $i ?>'><?php echo $i ?></a>
                        <?php } ?>

                        <a href="z_message.php?page=<?php echo $total_pages ?>">末页</a>
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