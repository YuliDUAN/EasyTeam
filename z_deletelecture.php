<?php
/**
 * Created by PhpStorm.
 * User: DCY
 * Date: 2019/7/2
 * Time: 16:13
 */
include("z_mysql.php");
$id=$_GET["id"];

$result=$conn->query("delete from lecture where id='$id'");
if($result){
    echo "<script>alert('删除成功');location.href='z_endlecture.php';</script>";
}else{
    echo "<script>alert('删除失败');location.href='z_endlecture.php';</script>";

}
mysqli_free_result($result);
?>