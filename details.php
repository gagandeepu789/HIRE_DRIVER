<?php
        $name=$_POST["name"];
        $age=$_POST["age"];
        $phone=$_POST["phone"];
        $license=$_POST["license"];
        $experience=$_POST["experience"];
        $location=$_POST["location"];
        $sname="localhost";
        $uname="root";
        $pwd="";
        $dbname="driver";

$conn = new mysqli($sname, $uname,$pwd,$dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql="insert into dr_det(name,age,phone,license,experience,location) values('$name','$age','$phone','$license','$experience','$location')";
if($conn->query($sql)===true){
 echo "values inserted succesfully";
}
$conn->close();
    ?>