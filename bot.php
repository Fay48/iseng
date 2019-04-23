<?php
// CHAT ID is YOUR TARGET
// TEXT is MESSAGE FOR YOUR TARGET
// Created by HebiroteX
echo "
  _    _      _     _           _      __   __
 | |  | |    | |   (_)         | |     \ \ / /
 | |__| | ___| |__  _ _ __ ___ | |_ ___ \ V / 
 |  __  |/ _ \ '_ \| | '__/ _ \| __/ _ \ > <  
 | |  | |  __/ |_) | | | | (_) | ||  __// . \ 
 |_|  |_|\___|_.__/|_|_|  \___/ \__\___/_/ \_\ 
                                              
";
echo "Do you want running this script? (y/n) : ";
$ehbct = fgets(STDIN);
echo "\n\n";
if(trim($ehbct) == "y"){
echo "Spam Count : ";
$ehbctya = fgets(STDIN);
echo "\n";
echo "Running....\n";
	$i=1;
while ($i <= $ehbctya)
{

$curl = curl_init();
    curl_setopt ($curl, CURLOPT_URL, "https://api.telegram.org/botYOURAPI/sendMessage?chat_id=YOURCHATID&text=YOURMESSAGES"); // Your BOT Telegram API
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
 
    $result = curl_exec ($curl);
    if($result){
    	echo "Ok ".$i."\n";
    	$i=$i+1;
    }else {
    	echo "Fail Gan ".$i."\n";
    }

   }
 //   curl_close ($curl);
 //   print $result;
}
?>
