<?php
$id=$_POST["id"];
$ac_id=$_POST["ac_id"];
$prize=$_POST["team_prize"];
$otherprize=$_POST["otherprize"];
include "z_mysql.php";
if($prize==5){
    if(!empty($otherprize)){
        $sql2="update team set team_prize='$prize',otherprize='$otherprize' where team_id='$id'and ac_id='$ac_id'";
        $result2 = $conn->query($sql2);
        if($result2==true){
            echo "<script>alert('修改成功！');location.href='z_team.php?id=$ac_id';</script>";
        }else{
            echo "<script>alert('修改失败！');location.href='z_team.php?id=$ac_id';</script>";
        }
        mysqli_free_result($result);
    }else{
        echo "<script>var d = \"$ac_id\"</script>";
        echo "<script>var e = \"$id\"</script>";
        echo '<script>alert("输入的内容不能为空！");window.location.href="z_addprizes.php?id="+e+"&ac_id="+d;</script>';
    }
} else if($prize!=5&&$otherprize!=""){
    echo "<script>var d = \"$ac_id\"</script>";
    echo "<script>var e = \"$id\"</script>";
    echo '<script>alert("请选中其他！");window.location.href="z_addprizes.php?id="+e+"&ac_id="+d;</script>';
}else{
    $sql1="update team set team_prize='$prize',otherprize='' where team_id='$id'and ac_id='$ac_id'";
    $result = $conn->query($sql1);
    if($result==true){
        echo "<script>alert('修改成功！');location.href='z_team.php?id=$ac_id';</script>";
    }else{
        echo "<script>alert('修改失败！');location.href='z_team.php?id=$ac_id';</script>";
    }
    mysqli_free_result($result);
}
?>