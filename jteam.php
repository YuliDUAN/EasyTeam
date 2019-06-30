<?php
session_start();
$id = $_GET["id"];
include "MySqlConnect.php";
$sno = $_SESSION['sno'];
$sql = "select * from ruser where sno =$sno";
$resultsno = $conn->query($sql);
$row = mysqli_fetch_array($resultsno);
$arr = array();
array_push($arr,$row);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="images/logo.ico">
    <title>加入队伍</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords" content=""/>
    <script type="application/x-javascript"> addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }

        function on_Click2() {
            alert("加入成功！");
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
</head>
<body>
<!-- banner -->
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
                    <h1><a href="homepage.html"><i class="fa fa-pagelines" aria-hidden="true"></i>易组队</a></h1>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-left">
                        <li><a href="homepage.html" class="btn w3ls-hover">首页</a></li>
                        <li><a href="gallery.php" class="btn w3ls-hover">校园趣事</a></li>
                        <li><a href="#" class="dropdown-toggle w3ls-hover active" data-toggle="dropdown" role="button"
                               aria-haspopup="true" aria-expanded="false">校园赛事<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="icons.php">正在进行</a></li>
                                <li><a href="codes.php">已经结束</a></li>
                            </ul>
                        </li>
                        <li><a href="link.html" class="btn w3ls-hover">报名入口</a></li>
                        <li><a href="contact.php" class="btn w3ls-hover">个人中心</a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div><!-- //navbar-collapse -->
            </div><!-- //container-fluid -->
        </nav>
    </div><!-- //header -->

</div>
<!-- //banner -->
<!-- typography -->
<div class="typo" style="background-color: #f0f0f0">
    <div class="container">
        <div class="w3ls-heading">
            <h2 class="h-two">比赛队伍</h2>
        </div>
        <div class="grid_3 grid_4 w3layouts">
            <div>
                <div style="float: left">
                    <h3 class="hdg">加入队伍</h3>
                </div>
                <div style="float: right;margin-right: 3%">
                    <form action="searchteamAction.php?id=<?php echo "$id" ?>" method="post">
                        <input type="text" name="team_name"
                               style="width:180px;height:35px;border-radius: 15px;border:1px black solid;margin-right: 10px"
                               placeholder="&nbsp;请输入队伍名称">
                        <button style="background-color: transparent;border: transparent"><img src="images/serch.png" width=30px height=30px "/></button>
                    </form>
                </div>
            </div>
            <table class="table" style="background-color: #ffffff;border-radius: 10px">
                <tbody>
                <tr>
                    <th><font size="4" color="black">队伍名称</font></th>
                    <th><font size="4" color="black">队长</font></th>
                    <th><font size="4" color="black">联系方式</font></th>
                    <th><font size="4" color="black">队伍人数</font></th>
                    <th><font size="4" color="black">操作</font></th>
                </tr>

                <?php
                $result = $conn->query("SELECT team_id,team_name,team_cap,team_tel,cap_sno FROM activity,team where activity.id=team.ac_id and activity.id='$id'");
                $aresult = array();
                while ($rw = mysqli_fetch_array($result)) {
                    array_push($aresult,$rw);
                }
                ?>

                <?php
                foreach ($aresult as $r) {
                    ?>
                    <form action="jteamAction.php?member_sno=<?php echo $row['sno']?>&cap_sno=<?php echo $r['cap_sno'];?>&id=<?php echo $id?>" enctype="multipart/form-data" method="post">
                        <tr>
                            <td><font size="4"><?php echo $r[1] ?></font></td>
                            <td><font size="4"><?php echo $r[2] ?></font></td>
                            <td><font size="4"><?php echo $r[3] ?></font></td>
                            <td><font size="4">6</font></td>
                            <td><font size="5" color="blue"><button>
                                        <?php
                                        $cap_sno = $r['cap_sno'];
                                        $sqlstatic = "select static_join from static where membersno = $sno and capsno = $cap_sno";
                                        $resultstatic = $conn->query($sqlstatic);
                                        $rowstatic = mysqli_fetch_array($resultstatic);
                                        if ($rowstatic['static_join']==3){
                                            echo '已拒绝';
                                        }
                                        elseif ($rowstatic['static_join']==1){
                                            echo '申请中';
                                        }
                                        elseif ($rowstatic['static_join']==2){
                                            echo '已加入';
                                        }
                                        else{
                                            echo '申请加入';
                                        }
                                        ?>
                                    </button></font></td>
                        </tr>
                    </form>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
<!-- footer start here -->
<div class="footer-agile">
    <div class="container">
        <div class="footer-agileinfo">
            <div class="col-md-5 col-sm-5 footer-wthree-grid">
                <div class="agileits-w3layouts-tweets">
                    <h5><a href="homepage.html"><i class="fa fa-pagelines" aria-hidden="true"></i>赛事</a></h5>
                </div>
                <p>app创意中心现隶属于计算机与软件工程学院，是学院“双创”实验室中心重要组成实验室之一。
                    旨在为学生提供一个基于互联网产品进行创新创意的一个学习交流和团队研发环境</p>
            </div>
            <div class="col-md-3 col-sm-3 footer-wthree-grid">
                <h3>快速连接</h3>
                <ul>
                    <li><a href="homepage.html"><span class="glyphicon glyphicon-menu-right"></span> 首页</a></li>
                    <li><a href="gallery.php"><span class="glyphicon glyphicon-menu-right"></span> 校园趣事</a></li>
                    <li><a href="codes.php"><span class="glyphicon glyphicon-menu-right"></span>校园赛事</a></li>
                    <li><a href="link.html"><span class="glyphicon glyphicon-menu-right"></span> 报名入口</a></li>
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