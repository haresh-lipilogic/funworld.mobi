<?php

$name="TIEMPO PRIVADO KRT.mp4";
$url="http://hotshots.me/images/gallary/rgkvideos/14011_MASSIVE_MELONS_Sara_Pinkdots.mp4";

downloadUrlToFile($url,$name);
function downloadUrlToFile($url, $outFileName)
{   
    if(is_file($url)) {
        copy($url, $outFileName); 
    } else {
        $options = array(
          CURLOPT_FILE    => fopen($outFileName, 'w'),
          CURLOPT_TIMEOUT =>  28800, // set this to 8 hours so we dont timeout on big files
          CURLOPT_URL     => $url
        );

        $ch = curl_init();
        curl_setopt_array($ch, $options);
        curl_exec($ch);
        curl_close($ch);
    }
}

?>