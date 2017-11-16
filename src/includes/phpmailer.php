<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load composer's autoloader
require '../vendor/autoload.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    //$mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'apotheekcoke@gmail.com';                 // SMTP username
    $mail->Password = 'lololol123';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('apotheekcoke@gmail.com', 'Apotheek Coke');
    $mail->addAddress($email);               // Name is optional

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Apotheek Coke Inlog';
    $mail->Body    = 'Hallo!
    Om verder te kunnen met het inloggen moet u op deze verwijzing klikken: 
    www.apotheekcoke.xibennguyen.xyz/loginverwijzing.php?id=' . $verznr . '.';

    $mail->send();
    header("Location: ../patientlogin.php?login=success");
} catch (Exception $e) {
    header("Location: ../patientlogin.php?login=mailerror");
    exit();
}