<?php

$instance='instance48569';
$token='3ym15m9j7jw83pkl';
$to='6285791215015';
/////////// 
$path="../admin/excel/kwitansi.pdf";
$data = file_get_contents($path);
// you can convert File to Base64  using ultramsg UI
// https://user.ultramsg.com/app/base64/base64.php 

//Encodes data base64
$img_base64 =  base64_encode($data);  
//urlencode — URL-encodes string  
$img_base64 =urlencode($img_base64 );
////////////
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.ultramsg.com/$instance/messages/document",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_SSL_VERIFYHOST =>0,
  CURLOPT_SSL_VERIFYPEER =>0,
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "token=$token&to=$to&document=$img_base64&filename=ultramsg.pdf",
  CURLOPT_HTTPHEADER => array(
    "content-type: application/x-www-form-urlencoded"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}
?>
