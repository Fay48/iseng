<?php
// Encrypter Tools
// Author : HebiroteX
echo "[1] Base64 Encoder\n[2] MD5 Encrypter";
echo "What do you want? : ";
$option = fgets(STDIN);
// Function Base64 Encode
if(trim($option) == "1"){
echo "=================| Base64 Encoder |=================\n \n";
echo "Value : ";
$ehbct = fgets(STDIN);
echo "Result : ";
echo base64_encode($ehbct);
echo "\n \n";
}
elseif (trim($option) == "2"){
echo "=================| MD5 Encrypter |=================\n \n";
echo "Value : ";
$ehbct = fgets(STDIN);
echo "Result : ";
echo md5($ehbct);
echo "\n \n";
}
?>
