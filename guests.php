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

$sql = "SELECT firstname,lastname,email,tel,id FROM myguests";

$result = $conn->query($sql);

/*if ($result->num_rows > 0) {
    // If not using tables
    // PHP allows you to call fetch_assoc() on a result only once
    while ($row = $result->fetch_assoc()) {
        echo "Firstname: " . $row["firstname"] . "  Lastname: " . $row["lastname"] . "  Email: " . $row["email"] . "<br>";
    }
} else {
    echo "0 results";
}*/

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
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 70%;
        }
        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        tr:nth-child(odd) {
            background-color: cadetblue;
        }
        tr:nth-child(even) {
            background-color: lightgrey;
        }
    </style>
</head>
<body>
<div class="bg">
    <table>
        <tr>
            <th style="width: 30%">Firstname</th>
            <th style="width: 30%">Lastname</th>
            <th style="width: 30%">Email</th>
            <th style="width: 30%">Tel</th>
            <th>Actions</th>
        </tr>
        <?php
        while ($row = $result->fetch_assoc()) {
            ?>
            <tr>
                <td><?php echo $row['firstname']; ?></td>
                <td><?php echo $row['lastname']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['tel']; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $row['id']; ?>">Edit </a><a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>

                </td>
            </tr>
        <?php } ?>
    </table>
</div>
</body>
</html>
</body>
</html>
