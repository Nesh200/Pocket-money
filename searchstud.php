<?php
$message = null;
if (isset($_REQUEST['message'])) {
    $message = $_REQUEST['message'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Searchme</title>
</head>
<body>
<div class="container">
    <form method="GET" action="search.php">
        <?php
        if ($message) {
            ?>
            <p>
                <?php echo $message; ?>
            </p>
            <br/>
        <?php } ?>
        <label for="tel">Enter Adm No:</label><br/>
        <input type="tel" id="tel" name="tel" required autocomplete="off"><br/>
        <input type="submit" value="Submit">
    </form>
</div>
</body>
</html>