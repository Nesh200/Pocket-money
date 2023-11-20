<?php
ini_set( 'display_errors', 1 );
error_reporting( E_ALL );
$from = "Moturievans0@gmail.com";
$to = "Nehemiah.kipkemboi.yego@gmail.com";
$subject = "Checking PHP mail";
$message = "PHP mail works just fine";
$headers = "From:" . $from;
if(mail($to,$subject,$message, $headers)) {
    echo "The email message was sent.";
} else {
    echo "The email message was not sent.";
}
?>
