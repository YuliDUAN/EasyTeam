<?php
include "MySqlConnect.php";
include "stateAction.php";
$rsq = "select * from ruser where sno=$sno";
$result = $conn->query($rsq);
$row = mysqli_fetch_array($result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="images/logo.ico">
    <title>我的队伍</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords" content=""/>
    <script type="application/x-javascript"> addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        } </script>
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
    <style>
        .dialog {
            position: fixed;
            opacity: 1;
            z-index: 10000;
            left: 34%;
            right: 30%;
            top: 50%;
            margin-top: -250px;
            border-color: #b2b2b2;
            border-radius: 10px;
            overflow: hidden;
            display: none;
            background-color: #fff;

        }

        .content {
            width: 550px;
            height: 450px;
            background-color: #fff;
            overflow: hidden;
            border-radius: 10px;
        }

        .btn-close {
            cursor: pointer;
            position: absolute;
            top: -11px;
            right: 2%;
            width: 5%;
            height: 5%;
            /* border-radius: 50%; */

            padding-top: 34px;
            /* padding-right: 34px; */
            text-align: center;
            line-height: 0px;
            font-size: 32px;
            color: black;
        }

        .title {
            font-weight: normal;
            margin-top: 60px;
            font-size: 20px;
            padding-left: 6px;
        }

        .content-box {
            width: 80%;
            height: 300px;
            margin: 0 auto;
            border: 2px solid #eeeeee;
            border-radius: 10px;
        }

        .message-title {
            text-align: center;
            color: black;
        }

        .message-content {
            width: 96%;
            height: 80%;
            margin: 0 auto;
        }

        .message-sender {
            float: right;

        }


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

        .spa {
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
<body>
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
<!-- banner -->
<div class="banner-1">
    <div class="header agileinfo-header"><!-- header -->
        <nav class="navbar navbar-default">
            <div class="container">
                <div style="margin-top: 15px;position:absolute;z-index:-3;margin-left: 70%">
                    <iframe width="210px" scrolling="no" height="28" frameborder="0" sandbox="allow-scripts"
                            allowtransparency="true" src="http://i.tianqi.com/index.php?c=code&amp;
                        id=1&amp;icon=1&amp;wind=0&amp;num=1&amp;site=14">
                    </iframe>
                </div>
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
                        <li><a href="#" class="dropdown-toggle btn w3ls-hover" data-toggle="dropdown" role="button"
                               aria-haspopup="true" aria-expanded="false">校园赛事 <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="icons.php">正在进行</a></li>
                                <li><a href="codes.php">已经结束</a></li>
                            </ul>
                        </li>
                        <li><a href="link.php" class="btn w3ls-hover">报名入口</a></li>
                        <li><a href="news.php" class="w3ls-hover active">
                                <?php
                                if (!empty($news_nums)||!empty(count($arrstatic))) {
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
                    <div class="clearfix"></div>
                </div><!-- //navbar-collapse -->
            </div><!-- //container-fluid -->
        </nav>
    </div><!-- //header -->

</div>

<script language="javascript">
    function exit() {
        var se = confirm("确定退出吗？");
        if (se == true) {
            location.href = "index.html";
        }
    }
</script>
<!-- //banner -->
<!--body start here-->
<div class="mail" id="news_body">
    <div class="container">
        <div class="w3ls-heading">
            <h2 class="h-two"> 个 人 中 心 </h2>
            <p class="sub two">P e r s o n a l C e n t e r.</p>
        </div>
        <div class="col-md-5 agileits_mail_grid_right">
            <div class="center_droc" align="center">
                <form enctype="multipart/form-data" method="post" action="contactImageAction.php">
                    <label class="file">
                        <div title="点击修改头像">
                            <img style="width: 120px;height: 120px;border-radius: 100px"
                                 src="<?php echo $row['image']; ?>"><span id="text"></span>
                        </div>
                        <input type="file" name="avatar" id="file" onchange="verificationPicFile(this)">
                    </label>
                    <li><a href="contact.php">
                            <button id="btn" style="width: 97.7px"><span>确定修改</span></button>
                        </a></li>

                    <?php if (isset($message)): ?>
                        <P style="color: hotpink"><?php echo $message ?></P>
                    <?php endif ?>
                    <script language="JavaScript">
                        function verificationPicFile(file) {
                            var fileTypes = [".jpg", ".png"];
                            var filePath = file.value();
                            if (filePath) {
                                var isNext = false;
                                var fileEnd = filePath.substring(filePath.indexOf("."));
                                for (var i = 0; i < fileTypes.length; i++) {
                                    if (fileTypes[i] == fileEnd) {
                                        isNext = true;
                                        break;
                                    }
                                }
                                if (!isNext) {
                                    $GLOBALS['message'] = '不接受此类型文件，请用jpg或png格式';
                                    file.value = "";
                                    return false;
                                }
                            } else {
                                return false;
                            }
                        }

                        function verificationPicFile() {
                            var fileSize = 0;
                            var fileMaxSize = 1024;
                            var filePath = file.value;
                            if (filePath) {
                                fileSize = file.avatar[0].size;
                                var size = fileSize / 1024;
                                if (size > fileMaxSize) {
                                    $GLOBALS['message'] = '文件不能大于1M';
                                    file.value = "";
                                    return false;
                                } else if (size <= 0) {
                                    $GLOBALS['message'] = '文件不能为0M';
                                    file.value = "";
                                    return false;
                                }
                            } else {
                                return false;
                            }
                        }

                        function verificationPicFile() {
                            var filePath = file.value;
                            if (filePath) {
                                //读取图片数据
                                var filePic = file.avatar[0];
                                var reader = new FileReader();
                                reader.onload = function (e) {
                                    var data = e.target.result;

                                    var image = new Image();
                                    image.onload = function () {
                                        var width = image.width;
                                        var height = image.height;
                                        if (width == 120 | height == 120) {
                                            $GLOBALS['message'] = '尺寸符合';
                                        } else {
                                            $GLOBALS['message'] = '尺寸大小应为120*120';
                                            file.value = "";
                                            return false;
                                        }
                                    };
                                    image.src = data;

                                };
                                reader.readAsDataURL(filePic);
                            } else {
                                return false;
                            }
                        }

                    </script>
                </form>
                <li><span style="margin-top: 5px" class="glyphicon glyphicon-home" aria-hidden="true"></span> 昵
                    称：<?php echo $row['username']; ?>
                </li>
                <li><span style="margin-top: 5px" class="glyphicon glyphicon-envelope" aria-hidden="true"></span> 等 级：4
                    级
                </li>
            </div>
            <div class="left-agileits">
                <table>
                    <tr>
                        <td><img class="tubiao" src="images/news.png"></td>
                        <td style="padding-left: 15px ;padding-top: 25px"><span><a
                                        href="news.php"><h4>
                                        <?php
                                        if (!empty($news_nums)) {
                                            echo '<span class="spa">';
                                            echo count($news_nums);
                                            echo '</span>';
                                        } else {
                                            echo "";
                                        }
                                        ?>
                                        消 息</h4></a></span></td>
                    </tr>
                    <tr>
                        <td><img class="tubiao" src="images/rudui.png"></td>
                        <td style="padding-left: 15px;padding-top: 25px"><span><a href="teamApply.php"><h4>
                                        <?php
                                        if (!empty($arrstatic)) {
                                            echo '<span class="spa">';
                                            echo count($arrstatic);
                                            echo '</span>';
                                        } else {
                                            echo "";
                                        }
                                        ?>
                                        入 队 申 请 </h4> </a></span></td>
                    </tr>
                    <tr>
                        <td><img class="tubiao" src="images/personal.png"></td>
                        <td style="padding-left: 15px;padding-top: 25px"><span><a
                                        href="contact.php"> <h4> 个 人 信 息 </h4> </a></span></td>
                    </tr>
                    <tr>
                        <td><img class="tubiao" src="images/match.png"></td>
                        <td style="padding-left: 15px ;padding-top: 25px"><span><a
                                        href="myjgames.php"> <h4> 我 的 比 赛 </h4></a></span></td>
                    </tr>
                    <tr>
                        <td><img class="tubiao" src="images/team.png"></td>
                        <td style="padding-left: 15px ;padding-top: 25px"><span><a
                                        href="team.php"> <h4> 我 的 队 伍 </h4></a></span>
                        </td>
                    </tr>
                    <tr>
                        <td><img class="tubiao" src="images/evaluate.png"></td>
                        <td style="padding-left: 15px ;padding-top: 25px"><span><a
                                        href="leaveword.php"><h4> 留 言 版 块 </h4></a></span></td>
                    </tr>
                    <tr>
                        <td><img class="tubiao" src="images/collection.png"></td>
                        <td style="padding-left: 15px ;padding-top: 25px"><span><a
                                        href="collect.php"> <h4> 我 的 收 藏 </h4></a></span></td>
                    </tr>
                    <tr>
                        <td><img class="tubiao" src="images/question.png"></td>
                        <td style="padding-left: 15px ;padding-top: 25px"><span><a
                                        href="question.php"> <h4> 问 题 反 馈 </h4></a></span></td>
                    </tr>
                    <tr>
                        <td style="padding-bottom: 20px"><img class="tubiao" src="images/quit.png"></td>
                        <td style="padding-left: 15px ;padding-top: 25px;padding-bottom: 20px">
                            <span onclick="exit()"><a><h4> 退 出 </h4></a></span></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="agileits_mail_grids">
            <div class="col-md-7 agileits_mail_grid_left" style="border-radius: 10px;background-color: #ffffff">
                <table class="table" style="table-layout: fixed">
                    <tbody>
                    <tr>
                        <th class="anchorjs-icon" style="width: 20%"><font size="4" color="black">队伍名称</font></th>
                        <th class="anchorjs-icon" style="width: 30%"><font size="4" color="black">赛事名称</font></th>
                        <th class="anchorjs-icon" style="width: 20%"><font size="4" color="black">成绩</font></th>
                        <th class="anchorjs-icon" style="width: 15%"><font size="4" color="black">查看</font></th>

                        <th class="anchorjs-icon" style="width: 15%"><font size="4" color="black">操作</font></th>
                    </tr>
                    <?php
                    $sn=$row["sno"];
                    $num_rec_per_page = 8;   // 每页显示数量
                    if (isset($_GET["page"])) {
                        $page = $_GET["page"];
                    } else {
                        $page = 1;
                    };
                    $start_from = ($page - 1) * $num_rec_per_page;
                    $sql1 = "select team_name,activity.name,team_prize,activity.state,team_id,otherprize from team,activity where team.ac_id=activity.id
                  and team_id in(select distinct team_id from team where cap_sno=$sno union select distinct team_id from team_mem
                  where member_sno=$sno) LIMIT $start_from, $num_rec_per_page";
                    $result1 = $conn->query($sql1);
                    while ($rows = mysqli_fetch_array($result1)) {
                        ?>
                        <tr>
                            <td class="anchorjs-icon"><font size="4" color="black"><p style="color: black;font-size: 16px;width:100%;white-space: nowrap;display:inline-block;
                                overflow:hidden;text-overflow: ellipsis"><?php echo $rows[0] ?></p></font></td>
                            <td class="anchorjs-icon"><font size="4" color="black"><p style="color: black;font-size: 16px;width:100%;white-space: nowrap;display:inline-block;
                                overflow:hidden;text-overflow: ellipsis"><?php echo $rows[1] ?></p></font></td>
                            <td class="anchorjs-icon"><font size="4" color="black">
                                    <?php
                                    if ($rows[3] == 0) {
                                        if ($rows[2] == 0)
                                            echo "未获奖";
                                        else if ($rows[2] == 1)
                                            echo "优胜奖";
                                        else if ($rows[2] == 2)
                                            echo "三等奖";
                                        else if ($rows[2] == 3)
                                            echo "二等奖";
                                        else if ($rows[2] == 4)
                                            echo "一等奖";
                                        else if ($rows[2] == 5)
                                            echo $rows[5];
                                    } else {
                                        echo "";
                                    }

                                    ?></font></td>
                            <div class="dialog" style="width: 38%;height:69%">
                                <div class="content" style="width: 100%;height: auto">
                                    <div align="center"><img src="images/new_image1.png" style="width: 50%;height: auto"></div>

                                    <div class="btn-close"><img src="images/new_image2.png"></div>
                                    <div class="content-box" style="width: 90%;height:90%">
                                        <div style="padding-top: 15px;padding-bottom: 25px;width: 90%;height: auto"><font><h2
                                                        class="message-title"></h2></font></div>
                                        <div style="margin-left: 10px;margin-right: 10px;width:90%;height:300px;word-break: break-all;overflow-y:auto">
                                            <h4 class="message-content"></h4></div>
                                    </div>
                                </div>
                                <div style="margin-right: 40px;margin-top: 20px;width: 95%;height: 100%">
                                    <p class="message-sender"></p>
                                </div>
                            </div>


                            <td class="anchorjs-icon"><font size="4"><a  name="popBox" data-type="<?php echo $rows[4];?>" onclick="details(this)" href="#">详情</a></font></td>
                            <script>
                                function details(news) {
                                    var team_id = news.getAttribute('data-type');
                                    var dis = document.getElementById('main');

                                    $.post("team_men_infoAction.php", {'team_id': team_id},
                                        function (data) {
                                            var mes = data.split(',');
                                            console.log(mes);
                                            $('.message-title').html(mes[0]);
                                            $('.message-content').html(mes[1]);
                                            $('.dialog').fadeIn(500);
                                        });
                                }
                                //关闭弹框
                                $('.btn-close').click(function () {
                                    $('.dialog').fadeOut(300);
                                    window.location.href = "team.php"
                                });
                            </script>
                            <?php
                            $name=$row['username'];
                            $td=$rows[4];
                            $res0 = $conn->query("select team_cap from team where team_cap='$name' and team_id='$td'");
                            if($rows[3]==0){
                                if(mysqli_num_rows($res0)>0){?>
                                    <td class="anchorjs-icon"><font size="4"><a data-type="<?php echo $rows[4];?>" onclick="dissolve(this)" href="#">解散</a></font></td>
                                <?php }else{?>
                                    <td class="anchorjs-icon"><font size="4"><a>已结束</a></font></td>
                                <?php  }
                            }else{
                                if(mysqli_num_rows($res0)>0){?>
                                    <td class="anchorjs-icon"><font size="4"><a data-type="<?php echo $rows[4];?>" onclick="dissolve(this)" href="#">解散</a></font></td>
                                <?php }else{?>
                                    <td class="anchorjs-icon"><font size="4"><a href="team_memDelete.php?teamid=<?php echo $rows[4] ?>&?sno=$sn">退出</a></font></td>
                                <?php  }

                            }?>

                        </tr>
                        <?php
                    }
                    /*teamid=<?php echo $rows[4] */
                    $rs_result = $conn->query("select team_name,activity.name,team_prize from team,activity where team.ac_id=activity.id
                  and team_id in(select distinct team_id from team where cap_sno=$sno union select distinct team_id from team_mem
                  where member_sno=$sno) "); //查询数据
                    $total_records = mysqli_num_rows($rs_result);  // 统计总共的记录条数
                    $total_pages = ceil($total_records / $num_rec_per_page);  // 计算总页数
                    ?>
                    </tbody>
                </table>
            </div>
            <script>
                function dissolve(news) {
                    var t_id = news.getAttribute('data-type');
                    var se=confirm("是否解散队伍？");
                    if(se==true) {
                        $.ajax({
                            type: "POST",
                            url: "teamDelete.php",
                            data: {"teamid": t_id},
                            success: function (msg) {
                                alert('队伍解散成功！消息已发送！');
                                window.location.href = 'team.php';
                            }
                        });
                    }
                }
            </script>
            <div class="clearfix"></div>
            <div align="center">
                <tr align="center">
                    <td colspan="3">
                        <div class=class="bs-example"><a href="team.php?page=1">首页</a>
                            <?php
                            if ($total_pages == 0)
                                $total_pages = 1;
                            for ($i = 1; $i <= $total_pages; $i++) { ?>
                                <a href='team.php?page=<?php echo $i ?>'><?php echo $i ?></a>
                            <?php } ?>

                            <a href="team.php?page=<?php echo $total_pages ?>">末页</a>
                        </div>
                    </td>
                </tr>
            </div>
        </div>
    </div>
</div>
<!-- //contact -->
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
        /*
        var defaults = {
            containerID: 'toTop', // fading element id
            containerHoverID: 'toTopHover', // fading element hover id
            scrollSpeed: 1200,
            easingType: 'linear'
        };
        */

        $().UItoTop({easingType: 'easeOutQuart'});

    });
</script>
<!-- //smooth-scrolling-of-move-up -->
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/bootstrap.js"></script>
</body>
</html>