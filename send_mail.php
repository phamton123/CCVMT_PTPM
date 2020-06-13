<?php
    require_once 'commons/utils.php';
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $laypass = "select * from users where email = '$email' and phone_number = '$phone'";
    $pass = getSimpleQuery($laypass);

    $tea = "select * from teachers where email = '$email' and phone = '$phone'";
    $teacher = getSimpleQuery($tea);

    $stu = "select * from student where email = '$email' and phone = '$phone'";
    $student = getSimpleQuery($stu);

    $cap = $_POST['capcha'];
    $recap = $_POST['re_cap'];

    $caper = $mk = "";
    if($cap != $recap){
        $caper = "cap=Nhập đúng capcha&&";
    }else{
        $caper = "";
    }
    if(!$pass || !$tea || !$student){
        $mk = "mk=Không tìm thấy tài khoản";
    }else{
        $mk = "";
    }
    if($cap != "" || $mk != ""){
        header('location: '.SITE_URL.'laymk.php?'.$caper.$mk);
    }
    $id = $pass['id'];
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $newpass = "";

    $size = strlen( $chars );
            for( $i = 0; $i < 4; $i++ ) {
                $newpass .= $chars[ rand( 0, 4 ) ];
            }

    $newpassword = password_hash($newpass, PASSWORD_DEFAULT);
    $doipass = "update users set password = '$newpassword' where id = $id";
    $dpass = getSimpleQuery($doipass);

    $mailto = $email;
    $mailSub = "=?utf-8?b?".base64_encode("Lấy lại mật khẩu")."?=";
    $mailMsg = "Mật khẩu mới của bạn là $newpass";
   require 'PHPMailer-master/PHPMailerAutoload.php';
   $mail = new PHPMailer();
   $mail ->IsSmtp();
   $mail ->SMTPDebug = 0;
   $mail ->SMTPAuth = true;
   $mail ->SMTPSecure = 'ssl';
   $mail ->Host = "smtp.gmail.com";
   $mail ->Port = 465; // or 587
   $mail ->IsHTML(true);
   $mail ->Username = "dienntph06483@fpt.edu.vn";
   $mail ->Password = "nguyentridien";
   $mail ->SetFrom("dienntph06483@fpt.edu.vn");
   $mail ->Subject = $mailSub;
   $mail ->Body = $mailMsg;
   $mail ->AddAddress($mailto);

   if(!$mail->Send())
   {
       echo "Mail Not Sent";
   }
   else
   {
       echo "Mail Sent";
   }