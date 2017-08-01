<?php

error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 1);

$root = realpath(dirname(dirname(__FILE__)));
$library = "$root/library";

$path = array($library, get_include_path());
set_include_path(implode(PATH_SEPARATOR, $path));

require_once $root . '/vendor/autoload.php';

use ReceiptValidator\GooglePlay\ServiceAccountValidator as PlayValidator;

// google authencation 
$client_email = 'kb-450@api-4679654566540323853-95242.iam.gserviceaccount.com';
$p12_key_path = 'Google Play Android Developer-59624591ad84.p12';

// receipt data
$package_name = 'com.getzend.get_zend';
$product_id = 'yearly_subs';
$purchase_token = 'anbfjddhhdbkdopcgceckbmg.AO-J1OwwnU9Gs07MFQ-aHPscpB2ataEcBCdAxDcN5RDv0UDj9_Uum2Za6mLknxd5O7RcTte7FwD1__GNLDiD54YAU8ZBX-JSTIY-oTISbMtTQf9ij8ln-fn5BG-bP8ecUHVIvp4bbD9c';

$validator = new PlayValidator(['client_email' => $client_email, 'p12_key_path' => $p12_key_path]);

try {
  $response = $validator->setPackageName($package_name)->setProductId($product_id)->setPurchaseToken($purchase_token)->validate();
} catch (Exception $e) {
  echo 'got error = ' . $e->getMessage() . PHP_EOL;
    var_dump($e);
}

var_dump($response);
