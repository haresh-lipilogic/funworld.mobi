<?php

 $pubkey = '123';
 $privkey = '123';
function encrypt($data)
{
	$pubkey = '123';
 $privkey = '123';
if (openssl_public_encrypt($data, $encrypted, $pubkey))
$data = base64_encode($encrypted);
else
throw new Exception('Unable to encrypt data. Perhaps it is bigger than the key size?');
return $data;
}
 function decrypt($data)
{
	$pubkey = '123';
 $privkey = '123';
if (openssl_private_decrypt(base64_decode($data), $decrypted, $privkey))
$data = $decrypted;
else
$data = '';
return $data;
}

echo $test=encrypt("grr");
?>