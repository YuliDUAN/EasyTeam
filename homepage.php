
<?php
include "MySqlConnect.php";
include "stateAction.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="images/logo.ico">
    <title>首页</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords" content=""/>
    <script type="application/x-javascript"> addEventListener("load",
        function () {
            setTimeout(hideURLbar, 0);
        }, false);

    function hideURLbar() {
        window.scrollTo(0, 1);
    } </script>
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
    <!-- smooth scrolling -->
    <!-- web-fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic'
          rel='stylesheet' type='text/css'>
    <!-- //web-fonts -->
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
<!-- banner -->
<div class="banner">
    <div class="header agileinfo-header"><!-- header -->
        <nav class="navbar navbar-default">
            <div class="container">
                <div style="margin-top: 15px;position:absolute;z-index:-3;margin-left: 70%" >
                    <iframe width="300" scrolling="no" height="28" frameborder="0" sandbox="allow-scripts"
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
                        <li><a href="homepage.php" class="w3ls-hover active">首页</a></li>
                        <li><a href="gallery.php" class="btn w3ls-hover">校园趣事</a></li>
                        <li><a href="#" class="dropdown-toggle btn w3ls-hover" data-toggle="dropdown" role="button"
                               aria-haspopup="true" aria-expanded="false">校园赛事<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="icons.php">正在进行</a></li>
                                <li><a href="codes.php">已经结束</a></li>
                            </ul>
                        </li>
                        <li><a href="link.php" class="btn w3ls-hover">报名入口</a></li>
                        <li><a href="contact.php" >
                                <?php
                                if (!empty($news_nums)){?>
                                    <?php
                                    echo '<'.'span class="sp"'.'>';
                                    echo count($news_nums);
                                    echo '</'.'span'.'>';
                                    ?>
                                <?php }else{?>
                                    <?php
                                    echo "";
                                    ?>
                                <?php }?>
                                个人中心</a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div><!-- //navbar-collapse -->
            </div><!-- //container-fluid -->
        </nav>
    </div><!-- //header -->
    <!-- banner-text -->
    <div class="banner-text">
        <div class="container">
            <div class="flexslider">
                <ul class="slides">
                    <li>
                        <div class="banner-w3lstext">
                            <h3>互联网+</h3>
                            <p>“互联网+”是创新2.0下的互联网发展的新业态，也是知识社会创新2.0推动下的互联网形态演进及其催生的经济社会发展新形态。</p>
                        </div>
                    </li>
                    <li>
                        <div class="banner-w3lstext">
                            <h3>创青春</h3>
                            <p>创青春是“创青春”全国大学生创业大赛的简称，是“挑战杯”中国大学生创业计划竞赛的改革提升。</p>
                        </div>
                    </li>
                    <li>
                        <div class="banner-w3lstext">
                            <h3>中国计算机设计大赛 </h3>
                            <p>“大赛”的前身是“中国大学生（文科）计算机设计大赛”，始创于2008年。“计算机设计大赛”每年举办一次，决赛时间一般在当年7月至8月。</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- //banner-text -->
</div>
<!-- //banner -->

<?php
$sql1="SELECT title,con,time,adr,image FROM lecture where state=1 and number=1";
$result = $conn->query($sql1);
$row = mysqli_fetch_array($result);
?>
<!-- welcome -->
<div class="features" style="background-color: #f5f5f5">
    <div class="container">
        <div class="w3ls-heading">
            <h2 class="h-two">我的校园我的梦</h2>
            <p class="sub two">My Campus My Dream.</p>
        </div>
        <div class="w3-agile-top-info">
            <div class="w3-welcome-grids">
                <div class="col-md-7 w3-welcome-left">
                    <h5><?php echo $row[0] ?></h5>
                    <p><?php echo $row[1] ?>
                        <span>时间：<?php echo $row[2] ?>&nbsp;地点：<?php echo $row[3] ?></span></p>
                </div>
                <div class="col-md-5 w3ls-welcome-img1">
                    <img src="<?php echo $row[4] ?>" alt="" height="250" width="500"/>
                </div>
                <div class="clearfix"></div>
            </div>
            <?php
            $sql2="SELECT title,con,time,adr,image FROM lecture where state=1 and number=2";
            $result2 = $conn->query($sql2);
            $row2 = mysqli_fetch_array($result2);
            ?>
            <div class="w3-welcome-grids w3-welcome-bottom">
                <div class="col-md-5 w3ls-welcome-img1 w3ls-welcome-img2">
                    <img src="<?php echo $row2[4] ?>" alt="" height="250" width="500"/>
                </div>
                <div class="col-md-7 w3-welcome-left">
                    <h5><?php echo $row2[0] ?></h5>
                    <p><?php echo $row2[1] ?>
                        <span>时间：<?php echo $row2[2] ?>&nbsp;地点：<?php echo $row2[3] ?></span></p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
<!-- //welcome -->
<?php
$sql_1="SELECT image,name,host FROM nova where state=1 and number=1";
$sql_2="SELECT image,name,host FROM nova where state=1 and number=2";
$sql_3="SELECT image,name,host FROM nova where state=1 and number=3";
$sql_4="SELECT image,name,host FROM nova where state=1 and number=4";
$result_1 = $conn->query($sql_1);
$result_2 = $conn->query($sql_2);
$result_3 = $conn->query($sql_3);
$result_4 = $conn->query($sql_4);
$row_1= mysqli_fetch_array($result_1);
$row_2= mysqli_fetch_array($result_2);
$row_3= mysqli_fetch_array($result_3);
$row_4= mysqli_fetch_array($result_4);
?>
<div class="team">
    <div class="container">
        <div class="w3ls-heading">
            <h3 class="h-two">赛 事 新 星</h3>
            <p class="sub two">New Stars of Competition</p>
        </div>
        <div class="agileinfo-team-grids">
            <div class="col-md-3 wthree-team-grid">
                <img src="<?php echo $row_1[0] ?>" alt="">
                <div class="wthree-team-grid-info">
                    <h4><?php echo $row_1[1] ?></h4>
                    <p><?php echo $row_1[2] ?></p>
                </div>
            </div>
            <div class="col-md-3 wthree-team-grid">
                <img src="<?php echo $row_2[0] ?>" alt="">
                <div class="wthree-team-grid-info">
                    <h4><?php echo $row_2[1] ?></h4>
                    <p><?php echo $row_2[2] ?></p>
                </div>
            </div>
            <div class="col-md-3 wthree-team-grid">
                <img src="<?php echo $row_3[0] ?>" alt="">
                <div class="wthree-team-grid-info">
                    <h4><?php echo $row_3[1] ?></h4>
                    <p><?php echo $row_3[2] ?></p>
                </div>
            </div>
            <div class="col-md-3 wthree-team-grid">
                <img src="<?php echo $row_4[0] ?>" alt="">
                <div class="wthree-team-grid-info">
                    <h4><?php echo $row_4[1] ?> </h4>
                    <p><?php echo $row_4[2] ?></p>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
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
<!-- //smooth-scrolling-of-move-up -->
<script src="js/bootstrap.js"></script>
</body>
</html>