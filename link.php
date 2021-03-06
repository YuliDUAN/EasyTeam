<?php
include "MySqlConnect.php";
include "stateAction.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>报名入口</title>
    <link rel="shortcut icon" href="images/logo.ico">
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
    <script src="lib/modernizr/modernizr-custom.js"></script>
    <!--<script src="../lib/html5shiv/html5shiv.js"></script>-->

    <!-- Load jQuery -->
    <script src="lib/jquery/jquery.js"></script>

    <!-- Load miSlider -->
    <link href="css/mislider.css" rel="stylesheet">
    <link href="css/mislider-skin-cameo.css" rel="stylesheet">
    <script src="js/mislider.js"></script>
    <script>
        jQuery(function ($) {
            var slider = $('.mis-stage').miSlider({
                //  The height of the stage in px. Options: false or positive integer. false = height is calculated using maximum slide heights. Default: false
                stageHeight: 380,
                //  Number of slides visible at one time. Options: false or positive integer. false = Fit as many as possible.  Default: 1
                slidesOnStage: false,
                //  The location of the current slide on the stage. Options: 'left', 'right', 'center'. Defualt: 'left'
                slidePosition: 'center',
                //  The slide to start on. Options: 'beg', 'mid', 'end' or slide number starting at 1 - '1','2','3', etc. Defualt: 'beg'
                slideStart: 'mid',
                //  The relative percentage scaling factor of the current slide - other slides are scaled down. Options: positive number 100 or higher. 100 = No scaling. Defualt: 100
                slideScaling: 150,
                //  The vertical offset of the slide center as a percentage of slide height. Options:  positive or negative number. Neg value = up. Pos value = down. 0 = No offset. Default: 0
                offsetV: -5,
                //  Center slide contents vertically - Boolean. Default: false
                centerV: true,
                //  Opacity of the prev and next button navigation when not transitioning. Options: Number between 0 and 1. 0 (transparent) - 1 (opaque). Default: .5
                navButtonsOpacity: 1
            });
        });
    </script>
    <!-- Apply other styles -->
    <link href='http://fonts.useso.com/css?family=Roboto+Condensed:400|Roboto:500' rel='stylesheet'>
    <link href="css/styles.css" rel="stylesheet">
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
                        <li><a href="link.php" class="w3ls-hover active">报名入口</a></li>
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

<div class="main-textgrids">
    <div class="container">
        <div class="w3ls-heading">
            <h2 class="h-two">指导教师</h2>
            <p class="sub two">I n s t r u c t o r</p>
        </div>
    </div>
</div>
<div id="wrapper">
    <figure>
        <div class="mis-stage" style="border-radius: 50px">
            <!-- The element to select and apply miSlider to - the class is optional -->
            <ol class="mis-slider">
                <!-- The slider element - the class is optional -->

                <li class="mis-slide">
                    <a href="#" class="mis-container">
                        <figure>
                            <img src="images/zhangsongyun.jpg" alt="Pond with Lillies">
                            <figcaption>张松云</br>科大讯飞双师</figcaption>
                        </figure>
                    </a>
                </li>
                <li class="mis-slide">
                    <a href="#" class="mis-container">
                        <figure>
                            <img src="images/wujinhua.jpg" alt="Hidden Pond">
                            <figcaption>吴锦华</br>计算机与软件工程学院教学主管</figcaption>
                        </figure>
                    </a>
                </li>
                <li class="mis-slide">
                    <a href="#" class="mis-container">
                        <figure>
                            <img src="images/daiping.jpg" alt="Shrine">
                            <figcaption>戴平</br>计算机与软件工程学院副院长</figcaption>
                        </figure>
                    </a>
                </li>
                <li class="mis-slide">
                    <a href="#" class="mis-container">
                        <figure>
                            <img src="images/chenyuedong.JPG" alt="Shrine">
                            <figcaption>陈跃东</br>安徽省教学名师、副校长</figcaption>
                        </figure>
                    </a>
                </li>
                <li class="mis-slide">
                    <a href="#" class="mis-container">
                        <figure>
                            <img src="images/liuqingfeng.jpg" alt="White Water Lillies">
                            <figcaption>刘庆峰</br>国家级科技奖获得者</figcaption>
                        </figure>
                    </a>
                </li>
                <li class="mis-slide">
                    <a href="#" class="mis-container">
                        <figure>
                            <img src="images/wumin.jpg" alt="Garden Walkway">
                            <figcaption>吴敏</br>安徽信息工程学院校长、党委副书记</figcaption>
                        </figure>
                    </a>
                </li>
                <li class="mis-slide">
                    <a href="#" class="mis-container">
                        <figure>
                            <img src="images/zhoumingzheng.jpg" alt="Lilly with Bee">
                            <figcaption>周鸣争</br>计算机与软件工程学院执行院长</figcaption>
                        </figure>
                    </a>
                </li>
                <li class="mis-slide">
                    <a href="#" class="mis-container">
                        <figure>
                            <img src="images/gaochao.JPG" alt="Lilly with Bee">
                            <figcaption>高超</br>计算机基础教研室副主任</figcaption>
                        </figure>
                    </a>
                </li>
                <li class="mis-slide">
                    <a href="#" class="mis-container">
                        <figure>
                            <img src="images/wanjiashan.JPG" alt="Pond with Lillies">
                            <figcaption>万家山</br>计算机与软件工程学院院长助理</figcaption>
                        </figure>
                    </a>
                </li>
            </ol>
        </div>
    </figure>
</div>
<!-- //banner -->
<!-- about -->
<!-- main-textgrids -->
<div class="main-textgrids">
    <div class="container">
        <div class="w3ls-heading">
            <h2 class="h-two">相关网站与链接</h2>
            <p class="sub two">Relevant Websites and Links</p>
        </div>
        <div class="statements" style="margin-bottom: 70px;padding-bottom:30px;border-bottom:5px solid #ddd">
            <div class="col-md-5 ab-pic">
                <img src="images/dachuang.png" alt=" "/>
            </div>
            <div class="col-md-7">
                <p>
                <h3><b>全国大学生创业服务网</b></h3></p>
                <p><font size="4" color="black">全国大学生创业服务网于2011年3月29日，由前中共中央政治局常委、十二届全国政协主席俞正声，前中央政治局委员，国务院副总理刘延东共同开通，在教育部高校学生司的指导下，由全国高等学校学生信息咨询与就业指导中心负责网站具体运营。
                    全国大学生创业服务网致力于打造“互联网+”大赛支持、创业项目对接、创业培训实训、政策典型宣传、创业专业咨询五大功能的大学生创业服务平台。</font></p>
                <p style="text-align: right"><a href="https://cy.ncss.cn/" target="_blank"><h4>点此进入&#x3e;&#x3e;</h4></a>
                </p>
            </div>
            <div class="clearfix"></div>
        </div>

        <div class="statements" style="margin-bottom: 70px;padding-bottom:30px;border-bottom:5px solid #ddd">
            <div class="col-md-7">
                <p>
                <h3><b>全国大学生挑战杯官网</b></h3></p>
                <p><font size="4" color="black">挑战杯大学生创业大赛每届由一所高校主办，以“电子对抗系统”和“ERP管理软件”为竞赛平台，经专家评审团点评和网友投票进行综合评判，最终赛出名次。
                    全国大学生创业大赛是一项全面提升大学生创业意识、提升创业能力的综合性赛事。大赛将充分结合多种评价方法来综合考评参赛大学生的综合素质能力。</font></p>
                <p style="text-align: right"><a href="http://www.tiaozhanbei.net/" target="_blank"><h4>
                    点此进入&#x3e;&#x3e;</h4></a></p>
            </div>
            <div class="col-md-5 facts">
                <img src="images/tiaozb.jpg" alt=" "/>
            </div>
            <div class="clearfix"></div>
        </div>

        <div class="statements" style="margin-bottom: 70px;padding-bottom:30px;border-bottom:5px solid #ddd">
            <div class="col-md-5 ab-pic">
                <img src="images/rjsj.jpg" alt=" "/>
            </div>
            <div class="col-md-7 mission">
                <p>
                <h3><b>大学生软件设计大赛官网</b></h3></p>
                <p><font size="4" color="black">“中国软件杯”大学生软件设计大赛（简称“大赛”）是由工业和信息化部、教育部和江苏省人民政府共同创办的面向中国高校在校学生
                    （含高职）的纯公益性软件设计大赛。大赛自2011年启动至今已经连续成功举办的三届，第四届报名火热进行中，在政、产、学、研界均取得了良好反响，受到社会各界的广泛关注。</font></p>
                <p style="text-align: right"><a href="http://www.cnsoftbei.com/" target="_blank"><h4>
                    点此进入&#x3e;&#x3e;</h4></a></p>
            </div>
            <div class="clearfix"></div>
        </div>

        <div class="statements" style="margin-bottom: 70px;padding-bottom:30px;border-bottom:5px solid #ddd">
            <div class="col-md-7">
                <p>
                <h3><b>蓝桥杯大赛官网</b></h3></p>
                <p><font size="4" color="black">为促进软件和信息领域专业技术人才培养，提升高校毕业生的就业竞争力，由教育部就业指导中心支持，
                    工业和信息化部人才交流中心举办蓝桥杯大赛。九年来，包括北大、清华在内的超过 1200 余所院校，累计20万余名学子报名参赛，IBM、百度等知名企业全程参与，
                    成为国内始终领跑的人才培养选拔模式并获得行业深度认可的IT类科技竞赛。</font></p>
                <p style="text-align: right"><a href="http://dasai.lanqiao.cn/" target="_blank"><h4>
                    点此进入&#x3e;&#x3e;</h4></a></p>
            </div>
            <div class="col-md-5 facts">
                <img src="images/lanqb.jpg" alt=" "/>
            </div>
            <div class="clearfix"></div>
        </div>


        <div class="statements" style="margin-bottom: 70px;padding-bottom:30px;border-bottom:5px solid #ddd">
            <div class="col-md-5 ab-pic">
                <img src="images/jsjds.jpg" alt=" "/>
            </div>
            <div class="col-md-7 mission">
                <p>
                <h3><b>中国大学生计算机设计大赛官网</b></h3></p>
                <p><font size="4" color="black">根据高等学校创新能力提升计划、进一步深化高校教学改革、全面提高教学质量的精神，切实提高计算机教学质量，激励大学生学习计算机知识和技能的兴趣和潜能，
                    培养其创新创业能力及团队合作意识，运用信息技术解决实际问题的综合实践能力，以提高其综合素质，造就更多的德智体美全面发展、创新型、实用型、复合型人才，
                    教育部大学计算机课程教学指导委员会、中国大学生计算机设计大赛组织委员会决定联合主办“中国大学生计算机设计大赛”。</font></p>
                <p style="text-align: right"><a href="http://jsjds.ruc.edu.cn/" target="_blank"><h4>
                    点此进入&#x3e;&#x3e;</h4></a></p>
            </div>
            <div class="clearfix"></div>
        </div>

        <div class="statements" style="margin-bottom: 70px;padding-bottom:30px;border-bottom:5px solid #ddd">
            <div class="col-md-7 mission">
                <p>
                <h3><b>ProjectOn在线项目学习平台</b></h3></p>
                <p><font size="4" color="black">ProjectOn在线项目学习平台是由安徽信息工程学院学生开发并投入使用的线上报名平台。
                    以“学习者为中心，项目驱动式”方式展开第二课堂自主学习，为第二课堂的过程定性和定量跟踪提供有力抓手，本平台以项目为核心，
                    提供项目/创意发布、需求竞标、项目追踪、项目托管等功能。同时平台为学生提供个性化的课程学习资源、资源智能推送、互动问答功能，
                    辅助开发人员在项目实施期间学习提升，力求打造为一个综合性的能力提升平台。</font></p>
                <p style="text-align: right"><a href="http://projecton.cn/login" target="_blank"><h4>
                    点此进入&#x3e;&#x3e;</h4></a></p>
            </div>
            <div class="col-md-5 ab-pic">
                <img src="images/projecton.jpg" alt=" "/>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>

<div class="modal video-modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <i class="fa fa-pagelines" aria-hidden="true"></i>Growing
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <section>
                <div class="modal-body">
                    <img src="images/s1.jpg" alt=" " class="img-responsive"/>
                    <p>Ut enim ad minima veniam, quis nostrum
                        exercitationem ullam corporis suscipit laboriosam,
                        nisi ut aliquid ex ea commodi consequatur? Quis autem
                        vel eum iure reprehenderit qui in ea voluptate velit
                        esse quam nihil molestiae consequatur, vel illum qui
                        dolorem eum fugiat quo voluptas nulla pariatur.
                        <i>" Quis autem vel eum iure reprehenderit qui in ea voluptate velit
                            esse quam nihil molestiae consequatur.</i></p>
                </div>
            </section>
        </div>
    </div>
</div>
<!-- //bootstrap-pop-up -->
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