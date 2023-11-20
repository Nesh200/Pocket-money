<?php

$firstname = $_POST['firstname'];
$lastname = $_POST["lastname"];
$email = $_POST["email"];
$tel = $_POST["tel"];
$pasword = $_POST["pasword"];
$id = $_POST["id"];

echo "My fname is:" . "$firstname", "My lname is:" . "$lastname", "My email is:" . "$email","My tel is:" . "$tel";

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

$sql = "UPDATE myguests SET firstname = '$firstname', lastname = '$lastname', email = '$email', tel = '$tel',pasword = '$pasword' WHERE id = $id";
echo "<br/>";
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

header("Location: guests.php");
?>
