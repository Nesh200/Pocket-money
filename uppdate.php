<?php
session_start();
$money = $_POST["money"];
$id = $_SESSION["id"];
$type = $_POST['type'];
$transtype =$_POST['type'];
$transaction_by =$_POST['by'];
//$firstname = $_REQUEST["firstname"];


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
if($type == 'deposit'){
    $sql = "UPDATE myguests SET money = money + $money WHERE id = $id";

} else {
    $sql = "UPDATE myguests SET money = money - $money WHERE id = $id";
}
$sql1 = "INSERT INTO transactions ( transtype, transaction_by, money, guest_id)
VALUES ('$transtype', '$transaction_by', '$money', '$id')";

echo "<br/>";
if ($conn->query($sql) === TRUE && $conn->query($sql1) == TRUE) {
    echo "Record updated successfully.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

header("Location: guests.php");
?>
