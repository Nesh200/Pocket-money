<?php
$dbservername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "myDB";

// Create connection
$conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$to = 'nehemiah.kipkemboi.yego@gmail.com';
$subject = 'Pocket money Ballance';
$message = 'Hi, Kindly check with the admin to get your full or mini-statement. Charges might apply. Thanks';
$from = 'admin@pockets.com';

$sent = mail($to, $subject, $message, "From: $from");
// Sending email
if ($sent) {
    echo 'Your mail has been sent successfully.';
} else {
    echo 'Unable to send email. Please try again.';
}
$conn->close();
?>