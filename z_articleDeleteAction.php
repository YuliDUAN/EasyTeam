<?php
$ar_id=$_GET["ar_id"];

include("z_mysql.php");
$result=$conn->query("delete from article where ar_id='$ar_id'");
if($result){
    echo "<script>alert('删除成功');location.href='z_list.php';</script>";
}else{
    echo "<script>alert('删除失败');location.href='z_list.php';</script>";

}
mysqli_free_result($result);
?>