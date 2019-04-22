echo "[1] Base64 Encoder\n[2] MD5 Encrypter\n[3] Password Generator\n[4] Base64 Decoder\n";
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
}elseif (trim($option) == "3"){
	function passwd($panjang)
{
    $karakter= 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789!@#$%ˆ&*()';
    $string = '';
    for ($i = 0; $i < $panjang; $i++) {
  $pos = rand(0, strlen($karakter)-1);
  $string .= $karakter{$pos};
    }
    return $string;
}
echo "=================| Password Generator |=================\n \n";
echo "Length : ";
$ehbct = fgets(STDIN);
echo "Result : ";
print passwd($ehbct);
echo "\n \n";
}
if(trim($option) == "4"){
echo "=================| Base64 Decoder |=================\n \n";
echo "Value : ";
$ehbct = fgets(STDIN);
echo "Result : ";
echo base64_decode($ehbct);
echo "\n \n";
}
