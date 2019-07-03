<?php
session_start();
if (!empty($_POST['email'])){
    $email = $_POST['email'];
    function sendMail($to,$title,$content) {
        require './PHPMailer/PHPMailerAutoload.php';
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->Host = 'smtp.qq.com';
        $mail->Username = '1546857936@qq.com';
        $mail->Password = 'miixyttrvgdajchg';
        $mail->setFrom('1546857936@qq.com', 'App创意俱乐部');
        $mail->addAddress($to);
        $mail->Subject = $title;
        $mail->Body = $content;
        if(!$mail->send()) {
            return '发送失败: ' . $mail->ErrorInfo;
        } else {
            return "发送成功";
        }
    }
    function srandnums(){
        srand((double)microtime()*1000000);//create a random number feed.
        $ychar="0,1,2,3,4,5,6,7,8,9";
        $list=explode(",",$ychar);
        $authnum = null;
        for($i=0;$i<6;$i++){
            $randnum=rand(0,10); // 10;
            $authnum.=$list[$randnum];
        }
        return $authnum;
    }
    $nums = srandnums();
    $_SESSION['code'] = $nums;
    exit(var_dump(sendMail($email,'易组队','验证码是：'.$nums)));
}else{
    exit('邮箱为空！');
}

            ?>