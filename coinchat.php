<?php
error_reporting(0);
function getStr($string,$start,$end){
	$str = explode($start,$string);
	$str = explode($end,($str[1]));
	return $str[0];
}
function nomor($l){
	$data = "1234567890";
	$word = "1";
	for($a=0;$a<$l;$a++){
		$word .= $data{rand(0,strlen($data))};
	}
	return $word;
}
function getcoin($nomorhp,$user_id){
	$arr = array("\r","	");
	$url = "https://api.coinchat.im/v1/candy/get.html";
	$body = "cellphone=$nomorhp&sms_code=&user_id=$user_id";
	return curl($url,$body);
}
function curl($url,$body){
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate, br');
	$x = curl_exec($ch); 
	curl_close($ch);
	return json_decode($x,true);
}
echo "#################\n#  @muhtoevill  #\n#   SGB-Team    #\n#################\n";
echo "Masukin Link Reff lo :";
$user_id = trim(fgets(STDIN));
echo "Berapa Kali :";
$loop = trim(fgets(STDIN));
for ($i=1; $i <= $loop; $i++){
	$nomorhp = nomor(11);
	$submit = getcoin($nomorhp,$user_id);
	$output = json_encode($submit);
	//$bitcoin = getStr($output,'"coin":"btc","amount":"','"');
	//$eth = getStr($output,'"coin":"eth","amount":"','"');
	//$user_id = getStr($output,'"user_id":"','"');
	if(strpos($output,"bonus_id")==true){
			$text = "Berhasil Nomor HP Ini +$nomorhp Udah Jadi Reff lo Credit By:Muhtoevill";
			
		    $text1 = "\033[32m".$text."\033[0m";
	   }else{
		    $text ="Gagal Link Refferal Salah atau Nomor Hp Sudah Terpakai";
		    $text1 = "\033[31m".$text."\033[0m";
        }
	echo $text1."\n";
}
