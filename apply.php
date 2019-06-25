<?php
session_start();
include "MySqlConnect.php";
$sql = "select * from forum";
$result = $conn ->query($sql);
$arownews = array();
while($geren = mysqli_fetch_array($result)){
    array_push($arownews,$geren);
}
$i = 1;
?>
<html lang="en">
<head>
    <title>正在进行</title>
    <link rel="shortcut icon" href="images/logo.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); }
    </script>
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
    <script>function on_Clicka1() {alert("回复成功！");
        }
        function on_Clicka2() {alert("评论成功！");}</script></head>
<style>
    h4{
        font-size: 22px;
    }
    h5{
        font-size: 15px;
    }
    .chart_top{
        width: 100%;
        height: 30%;
        position: relative;
    }
    .chart_buttom{
        width: 100%;
        height: 10%;
        position: relative;
    }
</style>
<body>
<!-- banner -->
<div class="banner-1">
    <div class="header agileinfo-header"><!-- header -->
        <nav class="navbar navbar-default">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
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
                        <li><a href="#" class="dropdown-toggle w3ls-hover active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">校园赛事<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="icons.html">正在进行</a></li>
                                <li><a href="codes.html">已经结束</a></li>
                            </ul>
                        </li>
                        <li><a href="link.html" class="btn w3ls-hover">报名入口</a></li>
                        <li><a href="contact.php" class="btn w3ls-hover">个人中心</a></li>
                    </ul>
                    <div class="clearfix"> </div>
                </div><!-- //navbar-collapse -->
            </div><!-- //container-fluid -->
        </nav>
    </div><!-- //header -->

</div>
<!-- //banner -->
<!-- typography -->
<div class="typo"style="background-color: #dddddd">
    <div class="container"style="width:80%">
        <h3 class="hdg">APP创意中心宣讲会</h3>
        <div style="width:100%">
            <div style="float: left;width:20%;min-height: 500px;background-color: snow;padding: 20px">
                <div align="center">
                    <img src="images/t11.jpg"width="80"height="80"/>
                </div>
                <div style="padding-top: 20px">
                    <table style="border-collapse:separate; border-spacing:0px 10px;">
                        <tr>
                            <td><h5>发布者：</h5></td>
                            <td><h5>APP创意设计俱乐部</h5></td>
                        </tr>
                        <tr>
                            <td><h5>发布时间：</h5></td>
                            <td><h5>2019-6-1</h5></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div style="float: right;min-height: 500px;width:77%;background-color: snow;padding:60px;word-break: break-all;">
                <table style="border-collapse:separate; border-spacing:0px 15px;">
                    <tr>
                        <td style="width: 170px"><h4>比赛名称：</h4></td>
                        <td><h4>APP创意设计大赛</h4></td>
                    </tr>
                    <tr>
                        <td style="width: 150px"><h4>主题：</h4></td>
                        <td><h4>APP创意宣讲会是有APP创意设计俱乐部主办,app创意中心现隶属于计算机与软件工程学院，
                                是学院“双创”实验室中心重要组成实验室之一。APP创意宣讲会是有APP创意设计俱乐部主办,
                                app创意中心现隶属于计算机与软件工程学院，是学院“双创”实验室中心重要组成实验室之一。</h4></td>
                    </tr>
                    <tr>
                        <td style="width: 150px"><h4>人员：</h4></td>
                        <td><h4>17、18全体学生</h4></td>
                    </tr>
                    <tr>
                        <td style="width: 150px"><h4>团队人员限制：</h4></td>
                        <td><h4>6人</h4></td>
                    </tr>
                    <tr>
                        <td style="width: 150px"><h4>报名截止日期：</h4></td>
                        <td><h4>2019-6-15</h4></td>
                    </tr>
                    <tr>
                        <td style="width: 150px"><h4>奖励：</h4></td>
                        <td><h4>奖金、证书、学分</h4></td>
                    </tr>
                </table>
            </div>
        </div>

        <div>
            <table class="table"style="text-align: right">
                <tbody>
                <tr>
                    <td class="type-info"><a href="cteam.html"><font size="5">创建队伍</font></a></td>
                    <td class="type-info"><a href="jteam.html"><font size="5">加入队伍</font></a></td>
                </tr>
                </tbody>
            </table>
        </div>


        <?php foreach ($arownews as $row){?>
            <?php
            $forumid = $row['uid'];
            $sql = "select * from replys where replys.fid = $forumid";
            $replysresult = $conn ->query($sql);
            $arr = array();
            while($m = mysqli_fetch_array($replysresult)){
                array_push($arr,$m);
            }
            ?>
            <div class="modal video-modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <i class="fa fa-pagelines" aria-hidden="true"></i>APP创意设计大赛
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
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
                <div style="float: left;width:20%;min-height:400px;background-color: snow;padding: 20px;border-top:6px solid #ddd">
                    <div align="center">
                            <img src="<?php echo $row["image"];?>"width="80" height="80"/>
                    </div>
                    <div style="padding-top: 20px">
                        <table style="border-collapse:separate; border-spacing:0px 10px;">
                            <tr>
                                <td><h5><?php echo $i.'楼：';?></h5></td>
                                <td><h5><?php echo $row["name"];?></h5></td>
                            </tr>
                            <br>
                            <tr>
                                <td><h5>回复时间：</h5></td>
                                <td><h5><?php echo $row["ctime"];?></h5></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div style="float: right;width:77%;min-height: 200px;background-color: snow;padding:10px;word-break: break-all;border-top:3px solid #ddd">
                    <p><h4><?php echo $row['comment'];?></h4></p>
                </div>
                <form action="applyInfoAction.php?fid=<?php echo $row['uid']?>&rid=<?php echo $_SESSION['sno']?>&name=<?php echo $_SESSION['username']?>" enctype="multipart/form-data" method="POST">
                    <div style="float: right;width:77%;min-height: 200px;background-color: snow;padding:5px;word-break: break-all;border-top:3px solid #ddd">
                        <div style="float: left;width:70%;margin: 20px">
                            <table>
                                <tr>
                                    <td>
                                        <?php foreach($arr as $r){?>
                                            <?php if ($r['fid'] == $row['uid']){?>
                                                <?php ?>
                                                <?php echo $r['name']."：".$r['reply'];?><br>
                                            <?php }?>
                                        <?php }?>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div style="float: right;width:20%;margin: 20px">
                            <textarea name="rinfo"style="width: 100%;min-height: 100px;margin-bottom: 10px"></textarea>
                            <div style="float: right">
                                <button>回复</button>
                            </div>
                        </div>
                    </div>
            </div>
            </form>

            <form action="newsAction.php?receive_id=<?php echo $row['uid']?>&send_id=<?php echo $_SESSION['sno']?>&send_name=<?php echo $_SESSION['username']?>" enctype="multipart/form-data" method="post">
                <div>
                    <div>
                        <input type="text" name="titlenews">
                    </div>
                    <div>
                        <textarea name="txtnews"></textarea>
                    </div>

                    <div>
                        <button class="all_button" value="发送"><span><h5>发送</h5></span></button>
                    </div>
                </div>
            </form>


            <?php ++$i;?>
        <?php }?>

        <form action="applyAction.php" enctype="multipart/form-data" method="POST">
            <div style="width:100%">
                <div style="float: right;width:77%;min-height: 200px;background-color: snow;padding: 20px;margin-top: 50px">
                    <div style="margin-bottom: 20px">
                        <textarea name="comment"style="width: 100%;min-height: 100px"></textarea>
                    </div>
                    <div style="float: right">
                        <button>评论</button>
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