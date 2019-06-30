<?php
$id=$_GET["id"];

include ("z_mysql.php");
$result=$conn->query("delete from team where team_id='$id'");
if($result){
    echo "<script>alert('删除成功');</script>";
    header("location:z_page.php");
    
}else{
    echo "<script>alert('删除失败');</script>";

}
?> 