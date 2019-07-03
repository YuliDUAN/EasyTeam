<?php
/**
 * Created by PhpStorm.
 * User: DCY
 * Date: 2019/6/26
 * Time: 16:17
 */

include "stateAction.php";
$rsq = "select username,phone from ruser where sno=$sno";
include "MySqlConnect.php";
$result2 = $conn->query($rsq);
$row = mysqli_fetch_array($result2);

$_POST['submit'];

$ac_id = $_POST["ac_id"];
$name = $_POST["name"];

if (!empty($_POST["name"])&&!empty($_POST)) {
    $sql = "select * from team where team_name='$name' and team_cap='$row[0]'";
    $result = $conn->query($sql);
    $nums = mysqli_num_rows($result);
    if (!empty($nums)) {
        echo "<script>alert('队伍已存在！');window.location.href=\"cteam.php?id=<?php echo $ac_id?>\"</script>";
    } else {
        $result = $conn->query("insert into team(ac_id,team_name,team_cap,cap_sno,team_tel) values ('$ac_id','$name','$row[0]','$sno','$row[1]')");
        echo "<script >alert('创建成功');location.href='icons.php';</script>";
    }

} else {
    echo '<script>alert("输入的内容不能为空！");window.location.href=\"cteam.php?id=<?php echo $ac_id?>\"</script>';
}
mysqli_free_result($result);
?>