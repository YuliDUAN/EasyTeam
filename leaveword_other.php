<?php
session_start();
include "MySqlConnect.php";
$sno = $_SESSION['sno'];
$_SESSION['uid'] = $_GET['uid'];
$uid = $_SESSION['uid'];
$id = $_GET['id'];
$arr = array('sno' => $sno, 'uid' => $uid);
$rsq = "select * from ruser where sno=$sno";
$result = $conn->query($rsq);
$row = mysqli_fetch_array($result);
$sql = "select * from ruser where sno = $uid";
$resultuid = $conn->query($sql);
$rowuid = mysqli_fetch_array($resultuid);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="images/logo.ico">
    <title>留言板块</title>
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
            <div class="center_droc">
                <form enctype="multipart/form-data" method="post" action="contactImageAction.php">
                    <img style="width: 120px;height: 120px" src="<?php
                    if ($sno == $uid) {
                        echo $row['image'];
                    } else {
                        echo $rowuid['image'];
                    }
                    ?>">
                    <?php
                    if ($sno == $uid) {
                        echo '<';
                        echo 'label for="file"';
                        echo '>';
                        echo '<';
                        echo 'input type="button" id="btn" value="修改头像>>>"';
                        echo '>';
                        echo '<';
                        echo 'span id="text"';
                        echo '>';
                        echo '</';
                        echo 'span';
                        echo '>';
                        echo '<';
                        echo 'input type="file" name="avatar" id="file" onchange="verificationPicFile(this)"';
                        echo '>';
                        echo '</';
                        echo 'label';
                        echo '>';
                        echo '<';
                        echo 'li';
                        echo '>';
                        echo '<';
                        echo 'a href="contact.php"><button id="btn"  style="width: 97.7px"';
                        echo '>';
                        echo '<';
                        echo 'span';
                        echo '>';
                        echo '确定修改';
                        echo '</';
                        echo 'span';
                        echo '></';
                        echo 'button';
                        echo '></';
                        echo 'a';
                        echo '></';
                        echo 'li';
                        echo '>';
                    }
                    ?>


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
                <li><span class="glyphicon glyphicon-home" aria-hidden="true"></span> 昵 称：<?php
                    if ($sno == $uid) {
                        echo $row['username'];
                    } else {
                        echo $rowuid['username'];
                    } ?></li>
                <li><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> 等 级：4 级</li>
            </div>
            <div class="left-agileits">
                <table>
                    <tr>
                        <td><img class="tubiao" src="images/news.png"></td>
                        <td style="padding-left: 15px ;padding-top: 25px">
                            <span>
                                    <h4 style="color: #bababa"> 消 息</h4>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td><img class="tubiao" src="images/rudui.png"></td>
                        <td style="padding-left: 15px;padding-top: 25px">
                            <span>
                                    <h4 style="color: #bababa"> 入 队 申 请 </h4>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td><img class="tubiao" src="images/personal.png"></td>
                        <td style="padding-left: 15px;padding-top: 25px"><span><a href="
                        <?php
                                if ($sno == $uid) {
                                    echo "contact.php";
                                } else {
                                    echo "contact_other.php";
                                }
                                ?>?uid=<?php echo $uid ?>&id=<?php echo $id ?>"> <h4> 个 人 信 息 </h4> </a></span></td>
                    </tr>
                    <tr>
                        <td><img class="tubiao" src="images/match.png"></td>
                        <td style="padding-left: 15px ;padding-top: 25px">
                            <span>
                                 <h4 style="color: #bababa"> 我 的 比 赛 </h4>
                            </span></td>
                    </tr>
                    <tr>
                        <td><img class="tubiao" src="images/team.png"></td>
                        <td style="padding-left: 15px ;padding-top: 25px"><span>
                                <h4 style="color: #bababa"> 我 的 队 伍 </h4>
                            </span></td>
                    </tr>
                    <tr>
                        <td><img class="tubiao" src="images/evaluate.png"></td>
                        <td style="padding-left: 15px ;padding-top: 25px"><span><a href="
                         <?php
                                if ($sno == $uid) {
                                    echo "leaveword.php";
                                } else {
                                    echo "leaveword_other.php";
                                }
                                ?>?uid=<?php echo $uid; ?>&id=<?php echo $id ?>"><h4> 留 言 版 块 </h4></a></span></td>
                    </tr>
                    <tr>
                        <td><img class="tubiao" src="images/collection.png"></td>
                        <td style="padding-left: 15px ;padding-top: 25px"><span> <h4
                                        style="color: #bababa"> 我 的 收 藏 </h4></span></td>
                    </tr>
                    <tr>
                        <td><img class="tubiao" src="images/question.png"></td>
                        <td style="padding-left: 15px ;padding-top: 25px"><span> <h4
                                        style="color: #bababa"> 问 题 反 馈 </h4></span></td>
                    </tr>
                    <tr>
                        <td style="padding-bottom: 20px"><img class="tubiao" src="images/quit.png"></td>
                        <td style="padding-left: 15px ;padding-top: 25px;padding-bottom: 20px">
                            <?php
                            if ($sno == $uid) {
                                echo '<' . 'span onclick="exit()"' . '><' . 'a' . '><' . 'h4' . '>';
                                if ($sno == $uid) {
                                    echo '退 出';
                                } else {
                                    echo '返回';
                                }
                                echo '</' . 'h4' . '></' . 'a' . '>';
                                echo '</' . 'span' . '>';
                            } else {
                                ?>
                                <?php
                                echo '<' . 'a href="apply.php?id=' ?><?php echo $id ?><?php echo '"' . '><' . 'h4' . '>'; ?>
                                <?php
                                if ($sno == $uid) {
                                    echo "退 出";
                                } else {
                                    echo "返回";
                                }
                                echo '</' . 'h4' . '>';
                                echo '</' . 'a' . '>';
                            }
                            ?>

                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="agileits_mail_grids">
            <div class="col-md-7 agileits_mail_grid_left">
                <div style=" margin-top:40px;padding:20px;background-color: #ffffff;border-radius: 10px;overflow-y:auto">
                    <form action="leaveword_otherAction.php?uid=<?php echo $uid; ?>&sno=<?php echo $sno; ?>&id=<?php echo $id ?>"
                          enctype="multipart/form-data" method="post">
                        <textarea name="leaveText" id="leaveText" placeholder="请输入留言内容..."></textarea>
                        <button id="btn" class="reply_confirm">确定</button>
                    </form>
                </div>
                <?php
                $sql = "select * from lvmessage,ruser where lmsno = $uid and sno=selfsno";
                $resultlu = $conn->query($sql);
                $arr = array();
                while ($rowlu = mysqli_fetch_array($resultlu)) {
                    array_push($arr, $rowlu);
                }
                ?>
                <?php foreach ($arr as $r) { ?>
                        <div style="width:24%;height:170px;padding: 10px;margin-top:30px;border-radius:10px;float:left;background-color: #ffffff">
                            <div style="margin-bottom: 15px" align="center">
                                <img src="<?php echo $r['image'];?>" width="60" height="60"/>
                            </div>
                            <div>
                                <p><h5>留言人：</h5></p>
                                <p><h5 align="center"><?php echo $r['username'];?></h5></p>
                                <p><h5>时间：</h5></p>
                                <p><h5 align="center"><?php echo $r['lmtime'];?></h5></p>
                            </div>
                        </div>
                        <div style="width:74%;height:170px;padding: 20px;margin-top:30px;float: right;background-color: #ffffff;border-radius: 10px;word-break: break-all;overflow-y:auto">
                            <h4><?php echo $r['lmessage'];?></h4>
                        </div>
                <?php } ?>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- bootstrap-pop-up -->
<div class="modal video-modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <i class="fa fa-pagelines" aria-hidden="true"></i>APP创意设计大赛
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
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
<script src="js/bootstrap.js"></script>
</body>
</html>