<?php
$id = $_GET['id'];

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

$sql = 'SELECT firstname,lastname,email,tel,pasword,id FROM myguests WHERE id =' . $id;

$result = $conn->query($sql);

$guest = $result->fetch_assoc();

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<title>Register</title>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body, html {
            height: 100%;
            margin: 0;
        }

        .bg {
            /* The image used */
            background-image: url("kipkeikei.jpg");

            /* Full height */
            height: 100%;

            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>
<body>
<div class="bg">
    <form method="post" action="update.php">
        <input type="hidden" id="id" name="id" required readonly value="<?php echo $guest['id']; ?>"><br/>
        <label for="firstname">Firstname:</label><br/>
        <input type="text" id="firstname" name="firstname" required value="<?php echo $guest['firstname']; ?>"><br/>
        <label for="lastname">Lastname:</label><br/>
        <input type="text" id="lastname" name="lastname" required value="<?php echo $guest['lastname']; ?>"><br/>
        <label for="email">Email:</label><br/>
        <input type="email" id="email" name="email" required value="<?php echo $guest['email']; ?>"><br/>
        <label for="tel">Tel:</label><br/>
        <input type="tel" id="tel" name="tel" required value="<?php echo $guest['tel']; ?>"><br/>
        <label for="pasword">Password:</label><br/>
        <input type="password" id="pasword" name="pasword" required value="<?php echo $guest['pasword']; ?>"><br/>
        <input type="submit" value="Submit">
    </form>
    <p><a href="guests.php">view guests</a></p>
</div>
</body>
</html>
</body>
</html>