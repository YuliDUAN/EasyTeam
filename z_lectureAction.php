<?php
include("z_mysql.php");
$title=$_POST["title"];
$id=$_POST["id"];
$fileField=$_FILES["fileField"];
$content=$_POST["content"];
$number=$_POST["number"];
$datetime=$_POST["datetime"];
$authour=$_POST["authour"];
$source = $fileField['tmp_name'];
$target = "./images/" . $fileField['name'];
$moved = move_uploaded_file($source,$target);
$conn->query("update lecture set state=0 where id='$id'");
$result=$conn->query("insert into lecture(title,image,con,time,adr,number) values ('$title','$target','$content','$datetime','$authour','$number')");
if($result==true){
    echo "<script >alert('替换成功');location.href='z_lecture.php';</script>";

}else{


    echo "<script>alert('替换失败');location.href='z_lecture.php';</script>";
}

mysqli_free_result($result);
?>