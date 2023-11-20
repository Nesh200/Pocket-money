<?php
function currency_converter($from, $to, $amount)
{
    // $url = "http://www.google.com/finance/converter?a=$amount&from=$from&to=$to";
    $currencies = $from . "_" . $to;
    $url = "https://free.currconv.com/api/v7/convert?q=" . $currencies . "&compact=ultra&apiKey=3deaa3aae7b12125b3dc";
    $Color = "red";

    
    //echo '<div style="Color:'.$Color.'">'.$from.'</div>';

    $request = curl_init();
    $timeOut = 0;
    curl_setopt($request, CURLOPT_URL, $url);
    curl_setopt($request, CURLOPT_RETURNTRANSFER, 1);

    curl_setopt($request, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1)");
    curl_setopt($request, CURLOPT_CONNECTTIMEOUT, $timeOut);
    $response = curl_exec($request);
    echo curl_error($request);
    curl_close($request);

    $rate = json_decode($response);

    //print_r($rate);
    //exit();
    $exchange_rate = $rate->$currencies;
    $results = $exchange_rate * $amount;
    return $results;
}

$amount = $_REQUEST['amount'];
$from = $_REQUEST['convert_from'];
$to = $_REQUEST['convert_to'];

$result = currency_converter($from, $to, $amount);
echo $result;
?>

