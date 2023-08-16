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
$contact = $_POST["contact"];
$driver = $_POST["driver"];
$service = $_POST["service"];
$datetime = $_POST["datetime"];
$enddate = $_POST["enddate"];
$source = $_POST["source"];
$destination = $_POST["dest"];

$sql = "SELECT enddate FROM book ORDER BY id DESC LIMIT 1";
$result = mysqli_query($conn, $sql);
$previousEndTime = null;

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $previousEndTime = new DateTime($row["enddate"]);
}

// Compare the end time of the previous customer with the start time of the new customer
if ($previousEndTime !== null && $datetime < $previousEndTime) {
    echo "Start time is earlier than the end time of the previous customer.";
} else {
    // Insert the data into the database
    $sql = "INSERT INTO book (cus_name, cus_contact, dri_name, cus_service, cus_date, enddate, source, cus_dest) 
            VALUES ('$name', '$contact', '$driver', '$service', '$datetime', '$enddate', '$source', '$destination')";
    
    if (mysqli_query($conn, $sql)) {
        echo "Driver booked successfully.";
        // Redirect to home.html or do other necessary actions
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);
?>
