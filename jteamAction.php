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
        $sql_cen = "select static_join from static where membersno = $member_sno and capsno = $cap_sno";
        $result_cen = $conn->query($sql_cen);
        $row_cen = mysqli_fetch_array($result_cen);
        if ($row_cen['static_join'] == 2||$row_cen['static_join'] == 3){
            echo "<script>var d = \"$id\"</script>";
            echo "<script>alert('操作失败，队长已处理！');window.location.href='jteam.php?id='+d</script>";
        }else{
            $sql_c = "delete from static where membersno = $member_sno and capsno = $cap_sno";
            $conn->query($sql_c);
            echo "<script>var d = \"$id\"</script>";
            echo "<script>alert('取消成功！');window.location.href='jteam.php?id='+d</script>";
        }

    }
}else{
    echo "<script>var d = \"$id\"</script>";
    echo "<script>alert('你已是队长不可申请！');window.location.href='jteam.php?id='+d</script>";
}
?>

