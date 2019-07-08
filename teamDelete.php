<?php
$tid=$_GET["teamid"];
include "MySqlConnect.php";
$sql3="select team_name,email from team,team_mem,ruser where team.team_id=team_mem.team_id 
and team_mem.member_sno=ruser.sno and team.team_id='$tid'";
$result3=$conn->query($sql3);
$arr = array();
while ($rows = mysqli_fetch_array($result3)){
    array_push($arr,$rows);
}
foreach ($arr as $r){
        function sendMail($to,$title,$content) {
            require './PHPMailer/PHPMailerAutoload.php';
            $mail = new PHPMailer;
            $mail->isSMTP();
            $mail->CharSet = "UTF-8";
            $mail->SMTPAuth = true;
            $mail->Host = 'smtp.qq.com';
            $mail->Username = '1546857936@qq.com';
            $mail->Password = 'miixyttrvgdajchg';
            $mail->setFrom('1546857936@qq.com', '系统');
            $mail->addAddress($to);
            $mail->Subject = $title;
            $mail->Body = $content;
            if(!$mail->send()) {
                return '发送失败: ' . $mail->ErrorInfo;

            } else {
                return "发送成功";

            }
        }
        exit(var_dump(sendMail($r['email'],'系统提示',$r[0].'已解散！')));
}
$sql_t = "delete from team team_id = '$tid'";
$conn->query($sql_t);
//$conn->query("delete from team_mem where team_id='$tid'");
//$conn->query("delete from team where team_id='$tid'");
//print_r($conn->query("delete from team_mem where team_id='$tid'"));
/*if(){
    echo "<script>alert('解散成功');location.href='team.php';</script>";
}else{
    echo "<script>alert('解散失败');location.href='team.php';</script>";

}*/

?>