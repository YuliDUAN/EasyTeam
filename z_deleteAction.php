<?php
$id=$_GET["id"];

include("z_mysql.php");
$result=$conn->query("delete from activity where id='$id'");
if($result){
    echo "<script>alert('删除成功');location.href='z_page.php';</script>";
}else{
    echo "<script>alert('删除失败');location.href='z_page.php';</script>";

}
mysqli_free_result($result);
?> 