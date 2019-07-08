
<?php
$key = $_POST["keywords"];
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
    <script language="javascript">
        function exit(news) {
            var se = confirm("确定将该学生密码重置为111111吗？");
            var sno = news.getAttribute('data-type');
            if (se == true) {
                location.href = "z_stu_resetpwd.php?sno="+sno;
            }
        }
    </script>
</head>
<body>
<div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder"> 搜索结果</strong></div>
    <div class="padding border-bottom">
        <ul class="search" style="padding-left:10px;">
            <li><a class="button border-main icon-plus-square-o" href="z_student.php"> 返回</a></li>
        </ul>
    </div>

    <table class="table table-hover text-center">
        <tr>
            <th width="120">学号</th>
            <th>姓名</th>
            <th>性别</th>
            <th>电话</th>

            <th>专业</th>
            <th>班级</th>
            <!-- <th width="120">留言时间</th>-->
            <th colspan="6">操作</th>
        </tr>

        <?php
        include "z_mysql.php";
        $result = $conn->query("SELECT sno,username,sex,phone,adpt,major,cls FROM ruser where sno like '%$key%' or username like '%$key%'");
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                ?>
                <tr>
                    <td> <?php echo $row[0] ?></td>
                    <td> <?php echo $row[1] ?></td>
                    <td> <?php echo $row[2] ?></td>
                    <td> <?php echo $row[3] ?></td>
                    <td> <?php echo $row[5] ?></td>
                    <td> <?php echo $row[6] ?></td>
                    <td colspan="3">
                        <div class="button-group"><a class="button border-red"
                                                     href='z_stu_modify.php?sno=<?php echo $row[0] ?>'><span
                                        class="icon-trash-o"></span> 修改</a></div>
                    </td>
                    <td colspan="3">
                        <div class="button-group"><a class="button border-red"><span
                                        class="icon-trash-o"></span> <span data-type="<?php echo $row[0];?>" onclick="exit(this)"> 重置密码</span></a></div>
                    </td>
                </tr>
            <?php }
        } else {
            echo "<script>alert('无查询结果');location.href='z_student.php';</script>";
        }
        mysqli_free_result($result);
      ?>

    </table>
</div>

</body>
</html>
