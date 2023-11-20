<?php
$dbservername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "myDB";
session_start();
$id = $_SESSION['id'];
// Create connection
$conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname, 3306);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = 'SELECT id,money FROM myguests WHERE id =' . $id;

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // If not using tables
    // PHP allows you to call fetch_assoc() on a result only once
    $guest = $result->fetch_assoc();
} else {
    echo "0 results";
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        body{ background-color: lavenderblush;}
        .bg {
            align center;
            width: 100%;
            padding: 25px;
            background-color: mediumpurple;
            font-size: 20px;
        }
    </style>
    <meta charset="UTF-8">
    <title>Its me Nesh</title>
    <style></style>
</head>
<body>
<p style="text-align: center"> You want to send money?<a href= "sendmoney.php">Send money here</a></p>
<div class="bg" align="center">
    <form method="post" action="uppdate.php">
        <input type="hidden" id="id" name="id" readonly value="<?php echo $guest['id']; ?>"><br/>
        <label for="type">Transaction type:</label><br/>
        <div>
            <input type="radio" name="type" value="deposit" oninput="getInputValue()" required> Deposit
            <input type="radio" name="type" value="withdraw" oninput="getInputValue()" required> Withdraw
        </div>
        <label for="by">Transaction done by:</label><br/>
        <div>
            <input type="radio" name="by"  value="bursar" oninput="getInputValue()" required > Bursar
            <input type="radio" name="by" value="secretary"  oninput="getInputValue()" required> Secretary
        </div>
        <p>Current balance: <?php echo $guest['money']; ?></p>
        <label for="money">Amount:</label><br/>
        <input type="number" id="money" name="money" required oninput="getInputValue()" autocomplete="off"><br/>
        <p id="new-balance">Your new balance will be: <?php echo $guest['money']; ?></p>
        <input type="submit" value="Submit" id="submit">
    </form>
      <a href="mytransactions.php">Transaction history</a>
</div>

<script type="application/javascript">
    var balance = <?php echo $guest['money']; ?>;
    function getInputValue(){
        // Selecting the input element and get its value

        var input = document.getElementById("money").value;
        //var tot= parseInt(input)  + balance;
        var types = document.getElementsByName('type');
        var by = document.getElementsByName('by');
        var type;
        for(var t = 0; t < types.length; t++) {
            var radio = types[t];
            if (radio.checked) {
                type = radio.value;
            }
        }
        var user ;
        for(var b = 0; b < by.length; b++) {
            var radio = by[b];
            if (radio.checked) {
                user = radio.value;
            }
        }
        var tot;
       // alert(type);
       if(type === 'deposit') {
            tot = parseInt(input)  + balance;
        } else if(type === 'withdraw'){
            tot = balance-parseInt(input) ;
        } else {
           return;
       }
       if(tot<0 && type==='withdraw'){
           document.getElementById('new-balance').innerHTML = 'You cannot perfom this transaction:'
           document.getElementById('submit').setAttribute('disabled', 'disabled');
       }else{
        document.getElementById('new-balance').innerHTML = 'Your new balance will be:' +tot;
           document.getElementById('submit').removeAttribute('disabled');
       }

       if(user==='secretary' && type==='withdraw' && parseInt(input) >1000) {
           document.getElementById('new-balance').innerHTML = 'Please check out with the bursar for More information:'
          document.getElementById('submit').setAttribute('disabled', 'disabled');}

           else if (tot < 0 && type === 'withdraw') {
               document.getElementById('new-balance').innerHTML = 'You cannot perfom this transaction:'
               document.getElementById('submit').setAttribute('disabled', 'disabled');
           } else if(tot > 0 && type === 'withdraw' || type==='deposit'){
               document.getElementById('new-balance').innerHTML = 'Your new balance will be:' + tot;
               document.getElementById('submit').removeAttribute('disabled');
           }

           //document.getElementById('new-balance').innerHTML = 'Please check out with the bursar for More information:'
           // document.getElementById('submit').setAttribute('disabled', 'disabled');


       else{
           document.getElementById('submit').removeAttribute('disabled');
       }
       convertToUsd(parseInt(input));
        // Displaying the value
        // alert(tot);
    }
    function convertToUsd(amount){
        fetch('phpcurrency.php?')
            .then(response => response.json())
            .then(data => console.log(data));
    }

</script>
</body>
</html>