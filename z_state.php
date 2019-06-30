<?php
$id=$_GET["id"];
include ("z_mysql.php");
$result=$conn->query("update activity set state=0 where id='$id'");
if($result==true){
    header("location:z_page.php");

}

?>