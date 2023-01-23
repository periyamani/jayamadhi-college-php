<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//get data from form

$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$state = $_POST['state'];
$city = $_POST['city'];
$institute = $_POST['institute'];
$cityname = $_POST['cityname'];
$course = str_replace("_"," ",$_POST['course']);

// preparing mail content
$messagecontent ="Dear Sir/Madam <br> <br><br> Name = ". $name . "<br>Email = " . $email . "<br>Mobile =" . $mobile. "<br>State =" . $state. "<br>City = ".$cityname."<br>District =" . $city. "<br>Institute =" . $institute. "<br>Course =" . $course;


//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();
    $mail->SMTPDebug = 2;
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'applyjayamadhi@gmail.com';
    $mail->Password = 'ejgzjbddpqvgdfac';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('applyjayamadhi@gmail.com', 'Admission');
    $mail->addAddress('smohanrajcse94@gmail.com', 'Joe User'); 

    //Attachments

    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
   // $mail->addAttachment('photo.jpeg', 'photo.jpeg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Apple for '.$institute.' College';
    $mail->Body    = $messagecontent;
    

    $mail->send();
    return 'Message could not be sent.';
} catch (Exception $e) {
   // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}