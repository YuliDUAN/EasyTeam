<?php
include "MySqlConnect.php";
$member_sno = $_GET['member_sno'];
$cap_sno = $_GET['cap_sno'];
$id = $_GET['id'];

if (!empty($_GET['member_sno'])&&!empty($_GET['cap_sno'])&&$member_sno!=$cap_sno){
    $sqlstatic = "select * from static where membersno = $member_sno and capsno = $cap_sno";
    $result = $conn->query($sqlstatic);
    if (empty(mysqli_fetch_array($result))){
        $static_join = 1;
        $join_time = date("Y-m-d");
        $sql ="insert into static(membersno,static_join,capsno,join_time) values ('$member_sno','$static_join','$cap_sno','$join_time')";
        $conn->query($sql);
        header("location:jteam.php?id=".$id);
    }else{
        echo "<script>var d = \"$id\"</script>";
        echo "<script>alert('你已申请，请等待回复！');window.location.href='jteam.php?id='+d</script>";
    }
}else{
    echo "<script>var d = \"$id\"</script>";
    echo "<script>alert('你已是队长不可申请！');window.location.href='jteam.php?id='+d</script>";
}
?>

