<?php
require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->isSMTP();
$mail->SMTPDebug = 2;
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'abhi4204u@gmail.com';
$mail->Password = 'Chhotoo1991';
$mail->SMTPSecure = 'tls';

$mail->From = 'abhi4204u@gmail.com';
//$mail->To	= 'ganpatgodara@gmail.com';
$mail->FromName = 'Abhishek Sharma';
$mail->addAddress('ganpatgodara@gmail.com');
$mail->addBcc('abhi4204u@gmail.com');

$mail->addReplyTo('abhi4204u@gmail.com');

$mail->WordWrap = 50;
$mail->isHTML(true);

$mail->Subject = 'Sizzling Food';
$mail->Body    = 'Hi I am using mail function';
echo "<pre>";
//print_r($mail);die;
if(!$mail->send()) {
   echo 'Message could not be sent.';
   echo 'Mailer Error: ' . $mail->ErrorInfo;
   exit;
}

echo 'Message has been sent';