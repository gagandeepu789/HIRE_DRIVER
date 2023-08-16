<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
 
require 'C:\xampp\htdocs\PHPMailer-master\src\Exception.php';
require 'C:\xampp\htdocs\PHPMailer-master\src\PHPMailer.php';
require 'C:\xampp\htdocs\PHPMailer-master\src\SMTP.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // $cn = $_POST["card_number"];
    // $amount = $_POST["est"];
    // $name = $_POST["usn"];
    // $custmob = $_POST["mno"];
    session_start();
    if (isset($_SESSION['eid2'])) {
        $emailid2 = $_SESSION['eid2'];
    }
}
$mail = new PHPMailer(true);
try {
    //Server settings
    $mail->SMTPDebug = 2;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'gagandeepu789@gmail.com';                     // SMTP username
    $mail->Password   = 'jtqoqzyzbbovwrab';                               // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, [ICODE]ssl[/ICODE] also accepted
    $mail->Port       = 587;                                    // TCP port to connect to
 
    //Recipients
    $mail->setFrom('gagandeepu789@gmail.com', 'Drive4U');
    $mail->addAddress('darshanbshashi@gmail.com');     // Add a recipient
    $mail->addAddress('darshanbshashi@gmail.com');               // Name is optional
    $mail->addReplyTo('darshanbshashi@gmail.com', 'Information');
    $mail->addCC('gagandeepu789@gmail.com');
    $mail->addBCC('gagandeepu789@gmail.com');
 
    /*// Attachments
    $mail->addAttachment('/home/cpanelusername/attachment.txt');         // Add attachments
    $mail->addAttachment('/home/cpanelusername/image.jpg', 'new.jpg');    // Optional name*/
 
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Booking status';
    $mail->Body    = '$eid2';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    if (!$mail->send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
        echo ($eid2);
    }
    // $mail->send();
    // echo 'Message has been sent';
 
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
   
}

?>
