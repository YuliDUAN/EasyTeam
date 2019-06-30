<?php
    session_start();
    include "z_mysql.php";
    $title=$_POST["title"];
    $file=$_FILES['fileField'];
    $note=$_POST["note"];
    $content=$_POST["content"];
    $datetime=$_POST["datetime"];
    $authour=$_POST["authour"];
    $views=$_POST["views"];
    if($_SERVER['REQUEST_METHOD']=='POST'){

        if (!isset($_FILES['fileField'])){
            $GLOBALS['message'] = '未上传文件';
            return;
        }
        if ($file['error']!=UPLOAD_ERR_OK){
            $GLOBALS['message'] = '上传失败';
            return;
        }
        $source = $file['tmp_name'];
        $target = "./images/" . $file['name'];
        $moved = move_uploaded_file($source,$target);
        if (!$moved){
            $GLOBALS["message"] = '上传失败';
            return;
        }

        $sql = "insert into article(ar_title,ar_image,ar_description,ar_content,ar_time,ar_repoter,ar_clicknum) values ('$title','$target','$note','$content','$datetime','$authour','$views')";
        $result = $conn->query($sql);
        if ($result == true) {
            echo "<script >alert('添加成功');location.href='z_list.php';</script>";

        } else {
            echo "<script>alert('添加失败')</script>";
        }

        mysqli_free_result($result);

    }

?>