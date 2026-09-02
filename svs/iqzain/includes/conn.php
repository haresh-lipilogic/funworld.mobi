<?php
//$conn = mysql_connect('10.125.0.50','productionuser','Zb8#fNIsXnoP12') or die(mysql_error()); //localhost connection query
$conn = new PDO("mysql:host=10.125.1.51;port=3308;", 'productionuser', 'Zb8#fNIsXnoP12') or die(print_r($conn->error));

//$conn = new PDO("mysql:host=10.125.0.50", 'webserveruser', 'K&dN&r4a8N@du0') or die(print_r($conn->error));


	
//$db=mysql_select_db('ip_operator') or die(mysql_error());



?>
