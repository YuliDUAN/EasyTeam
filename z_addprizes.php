<?php
$id = $_GET["id"];
include "z_mysql.php";
$sql = "SELECT name FROM activity where id='$id'";
$result = $conn->query($sql);
$row = mysqli_fetch_array($result);
?>
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
<div class="panel admin-panel">
    <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>添加或修改<?php echo $row[0] ?>
            获奖信息</strong></div>
    <div class="body-content">
        <form method="post" class="form-x" action="z_addprizesAction.php?id=<?php echo $id ?>">
            <div class="form-group">
                <div class="label">
                    <label>获奖队伍名称：</label>
                </div>
                <div class="field">
                    <input type="text" class="input w50" value="" name="team_name" maxlength="40"
                           data-validate="required:请输入获奖队伍名称"/>
                    <div class="tips"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>队长：</label>
                </div>
                <div class="field">
                    <input type="text" class="input w50" value="" name="team_cap" maxlength="20"
                           data-validate="required:请输入队长名称"/>
                    <div class="tips"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>获奖队伍名称：</label>
                </div>
                <div class="label" style="width: auto">
                    <table>
                        <tr>
                            <td><input type="radio" name="team_prize" value="0" checked="checked"/>未获奖</td>
                            <td><input type="radio" name="team_prize" value="1"/>优胜奖</td>
                            <td><input type="radio" name="team_prize" value="2"/>三等奖</td>
                            <td><input type="radio" name="team_prize" value="3"/>二等奖</td>
                            <td><input type="radio" name="team_prize" value="4"/>一等奖</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="clear"></div>
            <div class="form-group">
                <div class="label">
                    <label></label>
                </div>
                <div class="field">
                    <button class="button bg-main icon-check-square-o" type="submit"> 提交</button>
                </div>
            </div>
        </form>
    </div>
</div>

</body>
</html>