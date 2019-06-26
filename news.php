<?php
session_start();
include "MySqlConnect.php";
$s_id = $_SESSION['sno'];
$sql = "select * from sendnews where receive_id = $s_id";
$result = $conn->query($sql);
$receive_news = array();
while($row = mysqli_fetch_array($result)){
array_push($receive_news,$row);
}
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH'])){
$x = $_GET['content'];
echo $x;
$sql = "select * from sendnews where id=$x";
$result = $conn->query($sql);
$values = array();
while ($row = mysqli_fetch_array($result)){
$values = $row;
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="images/logo.ico">
    <title>消息</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- Custom Theme files -->
    <link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
    <link href="css/style.css" type="text/css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="all" property="" />
    <!-- //Custom Theme files -->
    <!-- font-awesome icons -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <!-- //font-awesome icons -->
    <!-- js -->
    <script src="js/jquery-2.2.3.min.js"></script>
    <!-- //js -->
    <!-- web-fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <!-- //web-fonts -->
</head>
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
                        <li><a href="gallery.html" class="btn w3ls-hover">校园趣事</a></li>
                        <li><a href="#" class="dropdown-toggle btn w3ls-hover" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">校园赛事 <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="icons.php">正在进行</a></li>
                                <li><a href="codes.html">已经结束</a></li>
                            </ul>
                        </li>
                        <li><a href="link.html" class="btn w3ls-hover">报名入口</a></li>
                        <li><a href="contact.php" class="w3ls-hover active">个人中心</a></li>
                    </ul>
                    <div class="clearfix"> </div>
                </div><!-- //navbar-collapse -->
            </div><!-- //container-fluid -->
        </nav>
    </div><!-- //header -->

</div>

<script language="javascript">
    function exit() {
        var se=confirm("确定退出吗？");
        if (se==true) {
            location.href="index.html";
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
            <div class="center_droc">
                <img src="images/toxaing.png">
                <li><a style="margin-top: 5px" href="#">修改头像>>></a></li>
                <li><span style="margin-top: 5px" class="glyphicon glyphicon-home" aria-hidden="true"></span> 昵 称：康 少</li>
                <li><span style="margin-top: 5px" class="glyphicon glyphicon-envelope" aria-hidden="true"></span> 等 级：4 级</li>
            </div>
            <div class="left-agileits">
                <table>
                    <tr >
                        <td><img class="tubiao" src="images/news.png"></td>
                        <td style="padding-left: 15px ;padding-top: 25px"><span><a href="news.php"><h4> 消 息</h4></a></span></td>
                    </tr>
                    <tr >
                        <td><img class="tubiao" src="images/rudui.png"></td>
                        <td style="padding-left: 15px;padding-top: 25px"><span><a href="teamApply.html"><h4> 入 队 申 请 </h4> </a></span></td>
                    </tr>
                    <tr >
                        <td><img class="tubiao" src="images/personal.png"></td>
                        <td style="padding-left: 15px;padding-top: 25px"><span><a href="contact.php"><h4> 个 人 信 息 </h4> </a></span></td>
                    </tr>
                    <tr >
                        <td><img class="tubiao" src="images/match.png"></td>
                        <td style="padding-left: 15px ;padding-top: 25px"><span><a href="myjgames.html"> <h4> 我 的 比 赛 </h4></a></span></td>
                    </tr>
                    <tr >
                        <td><img class="tubiao" src="images/team.png"></td>
                        <td style="padding-left: 15px ;padding-top: 25px"><span><a href="team.html"> <h4> 我 的 队 伍 </h4></a></span></td>
                    </tr>
                    <tr>
                        <td><img class="tubiao" src="images/evaluate.png"></td>
                        <td style="padding-left: 15px ;padding-top: 25px"><span><a
                                href="leaveword.html"><h4> 留 言 版 块 </h4></a></span></td>
                    </tr>
                    <tr>
                        <td><img class="tubiao" src="images/collection.png"></td>
                        <td style="padding-left: 15px ;padding-top: 25px"><span><a
                                href="collect.html"> <h4> 我 的 收 藏 </h4></a></span></td>
                    </tr>
                    <tr>
                        <td><img class="tubiao" src="images/question.png"></td>
                        <td style="padding-left: 15px ;padding-top: 25px"><span><a
                                href="question.html"> <h4> 问 题 反 馈 </h4></a></span></td>
                    </tr>
                    <tr >
                        <td style="padding-bottom: 20px"><img class="tubiao" src="images/quit.png"></td>
                        <td style="padding-left: 15px ;padding-top: 25px;padding-bottom: 20px">
                            <span onclick="exit()"><a><h4> 退 出 </h4></a></span></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="agileits_mail_grids">
            <div class="col-md-7 agileits_mail_grid_left" style="background-color: #ffffff">
                <table class="table">
                    <tbody>
                    <tr>
                        <th width="15%"><font size="4" color="black">来源</font></th>
                        <th width="40%"><font size="4" color="black">标题</font></th>
                        <th width="20%"><font size="4" color="black">时间</font></th>
                        <th width="20%"><font size="4" color="black">详情</font></th>
                    </tr>
                    <?php foreach($receive_news as $v){?>
                    <tr>
                        <td><font size="3"><?php echo $v['send_name'];?></font></td>
                        <td><font size="3"><?php echo $v['titlenews'];?></font></td>
                        <td><font size="3"><?php echo $v['send_time'];?></font></td>
                        <td><font size="3">
                            <form action="">
                                <!--                                    data-target="#myModal"-->
                                <a href="#" onclick="show(this)" data-toggle="modal" data-target="#myModal" data-type="<?php echo $v['id'];?>">查看详情</a>
                            </form>
                        </font></td>
                    </tr>
                    <?php }?>
                    </tbody>
                </table>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>

<script src="./js/jquery-2.2.3.min.js"></script>
<script src="./js/jquery.flexisel.js"></script>
<script src="./js/jquery.flexslider.js"></script>
<script>
    function show(news) {
        var animalType = news.getAttribute("data-type");
        $.get("sendnewsAction.php", { 'content': animalType},
            function(data){
                alert("消息：\n"+data)
            });
    }
</script>
<!-- bootstrap-pop-up -->
<!--<!-- bootstrap-pop-up -->-->
<!--<div class="modal video-modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">-->
<!--    <div class="modal-dialog" role="document">-->
<!--        <div class="modal-content">-->
<!--            <div class="modal-header">-->
<!--                <i class="fa fa-pagelines" aria-hidden="true"></i>--><?php //echo $v['titlenews'];?><!--.-->
<!--                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->
<!--            </div>-->
<!--            <section>-->
<!--                <div class="modal-body">-->
<!--<!--                    -->--><?php ////echo $_GET['news_id'];?>
<!--                    <p>--><?php //echo $v['txtnews'];?><!--<i>--><?php //echo $v['send_name'];?><!--</i></p>-->
<!--                </div>-->
<!--            </section>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!--<!-- //contact -->-->
<!-- //contact -->
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
                    <li><a href="gallery.html"><span class="glyphicon glyphicon-menu-right"></span> 校园趣事</a></li>
                    <li><a href="codes.html"><span class="glyphicon glyphicon-menu-right"></span>校园赛事</a></li>
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
            <div class="clearfix"> </div>
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
    $(window).load(function(){
        $('.flexslider').flexslider({
            animation: "slide",
            start: function(slider){
                $('body').removeClass('loading');
            }
        });
    });
</script>
<!-- End-slider-script -->
<!-- Flexslider-js for-testimonials -->
<script type="text/javascript">
    $(window).load(function() {
        $("#flexiselDemo1").flexisel({
            visibleItems:1,
            animationSpeed: 1000,
            autoPlay: true,
            autoPlaySpeed: 3000,
            pauseOnHover: true,
            enableResponsiveBreakpoints: true,
            responsiveBreakpoints: {
                portrait: {
                    changePoint:480,
                    visibleItems: 1
                },
                landscape: {
                    changePoint:640,
                    visibleItems:1
                },
                tablet: {
                    changePoint:768,
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
    jQuery(document).ready(function($) {
        $(".scroll").click(function(event){
            event.preventDefault();

            $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
        });
    });
</script>
<!-- //end-smooth-scrolling   -->
<!-- smooth-scrolling-of-move-up -->
<script type="text/javascript">
    $(document).ready(function() {


        $().UItoTop({ easingType: 'easeOutQuart' });

    });
</script>
<script src="js/bootstrap.js"></script>
</body>
</html>