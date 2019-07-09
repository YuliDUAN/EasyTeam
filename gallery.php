<?php
include "MySqlConnect.php";
include "stateAction.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="images/logo.ico">
    <title>校园趣事</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
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
    <link href="css/lightcase.css" rel="stylesheet" type="text/css"/>
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
    <script type="text/javascript">
        function click() {
            alert("点击成功");
        }
    </script>
    <style>
        .gl_sm_list li .sp{
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
while($rownums = mysqli_fetch_array($resultnums)){
    array_push($news_nums,$rownums);
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
                        <li><a href="gallery.php" class="w3ls-hover active">校园趣事</a></li>
                        <li><a href="#" class="dropdown-toggle btn w3ls-hover" data-toggle="dropdown" role="button"
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
                    <div class="clearfix"></div>
                </div><!-- //navbar-collapse -->
            </div><!-- //container-fluid -->
        </nav>
    </div><!-- //header -->

</div>
<!-- //banner -->
<!-- portfolio -->
<div class="banner-bottom">
    <div class="container">
        <div class="w3ls-heading">
            <h2 class="h-two">活动快照</h2>
            <p class="sub two">Photos of various activities.</p>
        </div>
        <div class="w3ls_portfolio_grids" align="center">
            <div>
                <div class="col-md-4 agileinfo_portfolio_grid">
                    <?php
                    include "MySqlConnect.php";
                    $result1 = $conn->query("SELECT * FROM article order by ar_time desc LIMIT 0, 1");
                    $row1 = mysqli_fetch_array($result1);
                        ?>
                    <div class="w3_agile_portfolio_grid1">
                        <a href="activity.php?ar_id=<?php  echo $row1[0] ?>" class="showcase" data-rel="lightcase:myCollection:slideshow"
                           title="Competition">
                            <div class="agileits_portfolio_sub_grid agileits_w3layouts_team_grid">
                                <div class="w3layouts_port_head">
                                    <h3><?php  echo $row1[1] ?></h3>
                                </div>
                                <img src=<?php  echo $row1[2] ?> alt=" " class="img-responsive"/>
                            </div>
                        </a>
                    </div>
                    <?php
                    include "MySqlConnect.php";
                    $result2= $conn->query("SELECT * FROM article order by ar_time desc LIMIT 1, 2");
                    $row2 = mysqli_fetch_array($result2);
                    ?>
                    <div class="w3_agile_portfolio_grid1">
                        <a href="activity.php?ar_id=<?php  echo $row2[0] ?>" class="showcase" data-rel="lightcase:myCollection:slideshow"
                           title="Competition">
                            <div class="agileits_portfolio_sub_grid agileits_w3layouts_team_grid">
                                <div class="w3layouts_port_head">
                                    <h3><?php  echo $row2[1] ?></h3>
                                </div>
                                <img src=<?php  echo $row2[2] ?> alt=" " class="img-responsive"/>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-4 agileinfo_portfolio_grid">
                    <?php
                    include "MySqlConnect.php";
                    $result3= $conn->query("SELECT * FROM article order by ar_time desc LIMIT 2, 3");
                    $row3 = mysqli_fetch_array($result3);
                    ?>
                    <div class="w3_agile_portfolio_grid1">
                        <a href="activity.php?ar_id=<?php  echo $row3[0] ?>" class="showcase" data-rel="lightcase:myCollection:slideshow"
                           title="Competition">
                            <div class="agileits_portfolio_sub_grid agileits_w3layouts_team_grid">
                                <div class="w3layouts_port_head">
                                    <h3><?php  echo $row3[1] ?></h3>
                                </div>
                                <img src=<?php  echo $row3[2] ?> alt='' class="img-responsive"/>
                            </div>
                        </a>
                    </div>
                    <?php
                    include "MySqlConnect.php";
                    $result4= $conn->query("SELECT * FROM article order by ar_time desc LIMIT 3, 4");
                    $row4 = mysqli_fetch_array($result4);
                    ?>
                    <div class="w3_agile_portfolio_grid1">
                        <a href="activity.php?ar_id=<?php  echo $row4[0] ?>" class="showcase" data-rel="lightcase:myCollection:slideshow"
                           title="Competition">
                            <div class="agileits_portfolio_sub_grid agileits_w3layouts_team_grid">
                                <div class="w3layouts_port_head">
                                    <h3><?php  echo $row4[1] ?></h3>
                                </div>
                                <img src=<?php  echo $row4[2] ?> alt='' class="img-responsive"/>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-4 agileinfo_portfolio_grid">
                    <?php
                    include "MySqlConnect.php";
                    $result5= $conn->query("SELECT * FROM article order by ar_time desc LIMIT 4, 5");
                    $row5 = mysqli_fetch_array($result5);
                    ?>
                    <div class="w3_agile_portfolio_grid1">
                        <a href="activity.php?ar_id=<?php  echo $row5[0] ?>" class="showcase" data-rel="lightcase:myCollection:slideshow"
                           title="Competition">
                            <div class="agileits_portfolio_sub_grid agileits_w3layouts_team_grid">
                                <div class="w3layouts_port_head">
                                    <h3><?php  echo $row5[1] ?></h3>
                                </div>
                                <img src=<?php  echo $row5[2] ?> alt=" " class="img-responsive"/>
                            </div>
                        </a>
                    </div>
                    <?php
                    include "MySqlConnect.php";
                    $result6= $conn->query("SELECT * FROM article order by ar_time desc LIMIT 5, 6");
                    $row6 = mysqli_fetch_array($result6);
                    ?>
                    <div class="w3_agile_portfolio_grid1">
                        <a href="activity.php?ar_id=<?php  echo $row6[0] ?>" class="showcase" data-rel="lightcase:myCollection:slideshow"
                           title="Competition">
                            <div class="agileits_portfolio_sub_grid agileits_w3layouts_team_grid">
                                <div class="w3layouts_port_head">
                                    <h3><?php  echo $row6[1] ?></h3>
                                </div>
                                <img src=<?php  echo $row6[2] ?> alt=" " class="img-responsive"/>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-4 agileinfo_portfolio_grid">
                    <?php
                    include "MySqlConnect.php";
                    $result7= $conn->query("SELECT * FROM article order by ar_time desc LIMIT 6, 7");
                    $row7 = mysqli_fetch_array($result7);
                    ?>
                    <div class="w3_agile_portfolio_grid1">
                        <a href="activity.php?ar_id=<?php  echo $row7[0] ?>" class="showcase" data-rel="lightcase:myCollection:slideshow"
                           title="Competition">
                            <div class="agileits_portfolio_sub_grid agileits_w3layouts_team_grid">
                                <div class="w3layouts_port_head">
                                    <h3><?php  echo $row7[1] ?></h3>
                                </div>
                                <img src=<?php  echo $row7[2] ?> alt=" " class="img-responsive"/>
                            </div>
                        </a>
                    </div>
                    <?php
                    include "MySqlConnect.php";
                    $result8= $conn->query("SELECT * FROM article order by ar_time desc LIMIT 7, 8");
                    $row8 = mysqli_fetch_array($result8);
                    ?>
                    <div class="w3_agile_portfolio_grid1">
                        <a href="activity.php?ar_id=<?php  echo $row8[0] ?>" class="showcase" data-rel="lightcase:myCollection:slideshow"
                           title="Competition">
                            <div class="agileits_portfolio_sub_grid agileits_w3layouts_team_grid">
                                <div class="w3layouts_port_head">
                                    <h3><?php  echo $row8[1] ?></h3>
                                </div>
                                <img src=<?php  echo $row8[2] ?> alt=" " class="img-responsive"/>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div style="height: 50px"></div>
            <div class="w3ls-heading">
                <h2 class="h-two">实时新闻</h2>
                <p class="sub two">Real-time report.</p>
            </div>
            <div style="height: 50px">
            </div>

            <div class="bs-example" style="background-color: #ffffff;border-radius: 10px">
                <table class="table">
                    <tbody>
                    <?php
                    include("MySqlConnect.php");
                    $num_rec_per_page =8;   // 每页显示数量
                    if (isset($_GET["page"])) {
                        $page = $_GET["page"];
                    } else {
                        $page = 1;
                    };
                    $start_from = ($page - 1) * $num_rec_per_page;
                    $result = $conn->query("SELECT * FROM article order by ar_time desc LIMIT $start_from, $num_rec_per_page");
                    while ($row = mysqli_fetch_array($result)) {
                        ?>
                        <tr>
                            <td class="anchorjs-icon"><font size="4" color="black"><b><?php echo $row[1]?></b></font>
                                <br/><font color="#a9a9a9" size="3"><?php echo mb_substr($row[4],0,50,"utf-8");echo "..."; ?></font>
                            </td>
                            <td class="anchorjs-icon"><font size="4"><?php echo $row[5]?></font></td>
                            <td class="anchorjs-icon"><font size="4"><a href="activity.php?ar_id=<?php  echo $row[0] ?>">详情了解&#x3e;&#x3e;</a></font></td>
                        </tr>
                    <?php }
                    $rs_result = $conn->query("SELECT * FROM article"); //查询数据
                    $total_records = mysqli_num_rows($rs_result);  // 统计总共的记录条数
                    $total_pages = ceil($total_records / $num_rec_per_page);  // 计算总页数
                    mysqli_free_result($result);
                    ?>
                    <tr align="center">
                        <td colspan="3">
                            <div class=class="bs-example"><a href="gallery.php?page=1">首页</a>
                                <?php
                                if($total_pages==0)
                                    $total_pages=1;
                                for ($i = 1; $i <= $total_pages; $i++) { ?>
                                    <a href='gallery.php?page=<?php echo $i ?>'><?php echo $i ?></a>
                                <?php } ?>

                                <a href="gallery.php?page=<?php echo $total_pages ?>">末页</a>
                            </div>
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- portfolio -->
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
<!-- //smooth-scrolling-of-move-up -->
<script src="js/bootstrap.js"></script>
</body>
</html>