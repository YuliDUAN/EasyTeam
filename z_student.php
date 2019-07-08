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
    <div class="panel-head"><strong class="icon-reorder"> 学生信息</strong></div>
    <div class="padding border-bottom">
        <form method="post" action="z_stuSearch.php">
            <ul class="search" style="padding-left:10px;">
                <li>搜索：</li>

                <li>
                    <input type="text" placeholder="请输入学号或姓名" name="keywords" class="input"
                           style="width:250px; line-height:17px;display:inline-block"/>
                    <button class="button border-main icon-search" type="submit"> 搜索</button>
                </li>
            </ul>
        </form>
    </div>
    <table class="table table-hover text-center">
        <tr>
            <th width="120">学号</th>
            <th>姓名</th>
            <th>性别</th>
            <th>电话</th>
            <th>专业</th>
            <th>班级</th>
            <th colspan="6">操作</th>
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

        $result = $conn->query("SELECT sno,username,sex,phone,adpt,major,cls FROM ruser  LIMIT $start_from, $num_rec_per_page");
        while ($row = mysqli_fetch_array($result)) { ?>
            <tr>
                <td> <?php echo $row[0] ?></td>
                <td> <?php echo $row[1] ?></td>
                <td> <?php echo $row[2] ?></td>
                <td> <?php echo $row[3] ?></td>
<!--                <td> --><?php //echo $row[4] ?><!--</td>-->
                <td> <?php echo $row[5] ?></td>
                <td> <?php echo $row[6] ?></td>
                <td colspan="3">
                    <div class="button-group"><a class="button border-red"
                                                 href='z_stu_modify.php?sno=<?php echo $row[0] ?>'><span
                                    class="icon-trash-o"></span> 修改</a></div>
                </td>
                <td colspan="3">
                    <div class="button-group"><a class="button border-red"><span
                                    class="icon-trash-o"></span><span data-type="<?php echo $row[0];?>" onclick="exit(this)"> 重置密码</span></a></div>
                </td>
            </tr>
        <?php }
        $rs_result = $conn->query("SELECT * FROM ruser"); //查询数据
        $total_records = mysqli_num_rows($rs_result);  // 统计总共的记录条数
        $total_pages = ceil($total_records / $num_rec_per_page);  // 计算总页数
        mysqli_free_result($result);
        ?>
        <tr>
            <td colspan="8">
                <div class="pagelist"><a href="z_student.php?page=1">首页</a>

                    <?php
                    if($total_pages==0)
                        $total_pages=1;
                    for ($i = 1; $i <= $total_pages; $i++) { ?>
                        <a href='z_student.php?page=<?php echo $i ?>'><?php echo $i ?></a>
                    <?php } ?>

                    <a href="z_student.php?page=<?php echo $total_pages ?>">末页</a>
                </div>
            </td>
            <td></td>
            <td></td>
        </tr>
    </table>
</div>


</body>

</html>