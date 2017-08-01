<?php

error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 1);

//$getDevice = $db->customSelect(" call  `get_device_id_by_user_type`('android')");

$root = realpath(dirname(dirname(__FILE__)));
$library = "$root/library";

$path = array($library, get_include_path());
set_include_path(implode(PATH_SEPARATOR, $path));

require_once $root . '/store-receipt-validator-master/vendor/autoload.php';

use ReceiptValidator\GooglePlay\ServiceAccountValidator as PlayValidator;

// google authencation 
$client_email = 'kb-450@api-4679654566540323853-95242.iam.gserviceaccount.com';
$p12_key_path = 'Google Play Android Developer-59624591ad84.p12';

// receipt data

$getDevice = $db->customSelect(" call  `get_subscription_detail_by_device_type`('android','subscription',0,100)");


$package_name = 'com.getzend.get_zend';
$product_id = 'monthly_subs';
$purchase_token = 'hflnchbenpcklpelkaolmgaa.AO-J1OwLJK4m81C0DrigVDyhEylk4o1x7tIG7Uwp-AgZ3gHm0yHdBO3MLU1DjTOXhKDzMePwGmzpwAtdkea4iXKA4IN0akjeqFXyPa0tJNtm2kdgb2y5CWpMxk-p0kHQGtRyH9orWTlW';

$validator = new PlayValidator(['client_email' => $client_email, 'p12_key_path' => $p12_key_path]);

try {
  $response = $validator->setPackageName($package_name)->setProductId($product_id)->setPurchaseToken($purchase_token)->validate();


    $array =  (array) $response;
    /*function getMData()
    {
        return $this->modelData;
    }*/


//var_dump($response->getMData());
//var_dump($array);

    foreach ($array as $item) {
        //  echo $item;
        foreach ($item as $key => $value       ) {
            // echo '"' . $key . '" = ';
            if($key=="autoRenewing") {

                (int)$value;
                if($value==0){

                    echo "<br>false  push noti now <br>";
                }
                else{
                    echo(int)$value . "<br>";
                }
            }

            //echo $items.'<br>';
        }
    }




} catch (Exception $e) {
  echo 'got error = ' . $e->getMessage() . PHP_EOL;

}
//print_r($response);
var_dump($response);

die();

/*function getMData()
{
    return $this->modelData;
}*/
//$array =  (array) $response;

//var_dump($response->getMData());
//var_dump($array);
/*
foreach ($array as $item) {
  //  echo $item;
   foreach ($item as $key => $value       ) {
      // echo '"' . $key . '" = ';
       if($key=="autoRenewing") {

           echo ($value ? 'true' : 'false') . (int)$value . "<br>";
       }

       //echo $items.'<br>';
    }
}*/
$getDevice = $db->customSelect(" call  `get_subscription_notification`($typecheckArray[$a],'android')");

$notification_message = array();


$notification_message['message']['number_of_days_left'] = $typecheckArray[$a];
$notification_message['message']['type'] = 'subscription';
$notification_message['message']['service'] = 'trial';
$registatoin_ids =array();

for ($i = 0; $i < count($getDevice); $i++) {

    $registatoin_ids[] = $getDevice[$i]['device_id'];

}
if (count($getDevice) > 0) {


    send_notification($registatoin_ids, $notification_message);


} else {
    header('content-type: application/json');
    $result['status'] = 'No updates for notification';
    echo json_encode($result);

}



function send_notification($registatoin_ids, $msg)
{
    $url = 'https://android.googleapis.com/gcm/send';


    $fields = array(
        'registration_ids' => $registatoin_ids,
        'data' => $msg,
    );
// Update your Google Cloud Messaging API Key
    define("GOOGLE_API_KEY", GET_ZEND_AUTH_KEY);
    $headers = array(
        'Authorization: key=' . GOOGLE_API_KEY,
        'Content-Type: application/json'
    );
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
    $result = curl_exec($ch);
    if ($result === FALSE) {
        die('Curl failed: ' . curl_error($ch));
    }
    curl_close($ch);
    //var_dump($result);
    $result_decoded = json_decode($result,1);
    if($result_decoded['failure'] > 0){
        $this->collect_errors($result_decoded['results']);
    }
    $result =  json_decode($result,true);
    $result['data'] =$msg;
    $result['device id'] =$registatoin_ids;
    header('content-type: application/json');

    echo json_encode($result);
}


function collect_errors($push_response = array()){
    $counter = 0;
    foreach($push_response as $key => $response){
        if(isset($response['error'])){
            $this->api_response[$counter]['device_id'] = $this->reg_ids[$key];
            $this->api_response[$counter]['message'] = $response['error'];
            $counter++;
        }
    }
}

?>