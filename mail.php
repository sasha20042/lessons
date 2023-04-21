<?php

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';
$domainter = $_POST['domain_inter'];//
$name = $_POST['domain_name']; //
$org = $_POST['org_name']; //
$email = $_POST['user_email']; //
$country = $_POST['country']; //
$bid = $_POST['bid'];//
$iu = $_POST['intended_usage'];
$comment = $_POST['Comment'];

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  																							// Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'bestindentity@gmail.com'; // Ваш логин от почты с которой будут отправляться письма
$mail->Password = 'BestIndentity2020'; // Ваш пароль от почты с которой будут отправляться письма
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587; // TCP port to connect to / этот порт может отличаться у других провайдеров

$mail->setFrom('bestindentity@gmail.com'); // от кого будет уходить письмо?
$mail->addAddress('michael_sandfort@hotmail.com');     // Кому будет уходить письмо
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'User Form BestIdentity';
$mail->Body    = 'Organization Name: ' .$org . '<br>Email: ' .$email. '<br>Domain Name: ' .$name. '<br>Country: ' .$country. '<br>Domain of Interest: ' .$domainter. '<br>BID: ' .$bid. '<br>Intended Usage: ' .$iu. '<br><br>Comment: ' .$comment;
$mail->AltBody = '';

if(!$mail->send()) {
    echo 'Error';
} else {
    header('location: thank-you.html');
}
?>