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
//echo "Database connected successfully <br/>";

if(isset($_REQUEST["otp"]))
{

    $otp = $_REQUEST["otp"];
    $token = $_REQUEST["token"];


    //  echo "SELECT * FROM myguests WHERE email = '".$email."' AND password = '". $password ."'";
    // echo "SELECT * FROM otp WHERE otp = '".$otp."' AND id = '". $guest_id ."'";
        $result = $conn->query("SELECT * FROM otp WHERE otp = '".$otp."' AND token = '". $token ."'");

    if($result->num_rows > 0)
    {
        $guest = $result->fetch_assoc();
        session_start();
        $_SESSION["logged_in"] = true;
        $_SESSION["naam"] = $otp;
        $_SESSION["id"] = $guest['guest_id'];
        echo 'correct,welcome';
        header("Location: myloginpage.php");
    }
    else
    {
        $message="The otp is incorrect!!";
        //("Location: auth.php?token=".$token."&message=".$message);
        echo 'The OTP is incorrect!';
    }

} else {
    echo 'Enter username and password';
}

