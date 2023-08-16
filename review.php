<?php

// Establish a connection to the MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "driver";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["name"];
  $rating = $_POST["rating"];
  $review = $_POST["review"];
  $review = mysqli_real_escape_string($conn, $_POST['review']);

$sql = "INSERT INTO review (cname,cratings,creview) 
        VALUES ('$name', '$rating','$review')";

if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Thank You For Your Feedback.');window.location='home.html';</script>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

}
?>