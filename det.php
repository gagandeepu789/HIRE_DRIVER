<?php
// Establish a connection to the MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "driver";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the form data
$name = $_POST["name"];
$age = $_POST["age"];
$phone = $_POST["phone"];
$license = $_POST["license"];
$experience = $_POST["experience"];
$location = $_POST["location"];

// Insert the data into the database
$sql = "INSERT INTO drvdet (Dname, Dage, Dph_no, DLno, Dexp, Dloc) 
        VALUES ('$name', '$age', '$phone', '$license', '$experience', '$location')";

if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Thank You for registering'); window.location='home.html';</script>"; // display alert message and redirect using JavaScript
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close the database connectionmysqli_close($conn);
?>