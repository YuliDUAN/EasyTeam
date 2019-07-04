<?php
/**
 * Created by PhpStorm.
 * User: DCY
 * Date: 2019/7/2
 * Time: 17:09
 */
include("z_mysql.php");
$title=$_POST["title"];
$id=$_POST["id"];
$number=$_POST["number"];
$fileField=$_FILES["fileField"];
$authour=$_POST["authour"];
$source = $fileField['tmp_name'];
$target = "./images/" . $fileField['name'];
$moved = move_uploaded_file($source,$target);
$conn->query("update nova set state=0 where id='$id'");
$result=$conn->query("insert into nova(name,image,host,number) values ('$title','$target','$authour','$number')");
if($result==true){
    echo "<script >alert('替换成功');location.href='z_nova.php';</script>";

}else{


    echo "<script>alert('替换失败');location.href='z_nova.php';</script>";
}

mysqli_free_result($result);
?>