<?php
require 'PHPMailerAutoload.php';
require 'credential.php';
$mail = new PHPMailer;

$mail->SMTPDebug = 0;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = EMAIL;                 // SMTP username
$mail->Password = PASS;                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom(EMAIL, 'Mailer testing');
$mail->addAddress('saifiamaan445@gmail.com');
// $mail->addAddress('Team@yoddhas.com');
// $mail->addAddress('rashimandla@gmail.com');     // Add a recipient         
$mail->addReplyTo($_POST['email']);

// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = $_POST['subject'];
$mail->Body    = $_POST['message'];
// $mail->AltBody = 

if(!$mail->send()) {

    echo 'Message could not be sent.';
    echo "<script> alert('Sorry,Your mail couldn't delivered due to technical issue, try again later.')
    window.location.href = 'contact.html';</script>";

} else {
    // echo 'Message has been sent';
    echo "<script> alert('Mail delivered successfully.')
    		window.location.href = 'contact.html';
    </script>";
}
