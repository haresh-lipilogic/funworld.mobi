
<?php


 $browser = array(
    'version'   => '0.0.0',
    'majorver'  => 0,
    'minorver'  => 0,
    'build'     => 0,
    'name'      => 'unknown',
    'useragent' => ''
  );

  $browsers = array(
    'firefox', 'msie', 'opera', 'chrome', 'safari', 'mozilla', 'seamonkey', 'konqueror', 'netscape',
    'gecko', 'navigator', 'mosaic', 'lynx', 'amaya', 'omniweb', 'avant', 'camino', 'flock', 'aol'
  );

  if (isset($_SERVER['HTTP_USER_AGENT'])) {
    $browser['useragent'] = $_SERVER['HTTP_USER_AGENT'];
    $user_agent = strtolower($browser['useragent']);
    foreach($browsers as $_browser) {
      if (preg_match("/($_browser)[\/ ]?([0-9.]*)/", $user_agent, $match)) {
		$browser['name'] = $match[1];
       $browser['version'] = $match[2];
        @list($browser['majorver'], $browser['minorver'], $browser['build']) = explode('.', $browser['version']);
        break;
      }
    }
  }



if($browser['name']=='safari')
{
	   $file=$_GET['file3'];
 // setcookie('file1', "", time() + (86400 ), "/");
   //setcookie ("file2", "", time() - 3600);    
header("Location:$file");
}
else{
//header('Content-type: application/apk');

   $file=$_GET['file3'];
 //  setcookie ("file2", "", time() - 3600); 
	//$file="http://hotshots.me/images/gallary/19G101_HONEYS_AT_HOME_60.mp4";
	header('Content-Description: File Transfer');
	header('Content-Type: application/octet-stream');
	header('Content-Disposition: attachment; filename='.basename($file));
	header('Content-Transfer-Encoding: binary');
	header('Expires: 0');
	header('Cache-Control: must-revalidate');
	header('Pragma: public');
	header('Content-Length: ' . filesize($file));
	ob_clean();
	flush();
	readfile($file);
 // setcookie('file1', "", time() + (86400 ), "/");
//  setcookie('file2');
	  
//header("Location:$file");

}
?>