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
<form method="post" action="" id="listform">
    <div class="panel admin-panel">
        <div class="panel-head"><strong class="icon-reorder"> 往期宣讲会列表</strong> <a href=""
                                                                                  style="float:right; display:none;">添加字段</a>
        </div>
        <div class="padding border-bottom">
            <ul class="search" style="padding-left:10px;">

                <li><a class="button border-main icon-plus-square-o" href="z_nova.php"> 返回</a></li>
            </ul>

        </div>
        <table class="table table-hover text-center">
            <tr>
                <th>图片</th>
                <th>姓名</th>
                <th colspan="2">所属部门</th>

                <th colspan="6">操作</th>
            </tr>
            <volist name="list" id="vo">
                <?php
                include("z_mysql.php");
                $num_rec_per_page = 6;   // 每页显示数量
                if (isset($_GET["page"])) {
                    $page = $_GET["page"];
                } else {
                    $page = 1;
                };
                $start_from = ($page - 1) * $num_rec_per_page;

                $result = $conn->query("SELECT id,image,name,host FROM nova where state=0 LIMIT $start_from, $num_rec_per_page ");
                while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                        <td width="10%"><img src="<?php echo $row[1] ?>" alt="" width="70" height="50"/></td>
                        <td><?php echo $row[2] ?></td>
                        <td colspan="2"><font color="#00CC99"><?php echo $row[3] ?></font></td>

                        <td colspan="6">
                            <div class="button-group"><a class="button border-main"
                                                         href='z_deletenova.php?id=<?php echo $row[0] ?>'><span
                                            class="icon-edit"></span> 删除</a>

                    </tr>
                <?php }
                $rs_result = $conn->query("SELECT * FROM nova"); //查询数据
                $total_records = mysqli_num_rows($rs_result);  // 统计总共的记录条数
                $total_pages = ceil($total_records / $num_rec_per_page);  // 计算总页数
                /*  mysqli_free_result($result);*/
                ?>
                <tr>
                    <td colspan="8">
                        <div class="pagelist"><a href="z_endnova.php?page=1">首页</a>

                            <?php
                            if($total_pages==0)
                                $total_pages=1;
                            for ($i = 1; $i <= $total_pages; $i++) { ?>
                                <a href='z_endnova.php?page=<?php echo $i ?>'><?php echo $i ?></a>
                            <?php } ?>

                            <a href="z_endnova.php?page=<?php echo $total_pages ?>">末页</a>
                        </div>
                    </td>
                    <td></td>
                    <td></td>
                </tr>
            </volist>
        </table>
    </div>
</form>
</body>
</html>