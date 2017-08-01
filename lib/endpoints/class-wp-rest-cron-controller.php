<?php

/**
 * Access users
 */
class WP_REST_Cron_Controller extends WP_REST_Controller {

    public function __construct() {
//		echo "I am here in users"; die;
        $this->namespace = 'public';
        $this->rest_base = 'cron';

    }


    /**
     * Register the routes for the objects of the controller.
     */
    public function register_routes() {

        // start post request
        register_rest_route( $this->namespace, '/' . $this->rest_base.'/send-today-expiry-notifications', array(
            array(
                'methods'         => WP_REST_Server::CREATABLE,
                'callback'        => array( $this, 'sendTodayExpiryNotifications' ),
                'permission_callback' => array( $this, 'signatureValidityCheck' ),
                'args'            => array_merge( $this->get_endpoint_args_for_item_schema( WP_REST_Server::CREATABLE ),
                    // required params
                    array('expiry_type'    => array('required' => true,),)
                ),
            ),

        ) );

        //end post request
    }

    public function signatureValidityCheck( $request ) {

        $product = $this->prepare_item_for_database( $request );
        $validationHeader = $this->validateRequest($product);

        if($validationHeader != APP_TRUE)
            return false;
        return true;
    }


    protected function prepare_item_for_database( $request ) {
        $prepared_product = new stdClass;

        if ( isset( $request['expiry_type'] ) ) {
            $prepared_product->expiry_type = $request['expiry_type'];
        }

        if ( isset( $request['signature'] ) ) {
            $prepared_product->signature = $request['signature'];
        }

        return apply_filters( 'rest_pre_insert_user', $prepared_product, $request );
    }


    public function sendTodayExpiryNotifications( $request ) {
        global $wpdb, $api_response;

        $param = $this->prepare_item_for_database( $request );
        //print_r($param->expiry_type);exit;
        $interval_date = date('Y-m-d H:i:s');
        $flag = 0;
        $intervals = array('0','5','10');

        $interval_pattern[0]['interval'] = date('Y-m-d H:i:s');
        $interval_pattern[0]['flag'] = 0;
        $interval_pattern[5]['interval'] = date('Y-m-d H:i:s', strtotime('+5 days'));
        $interval_pattern[5]['flag'] = 1;
        $interval_pattern[10]['interval'] = date('Y-m-d H:i:s', strtotime('+10 days'));
        $interval_pattern[10]['flag'] = 1;

        if(in_array($param->expiry_type,$intervals)){
            $interval_date = $interval_pattern[$param->expiry_type]['interval'];
            $flag = $interval_pattern[$param->expiry_type]['flag'];
        }
        //$interval_date = '2017-05-17 07:36:57';

        $sp_result = $wpdb->get_results( "call get_user_subscription_expiry_by_date($flag,'$interval_date');" );
        //print_r($sp_result);exit;

        $response_json['p_message'][0]['status'] = 'subscription';
        $response_json['p_message'][0]['message'] = "Subscription expiry notification from GetZend";
        $response_json['message'] = "GetZend new message";

        $ios_devices = array();
        $android_devices = array();
        foreach($sp_result as $device){
            //print_r($device);exit;
            if($device->{'device_type'} == "android")
                $android_devices[] = $device->{'registered_id'};
            elseif($device->{'device_type'} == "ios")
                $ios_devices[] = $device->{'device_token'};
        }
        /*print_r($android_devices);
        print_r($ios_devices);exit;*/
        if(count($android_devices) >0)
            sAndroid($android_devices,$response_json);
        if(count($ios_devices) >0)
            sIos($ios_devices,$response_json);

        $result['code'] = '0';
        $result['message'] = $api_response['0'];
        $result['data'] = [];


        return $result;
    }


}
