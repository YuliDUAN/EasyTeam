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
        <div class="panel-head"><strong class="icon-reorder"> 宣讲会列表</strong> <a href=""
                                                                                style="float:right; display:none;">添加字段</a>
        </div>
        <div class="padding border-bottom">
            <ul class="search" style="padding-left:10px;">

                <li><a class="button border-main icon-plus-square-o" href="z_endlecture.php"> 往期宣讲会</a></li>
            </ul>

        </div>
        <table class="table table-hover text-center">
            <tr>
                <th width="100" style="text-align:left; padding-left:20px;">ID</th>
                <th>图片</th>
                <th>名称</th>
                <th width="10%">宣讲会时间</th>
                <th>宣讲会地点</th>
                <th width="280">操作</th>
            </tr>
            <volist name="list" id="vo">
                <?php
                include("z_mysql.php");
                $result = $conn->query("SELECT id,image,title,time,adr,number FROM lecture where state=1");
                while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                        <td style="text-align:left; padding-left:20px;"><?php echo $row[0] ?></td>
                        <td width="10%"><img src="<?php echo $row[1] ?>" alt="" width="70" height="50"/></td>
                        <td><?php echo $row[2] ?></td>
                        <td><font color="#00CC99"><?php echo $row[3] ?></font></td>
                        <td><?php echo $row[4] ?></td>
                        <td>
                            <div class="button-group"><a class="button border-main"
                                                         href='z_lectureAdd.php?id=<?php echo $row[0] ?>&number=<?php echo $row[5] ?>'><span
                                            class="icon-edit"></span> 替换</a>
                                <!--   <a class="button border-red" href='z_articleDeleteAction.php?ar_id=<?php /* echo $row[0] */ ?>' ><span class="icon-trash-o"></span> 删除</a> </div></td>-->

                    </tr>
                <?php } ?>

            </volist>
        </table>
    </div>
</form>
</body>
</html>