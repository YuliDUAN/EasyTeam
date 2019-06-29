<?php
/**
 * Created by PhpStorm.
 * User: DCY
 * Date: 2019/6/26
 * Time: 16:17
 */

include "MySqlConnect.php";
$_POST['submit'];

$ac_id = $_POST["ac_id"];
$name = $_POST["name"];
$cap = $_POST["cap"];
$tel = $_POST["tel"];
$mem = $_POST["mem1"];

if (!empty($_POST) && !empty($_POST["ac_id"]) && !empty($_POST["name"]) && !empty($_POST["cap"]) && !empty($_POST["tel"])) {
    $sql = "select * from team where team_name='$name' and team_cap='$cap'";
    $result = $conn->query($sql);
    $nums = mysqli_num_rows($result);
    if (!empty($nums)) {
        echo "<script>alert('队伍已存在！');window.location.href=\"cteam.php?id=<?php echo $id?>\"</script>";
    } else {
        $result = $conn->query("insert into team(ac_id,team_name,team_cap,team_tel,team_mem) values ('$ac_id','$name','$cap','$tel','$mem')");
        echo "<script >alert('创建成功');location.href='icons.php';</script>";
    }
} else {
    echo '<script>alert("输入的内容不能为空！");window.location.href="cteam.php?id=<?php echo $id?>"</script>';
}

mysqli_free_result($result);
?>