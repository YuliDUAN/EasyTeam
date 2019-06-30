<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <link rel="shortcut icon" href="images/logo.ico">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta name="renderer" content="webkit">
    <title>学生信息</title>
    <link rel="stylesheet" href="css/pintuer.css">
    <link rel="stylesheet" href="css/admin.css">
    <script src="js/jquery.js"></script>
    <script src="js/pintuer.js"></script>
</head>
<body>
<form method="post" action="">
    <div class="panel admin-panel">
        <div class="panel-head"><strong class="icon-reorder"> 学生信息</strong></div>


        <table class="table table-hover text-center">
            <tr>
                <th width="120">学号</th>
                <th>姓名</th>
                <th>性别</th>
                <th>电话</th>
                <th>学院</th>
                <th>专业</th>
                <th>班级</th>
                <!-- <th width="120">留言时间</th>-->
                <th colspan="6">操作</th>
            </tr>

            <?php
            include "z_mysql.php";
            $result = $conn->query("SELECT sno,username,sex,phone,adpt,major,cls FROM ruser");
            while ($row = mysqli_fetch_array($result)) { ?>
                <tr>
                    <td> <?php echo $row[0] ?></td>
                    <td> <?php echo $row[1] ?></td>
                    <td> <?php echo $row[2] ?></td>
                    <td> <?php echo $row[3] ?></td>
                    <td> <?php echo $row[4] ?></td>
                    <td> <?php echo $row[5] ?></td>
                    <td> <?php echo $row[6] ?></td>
                    <td colspan="6">
                        <div class="button-group"><a class="button border-red"
                                                     href='z_stu_modify.php?sno=<?php echo $row[0] ?>'><span
                                        class="icon-trash-o"></span> 修改</a></div>
                    </td>
                </tr>
            <?php }
            mysqli_free_result($result);
            ?>
            <tr>
                <td colspan="8">
                    <div class="pagelist"><a href="z_student.php">上一页</a> <span class="current">1</span><a
                                href="z_student.php">2</a><a href="z_student.php">3</a><a href="z_student.php">下一页</a>
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