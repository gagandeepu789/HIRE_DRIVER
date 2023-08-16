<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "driver";
// include 'book.php';
$conn = mysqli_connect($servername, $username, $password, $dbname);
session_start();
if (isset($_SESSION['eid'])) {
    $emailid = $_SESSION['eid'];
    // echo "Received value: " . $receivedValue;
}
// $eid=$_POST["email"];
// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve the form data
  $name = $_POST["usn"];
  $_SESSION['cname']=$name;
  $mobileNumber = $_POST["mno"];
  $cardNumber = $_POST["card_number"];
  $expirationDate = $_POST["expiration_date"];
  $cvv = $_POST["cvv"];
  $est = $_POST["est"];
//   $_SESSION['eid2']=$emailid;
  $sql = "INSERT INTO payment (cname, mbno, cno, edate, cvv,est) 
        VALUES ('$name', '$mobileNumber','$cardNumber','$expirationDate','$cvv','$est')";
}
if (mysqli_query($conn, $sql)) {
    echo " <script>
    alert('Payment successful');
    window.location.href = 'home.html';
</script>" ;
    
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    
}
?>
<!-- <a href="mail.php">Go to file2</a> -->