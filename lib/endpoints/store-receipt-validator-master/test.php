<?php
require 'vendor/autoload.php';
use ReceiptValidator\GooglePlay\ServiceAccountValidator as PlayValidator;

/*
GET https://www.googleapis.com/androidpublisher/v1/applications/com.vanguardmatrix.getzend/subscriptions/subscription_monthly/purchases/laoilcjoolnkmifbkcobnikb.AO-J1Ow3VyqVVcJAaPjX92S6WgD4Dq0cSJVXKDxb-MaYTwr4BUsI2C7yIbfBeujuCGqa3NIwcRZWNRBIPYAQhEKI4Z4cy6g-04wH__NcQLt9V96Z7V1IafbtTZ14HBX_3d5Eh_lSWLMh?access_token=ya29.Ci9gAzI9Gb3uLp_nDxNe8kV3l0Hxoe2cEW1Csc25MR5TeqOcmxfWth9SjyyiH31Wsw*/
//$client_email = 'subscriptionvalidator@api-4679654566540323853-95242.iam.gserviceaccount.com';
//$p12_key_path = 'certificateValidator.p12';

// receipt data
//$package_name = 'com.getzend.get_zend';
//$product_id = 'monthly_subs';
//$purchase_token = 'fdcckdafflbjddbamgcllfap.AO-J1Oz85UbfK8VZLRHOXMNfby4JtOE_xS3QZLtjxD95zMGWvZs2DD9hS-K0IryVUvGaDhJa3NYPbu23QpqzCFbiFLybCQRBkwOZkJZpF1XqzdtVRypbCuWhD86rvqDC_vTgFtYDc3Fy';


$validator = new PlayValidator([
    'client_email' => 'subscriptionvalidator@api-4679654566540323853-95242.iam.gserviceaccount.com',
    'p12_key_path' => 'certificateValidator.p12',
]);

try {
    $response = $validator->setPackageName('com.getzend.get_zend')
        ->setProductId('monthly_subs')
        ->setPurchaseToken('nkpcfdkoalhnfbnknebccppb.AO-J1OwQIzwHvb7m52C_ZKjj9JN4SGLM1iJZgltdDiwlLiXZrTppufQi3lw9iaNY7lcDbMhvNA3ijdL3aFQcB82qCSMOjWsWl4LDupcInRdxJoL9xe2HtIreEkarnqY4LU37P0hoN9m2')
        ->validate();
} catch (Exception $e){
    var_dump($e->getMessage());
    // example message: Error calling GET ....: (404) Product not found for this application.
}

die();

/*$validator = new PlayValidator([
    'client_id' => '213705424036-qs9jp0pfg61le49efdggojql2oralmf5.apps.googleusercontent.com',
    'client_secret' => 'REWMETTKxBY0GFrpGu-QrGB3',
    'refresh_token' => '1/VdHDzxMxejwxwTK3ZtUL971q3MhYiBqB5R57gMAQPqc'
]);

try {
    $response = $validator->setPackageName('com.vanguardmatrix.getzend')
        ->setProductId('subscription_monthly')
        ->setPurchaseToken('laoilcjoolnkmifbkcobnikb.AO-J1Ow3VyqVVcJAaPjX92S6WgD4Dq0cSJVXKDxb-MaYTwr4BUsI2C7yIbfBeujuCGqa3NIwcRZWNRBIPYAQhEKI4Z4cy6g-04wH__NcQLt9V96Z7V1IafbtTZ14HBX_3d5Eh_lSWLMh')
        ->validate();
} catch (Exception $e){
    var_dump($e->getMessage());
    // example message: Error calling GET ....: (404) Product not found for this application.
}
// success
var_dump($response);*/


