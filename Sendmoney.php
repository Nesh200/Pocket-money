<!DOCTYPE html>
<html lang="en">
<head><style>
        p{
            color royalblue;
        }
    </style>
    <meta charset="UTF-8">
    <title>Send money</title>

</head>
<body>
<?php
$message = null;
if (isset($_REQUEST['message'])) {
    $message = $_REQUEST['message'];


}
if ($message) {
    ?>
    <p style="color:royalblue">
        <?php echo $message; ?>
    </p>
<?php } ?>
<form action="send.php" method="GET">
    <label for="sendto">Send to:</label><br/>
    <input type="number" id="sendto" name="sendto" required><br/>
    <label for="sendfrom">Send from:</label><br/>
    <input type="number" id="sendfrom" name="sendfrom" required><br/>
    <label for="amount">Amount:</label><br/>
    <input type="amount" id="amount" name="amount" required><br/>
    <input type="submit" value="Submit">
</form>
</body>
</html>