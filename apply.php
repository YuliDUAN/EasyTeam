<?php
$id = $_GET["id"];
include "MySqlConnect.php";
include "stateAction.php";
$sql = "select * from forum,ruser where ac_id='$id' and ruser.sno = forum.uid order by ctime";
$result = $conn->query($sql);
$arownews = array();
while ($geren = mysqli_fetch_array($result)) {
    array_push($arownews, $geren);
}
$i = 1;
?>
<html lang="en">
<head>
    <title>正在进行</title>
    <link rel="shortcut icon" href="images/logo.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords" content=""/>
    <script type="application/x-javascript"> addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- Custom Theme files -->
    <link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
    <link href="css/style.css" type="text/css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="all" property=""/>
    <!-- //Custom Theme files -->
    <!-- font-awesome icons -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <!-- //font-awesome icons -->
    <!-- js -->
    <script src="js/jquery-2.2.3.min.js"></script>
    <!-- //js -->
    <!-- web-fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic'
          rel='stylesheet' type='text/css'>
    <!-- //web-fonts -->
    <script>function on_Clicka1() {
            alert("回复成功！");
        }

        function on_Clicka2() {
            alert("评论成功！");
        }</script>
    <style>
        .gl_sm_list li .sp {
            position: absolute;
            /* left: 50%; */
            /* top: 4px; */
            margin-top: 2px;
            margin-left: -16px;
            border-radius: 100%;
            background-color: #fc6678;
            font-size: 4px;
            color: #fff;
            line-height: 1;
            vertical-align: 10px;
            padding: 2px 4px;

        }
    </style>
</head>
<style>
    h4 {
        max-font-size: 22px;
    }

    h5 {
        max-font-size: 12px;
    }

    .chart_top {
        width: 100%;
        height: 30%;
        position: relative;
    }

    .chart_buttom {
        width: 100%;
        height: 10%;
        position: relative;
    }
</style>
<body>
<!-- banner -->
<?php
$sqlnums = "select * from sendnews where receive_id = $sno and static_news = 0";
$resultnums = $conn->query($sqlnums);
$news_nums = array();
while ($rownums = mysqli_fetch_array($resultnums)) {
    array_push($news_nums, $rownums);
}
?>
<?php
$sqlstatic = "select * from static where capsno=$sno and static_join = 1";
$resultstatic = $conn->query($sqlstatic);
$arrstatic = array();
while ($rowstatic = mysqli_fetch_array($resultstatic)) {
    array_push($arrstatic, $rowstatic);
}
?>
<div class="banner-1">
    <div class="header agileinfo-header"><!-- header -->
        <nav class="navbar navbar-default">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <h1><a href="homepage.php"><i class="fa fa-pagelines" aria-hidden="true"></i>易组队</a></h1>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse gl_sm_list" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-left">
                        <li><a href="homepage.php" class="btn w3ls-hover">首页</a></li>
                        <li><a href="gallery.php" class="btn w3ls-hover">校园趣事</a></li>
                        <li><a href="#" class="dropdown-toggle w3ls-hover active" data-toggle="dropdown" role="button"
                               aria-haspopup="true" aria-expanded="false">校园赛事<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="icons.php">正在进行</a></li>
                                <li><a href="codes.php">已经结束</a></li>
                            </ul>
                        </li>
                        <li><a href="link.php" class="btn w3ls-hover">报名入口</a></li>
                        <li><a href="news.php" class="w3ls-hover">
                                <?php
                                if (!empty($news_nums)||!empty($arrstatic)) {
                                    ?>
                                    <?php
                                    echo '<' . 'span class="sp"' . '>';
                                    echo count($news_nums)+count($arrstatic);
                                    echo '</' . 'span' . '>';
                                    ?>
                                <?php } else {
                                    ?>
                                    <?php
                                    echo "";
                                    ?>
                                <?php } ?>
                                个人中心</a></li>
                    </ul>
                    <div class="social-icon">
                        <img src="images/collection_no.png" onclick="collect()" id="caocao_pic">
                    </div>
                    <div class="clearfix"></div>
                </div><!-- //navbar-collapse -->
            </div><!-- //container-fluid -->
        </nav>
    </div><!-- //header -->

</div>
<?php
echo "<script>var id = \"$id\"</script>";
?>
<script>
    function collect() {
        var curl = window.location.href;
        var xhr = new XMLHttpRequest();
        xhr.open('POST','applyCollectAction.php','true');
        xhr.setRequestHeader('Content-TYpe','application/x-www-form-urlencoded');
        xhr.send(`id=${id}&&url=${curl}`);
        xhr.onreadystatechange = function(){
            if (this.readyState != 4) return;
            var imgObj = document.getElementById("caocao_pic");
            if(imgObj.getAttribute("src",2)=="images/collection_no.png"){
                imgObj.src="images/collection_yes.png";
            }
            alert(this.responseText);

        }
    }
</script>
<!-- //banner -->
<!-- typography -->
<?php


$sql1 = "SELECT name,title,limi,number,time,prize,id,host,inputtime FROM activity where id='$id'";
$result = $conn->query($sql1);
$row = mysqli_fetch_array($result);
$a_id = $row[6];

?>
<div class="typo" style="background-color: #dddddd">
    <div class="container" style="width:80%">
        <h3 class="hdg"><?php echo $row[0] ?></h3>
        <div style="width:100%">
            <div style="float: left;width:20%;height:430px;border-radius: 10px;background-color: #ffffff;padding: 20px">
                <div align="center">
                    <img src="images/t21.jpg" width="120px" height="120px" style="border-radius: 100px"/>
                </div>
                <div style="padding: 20px">
                    <p><font size="3.5"><b>发布者：</b></font></p>
                    <p align="center"><font size="4"><b><?php echo $row[7] ?></b></font></p>
                    <p><font size="3.5"><b>发布时间：</b></font></p>
                    <p align="center"><font size="4"><b><?php echo $row[8] ?></b></font></p>
                </div>
            </div>
            <div style="float: right;height: 430px;width:77%;border-radius: 10px;background-color:  #ffffff;padding-right:60px;padding-left:60px;padding-top:30px;word-break: break-all;overflow-y:auto">
                <div>
                    <table style="border-collapse:separate; border-spacing:0px 15px;">
                        <tr>
                            <td style="width: 170px"><h4><b>比赛名称：</b></h4></td>
                            <td><h4><b><?php echo $row[0] ?></b></h4></td>
                        </tr>
                        <tr>
                            <td style="width: 150px"><h4><b>主题：</b></h4></td>
                            <td><h4><b><?php echo $row[1] ?></b></h4></td>
                        </tr>
                        <tr>
                            <td style="width: 150px"><h4><b>人员：</b></h4></td>
                            <td><h4><b><?php echo $row[2] ?></h4></b></td>
                        </tr>
                        <tr>
                            <td style="width: 150px"><h4><b>团队人员限制：</b></h4></td>
                            <td><h4><?php echo $row[3] ?></h4></td>
                        </tr>
                        <tr>
                            <td style="width: 150px"><h4><b>报名截止日期：</b></h4></td>
                            <td><h4><b><?php echo $row[4] ?></b></h4></td>
                        </tr>
                        <tr>
                            <td style="width: 150px"><h4><b>奖励：</b></h4></td>
                            <td><h4><b><?php echo $row[5] ?></b></h4></td>
                        </tr>
                    </table>
                </div>
                <div style="margin-top:12px;border-top:3px solid #ddd">
                    <table class="table" style="text-align: center">
                        <tbody>
                        <tr>
                            <td class="type-info"><a href="cteam.php?id=<?php echo $a_id ?>"><font
                                                size="5">创建队伍</font></a>
                            </td>
                            <td class="type-info"><a href="jteam.php?id=<?php echo $a_id ?>"><font
                                                size="5">加入队伍</font></a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div>
            <table class="table" style="text-align: right">
                <tbody>
                <tr></tr>
                </tbody>
            </table>
        </div>


        <?php foreach ($arownews as $row) { ?>
            <?php
            $forumid = $row['uid'];
            $sql = "select * from replys where replys.fid = $forumid ";
            $replysresult = $conn->query($sql);
            $arr = array();
            while ($m = mysqli_fetch_array($replysresult)) {
                array_push($arr, $m);
            }
            ?>
            <div class="modal video-modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <i class="fa fa-pagelines" aria-hidden="true"></i>APP创意设计大赛
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                        </div>
                        <section>
                            <div class="modal-body">
                                <p>app创意中心现隶属于计算机与软件工程学院，是学院“双创”实验室中心重要组成实验室之一。
                                    旨在为学生提供一个基于互联网产品进行创新创意的一个学习交流和团队研发环境
                                    <i>*App创意俱乐部</i></p>
                            </div>
                        </section>
                    </div>
                </div>
            </div>

            <div style="width:100%">
                <div style="float: left;width:20%;height:400px;border-radius: 10px;background-color:  #ffffff;padding: 20px;border-bottom:6px solid #ddd">
                    <div align="center" title="点击查看信息">
                        <a href="
                        <?php
                        if ($sno == $row['uid']) {
                            echo 'leaveword.php';
                        } else {
                            echo 'leaveword_other.php';
                        }
                        ?>?uid=<?php echo $row['uid']; ?>&id=<?php echo $id ?>"><img src="<?php echo $row["image"]; ?>"
                                                                                     width="100px" height="100px" style="border-radius: 100px"/></a>
                    </div>
                    <div style="padding-top: 0px">
                        <table style="border-collapse:separate; border-spacing:0px 10px;">
                            <tr>
                                <td><h5><?php echo $i . '楼：'; ?></h5></td>
                                <td><h5><?php echo $row["name"]; ?></h5></td>
                            </tr>
                            <br>
                            <tr>
                                <td><h5>回复时间：</h5></td>
                                <td><h5><?php echo $row["ctime"]; ?></h5></td>
                            </tr>
                        </table>
                    </div>
<!--                    <script>-->
<!--                        function disfun() {-->
<!--                            var dis = document.getElementById("dis");-->
<!--                            if (dis.style.display == "none") {-->
<!--                                dis.style.display ="block";-->
<!--                            }else-->
<!--                            {-->
<!--                                dis.style.display = "none";-->
<!--                            }-->
<!--                        }-->
<!--                    </script>-->
<!--                    <div onclick="disfun()">隐藏</div>-->
                    <div id="dis" style="padding-top: 10px;border-top:3px solid #ddd;">
                        <form action="newsAction.php?receive_id=<?php echo $row['uid'] ?>&send_id=<?php echo $_SESSION['sno'] ?>&send_name=<?php echo $_SESSION['username'] ?>"
                              enctype="multipart/form-data" method="post">
                            <th><input type="hidden" name="a_id" value="<?php echo $a_id ?>"/></th>
                            <div>
                                <div style="padding-top: 10px">
                                    <input type="text" name="titlenews" style="border-radius: 5px;width: 90%;height: 8%"
                                           placeholder="请输入私信标题">
                                </div>
                                <div style="padding-top: 10px">
                                    <textarea name="txtnews" style="border-radius:10px;width:90%;height:20%"
                                              placeholder="请输入私信内容"></textarea>
                                </div>

                                <div style="padding-top: 10px">
                                    <button type="submit"
                                            style="height: 10%;width: 40%;background-color:#2eaaf5;padding: 10px 10px;border-radius: 5px; border: 1px  #555 solid; color: #333"
                                            value="发送"><span><h5>发送</h5></span></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div style="height:400px">
                    <div style="float: right;width:77%;height: 40%;border-radius: 10px;background-color:  #ffffff;padding:10px;word-break: break-all;overflow-y:auto">
                        <p><h4><?php echo $row['comment']; ?></h4></p>
                    </div>
                    <form action="applyInfoAction.php?fid=<?php echo $row['uid'] ?>&rid=<?php echo $_SESSION['sno'] ?>&name=<?php echo $_SESSION['username'] ?>&id=<?php echo $row['id'] ?>"
                          enctype="multipart/form-data" method="POST">
                        <th><input type="hidden" name="a_id" value="<?php echo $a_id ?>"/></th>
                        <div style="float: right;width:77%;height: 60%;border-radius: 10px;background-color:  #ffffff;padding:5px;word-break: break-all;border-top:3px solid #ddd;border-bottom:6px solid #ddd">
                            <div style="float: left;width:60%;margin:3%;height:150px;overflow-y:auto">
                                <table>
                                    <tr>
                                        <td>
                                            <?php foreach ($arr as $r) { ?>
                                                <?php if ($r['fid'] == $row['uid'] && $row['id'] == $r['replyid']) { ?>
                                                    <?php ?>
                                                    <?php echo $r['name'] . "：" . $r['reply']; ?><br>
                                                <?php } ?>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div style="float: right;width:20%;margin: 5%;height: 80%">
                                <textarea name="rinfo"
                                          style="width: 100%;height:40%;border-radius:10px;margin-bottom: 10px"></textarea>
                                <div style="float: right">
                                    <button type="submit"
                                            style="height: 20%;width: 100%;background-color:#2eaaf5;padding: 10px 10px;border-radius: 5px; border: 1px  #555 solid; color: #333"
                                            value="回复"><span><h5>回复</h5></span></button>
                                </div>
                            </div>
                        </div>
                </div>
                </form>
            </div>


            <?php ++$i; ?>
        <?php } ?>


        <form action="applyAction.php?ac_id=<?php echo $id ?>" enctype="multipart/form-data" method="POST">
            <div style="width:100%">
                <div style="float: right;width:77%;min-height: 200px;background-color:  #ffffff;padding: 20px;margin-top: 50px;border-radius: 10px;">
                    <div style="margin-bottom: 20px">
                        <textarea name="comment" style="width: 100%;min-height: 100px;border-radius:10px"></textarea>
                    </div>
                    <div style="float: right">
                        <button style="height: 5%;width: 100%;background-color:#2eaaf5;padding: 10px 10px;border-radius: 5px; border: 1px  #555 solid; color: #333"
                                value="评论"><span><h5>跟帖</h5></button>
                    </div>
                </div>
            </div>
        </form>


    </div>
</div>


<!-- footer start here -->
<div class="footer-agile">
    <div class="container">
        <div class="footer-agileinfo">
            <div class="col-md-5 col-sm-5 footer-wthree-grid">
                <div class="agileits-w3layouts-tweets">
                    <h5><a href="homepage.php"><i class="fa fa-pagelines" aria-hidden="true"></i>赛事</a></h5>
                </div>
                <p>app创意中心现隶属于计算机与软件工程学院，是学院“双创”实验室中心重要组成实验室之一。
                    旨在为学生提供一个基于互联网产品进行创新创意的一个学习交流和团队研发环境</p>
            </div>
            <div class="col-md-3 col-sm-3 footer-wthree-grid">
                <h3>快速连接</h3>
                <ul>
                    <li><a href="homepage.php"><span class="glyphicon glyphicon-menu-right"></span> 首页</a></li>
                    <li><a href="gallery.php"><span class="glyphicon glyphicon-menu-right"></span> 校园趣事</a></li>
                    <li><a href="codes.php"><span class="glyphicon glyphicon-menu-right"></span>校园赛事</a></li>
                    <li><a href="link.php"><span class="glyphicon glyphicon-menu-right"></span> 报名入口</a></li>
                    <li><a href="contact.php"><span class="glyphicon glyphicon-menu-right"></span> 个人中心</a></li>
                </ul>
            </div>
            <div class="col-md-4 col-sm-4 footer-wthree-grid">
                <h3>联系我们</h3>
                <ul>
                    <li>Phone: +15956163907</li>
                    <li><a href="mailto:info@example.com"> 123 @qq.com</a></li>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="copy-right">
            <p>App &copy; 2019.创意实验室 <a href="#" target="_blank" title="App创意实验室">App创意实验室</a></p>
        </div>
    </div>
</div>
<!-- //footer end here -->
<!-- FlexSlider -->
<script defer src="js/jquery.flexslider.js"></script>
<script type="text/javascript">
    $(window).load(function () {
        $('.flexslider').flexslider({
            animation: "slide",
            start: function (slider) {
                $('body').removeClass('loading');
            }
        });
    });
</script>
<!-- End-slider-script -->
<!-- Flexslider-js for-testimonials -->
<script type="text/javascript">
    $(window).load(function () {
        $("#flexiselDemo1").flexisel({
            visibleItems: 1,
            animationSpeed: 1000,
            autoPlay: true,
            autoPlaySpeed: 3000,
            pauseOnHover: true,
            enableResponsiveBreakpoints: true,
            responsiveBreakpoints: {
                portrait: {
                    changePoint: 480,
                    visibleItems: 1
                },
                landscape: {
                    changePoint: 640,
                    visibleItems: 1
                },
                tablet: {
                    changePoint: 768,
                    visibleItems: 1
                }
            }
        });

    });
</script>
<script type="text/javascript" src="js/jquery.flexisel.js"></script>
<!-- //Flexslider-js for-testimonials -->


<!-- start-smooth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function ($) {
        $(".scroll").click(function (event) {
            event.preventDefault();
            $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1000);
        });
    });
</script>
<!-- //end-smooth-scrolling   -->
<!-- smooth-scrolling-of-move-up -->
<script type="text/javascript">
    $(document).ready(function () {

        $().UItoTop({easingType: 'easeOutQuart'});

    });
</script>
<script src="js/bootstrap.js"></script>
</body>
</html>