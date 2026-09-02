<!--<meta http-equiv="Content-Security-Policy" content="default-src 'self'; img-src http://*; child-src 'none';">-->
<?php
var_dump(getallheaders());
echo "<br>1)x-api-id=".$_SERVER['x-api-id'];
echo "<br>2)HTTP_X_API_ID=".$_SERVER['HTTP_X_API_ID'];
echo "<br>3)http-x-api-id=".$_SERVER['http-x-api-id'];


exit;
