<?php
$conn1 = new mysqli('10.34.240.214','webserveruser','K&dN&r4a8N@du0');
$connf = new PDO("mysql:host=10.34.240.214;", 'webserveruser', 'K&dN&r4a8N@du0') or die(print_r($conn->error));
$db='vodacom2_za';
$dblog='vodacom2_za_log';
//$dblog2='vodacom_za_log2';
$advdb='advertiserdb';

//$clientSecret = 'ZzlDmpAHYFK7vpWq';
//$clientSecret = 'WA3aWHC1MUBpWDpp';
//$clientSecret = 'Mho3kMu8EkLKvary';
// $clientSecret = 'ItOIRaXAv6vuRy0V';


// added by lipilogic
$clientSecret = 'vgIH2pY1afyPhGrG';

//$clientKey = '6Gk67IQB3uxYnqOH3DimATKga3IMlN6t';
//$clientKey = 'mSeISYT2J3zXB3hNZmcKdM3ZUTQkRuMk';
//$clientKey = '9QOk3tZsAX1BQOdxncwY3eh7yhjkPkkp';
// $clientKey = '92bPL7MuG3T3WJXAW6w2Mt8wTKDh4mRh';

// added by lipilogic
$clientKey = 'LzZZJRVsBhTX7HaiMLqO1OBEOW7bNCD9';
$authHeader = base64_encode("$clientKey:$clientSecret");

date_default_timezone_set("Asia/Kolkata");

if ($conn1->connect_errno) {
    printf("Connect failed: %s\n", $conn->connect_error);
    exit();
}
?>