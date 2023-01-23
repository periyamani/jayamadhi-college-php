<?php 
// use PHPMailer\PHPMailer\PHPMailer;
require("PHPMailer/class.phpmailer.php");
require("PHPMailer/PHPMailerAutoload.php");
$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPDebug = 2;
$mail->Host = 'smtp.mailtrap.io';
$mail->SMTPAuth = true;
$mail->Username = 'smohanrajcse94@gmail.com';
$mail->Password = 'Mohanraj@123';
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

$mail->setFrom('smohanrajcse94@gmail.com', 'First Last');
$mail->addReplyTo('smohanrajcse94@gmail.com', 'John Doe');
$mail->addAddress("smohanrajcse94@gmail.com", 'Mohan' );
$mail->isHTML(true);

$mail->Subject = "PHPMailer SMTP test";
// $mail->addEmbeddedImage('path/to/image_file.jpg', 'image_cid');
$mail->Body = '<img src="cid:image_cid"> Mail body in HTML';
$mail->AltBody = 'This is the plain text version of the email content';

if(!$mail->send()){
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}else{
    echo 'Message has been sent';
}

?>