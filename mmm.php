<?php
/*
function encrypt($plaintext, $key) {
$plaintext = pkcs5_pad($plaintext, 16);
$ciphertext = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key, $plaintext, MCRYPT_MODE_ECB);
$ciphertext_base64 = base64_encode($ciphertext);
return $ciphertext_base64;
}*/
function sslEncrypt128($str)
{
    $secret = 'fQ5FHy0qzM6ljp97';
    return base64_encode(openssl_encrypt($str, 'aes-128-ecb', $secret, OPENSSL_RAW_DATA));
}
$data = "2951";
$secretKey = "fQ5FHy0qzM6ljp97";
echo sslEncrypt128($data);