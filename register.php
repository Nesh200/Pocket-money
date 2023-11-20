<?php

$firstname = $_REQUEST ['firstname'];
$lastname = $_REQUEST ['lastname'];
$email = $_REQUEST ['email'];
$tel = $_REQUEST ['tel'];
$password = $_REQUEST ['password'];

echo "My fname is:" . "$firstname", "My lname is:" . "$lastname", "My email is:" . "$email","My tel is:" . "$tel", "My password is:" . "$password";

$dbservername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "myDB";

// Create connection
$conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname, 3306);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully <br/>";

$sql = "INSERT INTO myguests (firstname, lastname, email, tel, password)
VALUES ('$firstname', '$lastname', '$email', '$tel', '$password')";
echo "<br/>";
if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;
    echo "New record created successfully. <br/> Last inserted ID is: " . $last_id;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
header("Location: guests.php");


