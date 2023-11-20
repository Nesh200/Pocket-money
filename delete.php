<?php

$id = $_GET["id"];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, 3306);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully <br/>";

$sql = "delete from myguests  WHERE id = $id";
echo "<br/>";
if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

header("Location: guests.php");
