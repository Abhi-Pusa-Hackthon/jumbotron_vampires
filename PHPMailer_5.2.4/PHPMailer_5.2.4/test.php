<?php
require './class.phpmailer.php';
$mail = new PHPMailer;
$mail->IsSMTP();
$mail->SMTPDebug = 1;
$mail->SMTPAuth = true;                                   // Set mailer to use SMTP
$mail->SMTPSecure = 'ssl';                            // Enable encryption, 'ssl' also accepted
$mail->Host = 'smtp.gmail.com';  // Specify main and backup server
$mail->Port=465;
$mail->IsHTML(true);                              // Enable SMTP authentication
$mail->Username = 'esamadhaan.abhinav@gmail.com';                            // SMTP username
$mail->Password = 'Lmurugan@123';                           // SMTP password
$mail->SetFrom = 'esamadhaan.abhinav@gmail.com';
// $mail->FromName = 'Abhinav';
// $mail->AddAddress('josh@example.net', 'Josh Adams');  // Add a recipient
$mail->Subject = 'Here is the subject';
$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
$mail->AddAddress('ashesh.nitd@gmail.com');               // Name is optional
// $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->Send()) {
   echo 'Message could not be sent.';
   echo 'Mailer Error: ' . $mail->ErrorInfo;
   exit;
}
echo 'Message has been sent';
?>
