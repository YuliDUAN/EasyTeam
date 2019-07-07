<?php
session_start();
include "MySqlConnect.php";
$id = $_GET["id"];
$team_name=$_GET['team_name'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
</head>
<main id="main">
    <table class="table" style="background-color: #ffffff">
        <tbody>
        <tr>
            <th><font size="4" color="black">队伍名称</font></th>
            <th><font size="4" color="black">队长</font></th>
            <th><font size="4" color="black">联系方式</font></th>
            <th><font size="4" color="black">队伍人数</font></th>
            <th><font size="4" color="black">操作</font></th>
        </tr>

        <?php
        $result = $conn->query("SELECT cap_sno,team_id,team_name,team_cap,team_tel FROM activity,team where activity.id=team.ac_id and activity.id='$id' and team_name like '%$team_name%'");
        while ($row = mysqli_fetch_array($result)) {
            ?>
            <tr>
                <td><font size="4"><?php echo $row['team_name'] ?></font></td>
                <td><font size="4"><?php echo $row['team_cap'] ?></font></td>
                <td><font size="4"><?php echo $row['team_tel'] ?></font></td>
                <td><font size="4">6</font></td>
                <td><font size="4" color="black">
                        <?php
                        $member_sno = $_SESSION['sno'];
                        $cap_sno = $row['cap_sno'];
                        $tm_id = $row['team_id'];
                        ?>
                        <?php
                        $sqlstatic = "select static_join from static where membersno = '$member_sno' and capsno = '$cap_sno' and tm_id = '$tm_id'";
                        $resultstatic = $conn->query($sqlstatic);
                        $rowstatic = mysqli_fetch_array($resultstatic);
                        if ($rowstatic['static_join']==3){
                            echo '<input type="button" style="background-color: transparent;border: transparent"><a style="color: red">已拒绝</a></button>';
                        }
                        elseif ($rowstatic['static_join']==1){?>
                            <?php echo '<input type="button" style="background-color: transparent;border: transparent"><a style="color: orange">申请中...</a></input>' ?>
                            <?php echo '<a style="margin-left: 50px;color: red" href="jteamAction.php?member_sno='?><?php echo $member_sno?><?php echo '&cap_sno='?><?php echo $cap_sno?><?php echo '&id='?><?php echo $id?><?php echo '&tm_id='?><?php echo $tm_id?>
                            <?php echo '" '.'enctype="multipart/form-data" method="post">取消</a>'?>
                        <?php }
                        elseif ($rowstatic['static_join']==2){
                            echo '<input type="button" style="background-color: transparent;border: transparent"><a style="color: #66fa41">已加入</a></input>';
                        }
                        else{?>
                            <?php echo '<a style="color: #1D7AC7" href="jteamAction.php?member_sno='?><?php echo $member_sno?><?php echo '&cap_sno='?><?php echo $cap_sno?><?php echo '&id='?><?php echo $id?><?php echo '&tm_id='?><?php echo $tm_id?>
                            <?php echo '" '.'enctype="multipart/form-data" method="post">申请加入</a>'?>
                        <?php }?>
                    </font></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</main>
<body>
</body>
</html>