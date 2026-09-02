<?php

//
// Encrypt using private key, decrypt using public key.
//
// Use this for posting signed messages:  Anyone with access to
// your public key can read it, but they can't create one with your signature.
//
// Calculating the Signature: Requests, where necessary, must be signed by the sender.
// The signature of a request is calculated as follows:
//
// Condense the payload XML into a single line as follows:
//
// 1. Remove the XML declaration
// 3. Remove all comments
// 4. Remove all line breaks
// 5. Normalise spaces (???)
// 6. Generate an SHA1 digest of the condensed payload
// 7. Base16 (hex) encode the generated SHA1 digest.
// 8. Encrypt the encoded digest using a provided RSA Private Key
// 9. Base16 (hex) encode the encrypted digest.

$payload = '<?xml version="1.0" encoding="UTF-8" ?>
<payload>
<vendorId>ACME</vendorId>
<!-- comment -->
<txnId>dummyApplicationId</txnId>
<emailId>123</emailId>
<destination>netbankingFetch</destination>
<returnUrl>https://www.google.com</returnUrl>
</payload>';

// Remove xml declaration
$xml = new DOMDocument();
$xml->loadXML($payload);
$xml->formatOutput = false;
$xml->preserveWhiteSpace = false;

// Remove all comments
$xpath = new DOMXPath($xml);
foreach ($xpath->query('//comment()') as $comment) {
    $comment->parentNode->removeChild($comment);
}

// Remove xml declaration
$condense_payload = $xml->saveXML($xml->documentElement);

// Remove all line breaks
$condense_payload = preg_replace("/\r|\n/", "", $condense_payload);

// Convert to Sha1 (this is already hex encoded)
$hash = sha1($condense_payload);
echo $hash. "\n<br>";

//
// You can generate a public and private RSA key pair like this:
// openssl genrsa -des3 -out private.pem 2048
//
// https://rietta.com/blog/2012/01/27/openssl-generating-rsa-key-from-command/
//
$private_key_string = file_get_contents('certificate/1.pem');

// Convert to private key
// $passphrase is required if your key is encoded (suggested)
$passphrase = '1234567890';
$private_key = openssl_pkey_get_private($private_key_string, $passphrase);

if (!$private_key) {
    throw new RuntimeException('Invalid private key or passphrase');
}

// Encrypt digest using key
$encrypted_private = "";
openssl_private_encrypt($hash, $encrypted_private, $private_key, OPENSSL_PKCS1_PADDING);

// Convert to Hex (base16)
$signature = bin2hex(base64_decode($encrypted_private));

echo $signature. "\n<br>";
exit;
//
// Decrypt
//
// Export the RSA Public Key to a File
// openssl rsa -in private.pem -outform PEM -pubout -out public.pem

$decrypted = '';

$pub_key = openssl_pkey_get_public(file_get_contents('certificate/1.pem'));

if(!$pub_key) {
    throw new RuntimeException('Invalid public key');
}

openssl_public_decrypt ($encrypted_private, $decrypted, $pub_key, OPENSSL_PKCS1_PADDING);

echo $decrypted . "\n<br>";