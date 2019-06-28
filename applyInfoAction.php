<?php
include "MySqlConnect.php";
$reply = $_POST['rinfo'];
$a_id=$_POST['a_id'];
if (!empty($_POST)&&!empty($reply)){
    $rid = $_GET['rid'];
    $rtime = date("Y-m-d");
    $fid = $_GET['fid'];
    $name = $_GET['name'];
    $id = $_GET['id'];

    $sql = "insert into replys(rid,name,reply,rtime,fid,replyid)values ('$rid','$name','$reply','$rtime','$fid','$id')";
    $request = $conn->query($sql);
    header("location:apply.php?id=".$a_id);
}else{
    echo '<script>alert("回复内容不能为空");/*window.location.href="apply.php?id=<?php echo $a_id?>"*/</script>';
    header("location:apply.php?id=".$a_id);
}
mysqli_free_result($result);
?>