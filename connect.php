<?php
//CODE TO CONNECT PHP WITH DATABASE.
$hostname="127.0.0.1"; 		//hostname
$username="root"; 			//username for database
$password=""; 				//database password
$dbname="workshop"; 		//database name
$connect=mysqli_connect($hostname,$username,$password,$dbname) or die("Error Connecting ".  mysqli_connect_error()); 		//make connection
//$connect becomes the OBJECT/VARIABLE we’ll use to fire queries to database

// Store the encryption key 
$key = 'PSSF';
$method = 'AES-256-CBC';

//encrypt function
function cookie_encryption($data, $key)
{
  global $method;
  // Remove the base64 encoding from our key
  $encryption_key = base64_decode($key);
  // Generate an initialization vector
  $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($method));
  // Encrypt the data using AES 256 encryption in CBC mode using our encryption key and initialization vector.
  $encrypted = openssl_encrypt($data, $method, $encryption_key, 0, $iv);
  // The $iv is just as important as the key for decrypting, so save it with our encrypted data using a unique separator (::)
  return base64_encode($encrypted . '::' . $iv);
}
?>
