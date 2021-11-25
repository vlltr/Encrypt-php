<?php

 function encrypt_method($action, $string)
 {
     $output = false;
     $encrypt_method = "AES-256-CBC";
     $secret_key = 'llave 1';
     $secret_iv = 'lave 2';

     $key = hash('sha256', $secret_key);

     $iv = substr(hash('sha256', $secret_iv), 0, 16);

     if ($action == 'encrypt') {
         $output = base64_encode(openssl_encrypt($string, $encrypt_method, $key, 0, $iv));
     } else {
         if ($action == 'decrypt') {
             $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
         }
     }
     return $output;
 }

 echo encrypt_method('encrypt', '12345');

 echo encrypt_method('decrypt', 'ZS9BRzVoRnlhNXk5NGFWdmFkUmxvUT09');
?>
