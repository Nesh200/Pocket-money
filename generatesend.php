<?php
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
else {
//echo "Database connected successfully <br/>";

    $generateOtp = function ($guest_id) use ( $conn) {

        $num = (rand(1000, 9999));
        echo $num;
        $otp = $num;
        $token = uniqid();
        $sql = "INSERT INTO otp (otp,token,guest_id)
VALUES ('$otp','$token', '$guest_id')";
        if ($conn->query($sql) === TRUE) {
            $last_id = $conn->insert_id;
            result = $sql;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        return result;
        header("Location: otpput.php");

    }
}
    ?>