<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "driver";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// php
// session_start();
// $variableValue = "Hello, world!";
// $_SESSION['var'] = $variableValue;
// header("Location: payment.php");
// include 'payment.php';
$name = $_POST["name"];
$contact = $_POST["contact"];
$driver = $_POST["driver"];
// session_start();
$email=$_POST["email"];
// $_SESSION['eid']=$email;

$service = $_POST["service"];
$datetime = $_POST["datetime"];
$enddate = $_POST["enddate"];
$source = $_POST["source"];
$destination = $_POST["dest"];

$sql = "INSERT INTO book (cus_name, cus_contact, dri_name,email, cus_service, cus_date, enddate, source,cus_dest) 
        VALUES ('$name', '$contact', '$driver','$email','$service', '$datetime','$enddate', '$source','$destination')";
        $enddate = new DateTime($_POST["enddate"]);
$datetime = new DateTime($_POST["datetime"]);

// if (mysqli_query($conn, $sql)) {
//     echo "<script>window.location='book.php';</script>";
// } else {
//     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
// }



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
 
require 'C:\xampp\htdocs\PHPMailer-master\src\Exception.php';
require 'C:\xampp\htdocs\PHPMailer-master\src\PHPMailer.php';
require 'C:\xampp\htdocs\PHPMailer-master\src\SMTP.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $abc = $_POST["email"];
    $sdate = $_POST["datetime"];
    $edate = $_POST["enddate"];
    $source = $_POST["source"];
    $destination = $_POST["dest"];
    $pnumber = $_POST["contact"];
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
    $mail->addAddress($abc);     // Add a recipient
    $mail->addAddress($abc);               // Name is optional
    $mail->addReplyTo($abc, 'Information');
    $mail->addCC('gagandeepu789@gmail.com');
    $mail->addBCC('gagandeepu789@gmail.com');
 
    /*// Attachments
    $mail->addAttachment('/home/cpanelusername/attachment.txt');         // Add attachments
    $mail->addAttachment('/home/cpanelusername/image.jpg', 'new.jpg');    // Optional name*/
 
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Booking status';
    $mail->Body    = "Congratulations on being selected as the designated driver for our important  trip from <b>$source to $destination</b>, scheduled from <b>$sdate - $edate</b> Your expertise and professionalism will ensure a smooth and productive journey, contributing significantly to our success. We look forward to a fruitful collaboration as we explore new opportunities together on the road. Please contact <b>$pnumber</b> for further details.<br>Thank you for being an essential part of our team!";
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    if (!$mail->send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
        echo "<script>alert('Driver Booked Successfully'); window.location.href = 'home.html'</script>";
    }
    // $mail->send();
    // echo 'Message has been sent';
 
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
   
}

?>