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
    $sql = "select * from team where ac_id=$ac_id and cap_sno=$sno ";
    $result = $conn->query($sql);
    $nums = mysqli_num_rows($result);
    if (!empty($nums)) {
        echo "<script>var d = \"$ac_id\"</script>";
        echo "<script >alert('您已创建过队伍，不可重复创建');window.location.href=\"apply.php?id=\"+d</script>";
    } else {
        echo "<script>var d = \"$ac_id\"</script>";
        $result = $conn->query("insert into team(ac_id,team_name,team_cap,cap_sno,team_tel) values ('$ac_id','$name','$row[0]','$sno','$row[1]')");
        echo "<script >alert('创建成功');window.location.href=\"apply.php?id=\"+d</script>";
    }

} else {
    echo "<script>var d = \"$ac_id\"</script>";
    echo '<script>alert("输入的内容不能为空！");window.location.href="apply.php?id="+d;</script>';
}

?>