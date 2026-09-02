<?php

//header('Content-type: application/apk');

   $file=$_COOKIE['file1'];
 // setcookie('file1', "", time() + (86400 ), "/");
  setcookie('file1');   
header("Location:$file");


?>