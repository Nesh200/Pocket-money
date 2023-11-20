<?php
$dbservername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "myDB";
$guest_id = "id";
$transtype = "transtype";
session_start();
$id = $_SESSION['id'];
// Create connection
$conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname, 3306);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = 'SELECT transtime,transtype,transaction_by,money FROM transactions where guest_id =' . $id;

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
<title>History</title>
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
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        /*.transaction-header  {
            color: orange;
        }
        #my-transactions tr th:first-child {
            background-color: #00aaa7;
        }*/

    </style>
</head>
<body>
<div class="bg" id="my-transactions-wrapper">
    <table id="my-transactions">
        <tr>
            <th style="width: 30%;"class="transaction-header">Transaction time</th>
            <th style="width: 30%" class="transaction-header">Transaction type</th>
            <th style="width: 30%" class="transaction-header">Transaction by</th>
            <th style="width: 30%" class="transaction-header">money</th>
        </tr>
        <?php
        while ($row = $result->fetch_assoc()) {
            ?>
            <tr <?php if ($row['transtype'] == "deposit") {
                echo "style='background-color: green;'";
            } else {
            echo "style='background-color: red;'" ?> <?php } ?>>
                <td><?php echo $row['transtime']; ?></td>
                <td <?php if ($row['transtype'] == "deposit") {
                    echo "style='color: black;'";
                } else {
                    echo "style='color: yellow;'" ?>
                <?php } ?>><?php echo $row['transtype']; ?>

                </td>
                <td><?php echo $row['transaction_by']; ?></td>
                <td><?php echo $row['money']; ?></td>

            </tr>
        <?php } ?>
    </table>
</div>
</body>
</html>