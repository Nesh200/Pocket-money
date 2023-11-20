<?php


$dbservername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "myDB";
session_start();
$id = $_SESSION["id"];
//$id= $_POST['id'];
//$guest_id= "id";
//session_start();
//$guest_id= $_SESSION['id'];
// Create connection
if (isset($_POST['id'])) {
    require_once ('PHP/register.php');
    //$guest_id=$id;
   // echo $id;
}
$conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname, 3306);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully <br/>";
$num= (rand(1000,9999));
//echo (rand(1000, 9999) . "<br>");
echo $num;
$otp= $num;
$token= "mymymy";
//echo $guest_id;

$sql = "INSERT INTO otp (otp,token,guest_id)
VALUES ('$otp','$token', '$id')";
echo "<br/>";
if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;
    echo $num ."<br/>";
    echo "New record created successfully. <br/> Last inserted ID is: " . $last_id;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
header("Location: auth.php");

