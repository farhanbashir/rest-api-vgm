<?php

/**
 * Access users
 */
$root = realpath(dirname(dirname(__FILE__)));
$library = "$root/library";

$path = array($library, get_include_path());
set_include_path(implode(PATH_SEPARATOR, $path));
//echo $root . '/endpoints/store-receipt-validator-master/vendor/autoload.php';
//die();
require_once $root . '/endpoints/store-receipt-validator-master/vendor/autoload.php';

use ReceiptValidator\GooglePlay\ServiceAccountValidator as PlayValidator;

class WP_REST_Users_Controller extends WP_REST_Controller
{

    public function __construct()
    {
//		echo "I am here in users"; die;
        $this->namespace = 'public';
        $this->rest_base = 'user';

        $this->languageValue = array('french' => 'french', 'fr' => 'french');
        $this->languageList = array('french', 'fr');
    }

    /**
     * Register the routes for the objects of the controller.
     */
    public function register_routes()
    {
        //start testing post request
        register_rest_route($this->namespace, '/' . $this->rest_base . '/test-push', array(
            array(
                'methods' => WP_REST_Server::CREATABLE,
                'callback' => array($this, 'test_push'),
                //'permission_callback' => array($this, 'signatureValidityCheck'),
                // 'args' => array_merge($this->get_endpoint_args_for_item_schema(WP_REST_Server::CREATABLE),
                //     // required params
                //     array('user_id' => array('required' => true,),),
                //     array('offset' => array('required' => true,),),
                //     array('signature' => array('required' => true,),)
                // ),
            ),

        ));
        //end testing post request
        // start post request
        register_rest_route($this->namespace, '/' . $this->rest_base . '/register-user', array(
                array(
                    'methods' => WP_REST_Server::CREATABLE,
                    'callback' => array($this, 'registerUser'),
                    'permission_callback' => array($this, 'signatureValidityCheck'),
                    'args' => array_merge($this->get_endpoint_args_for_item_schema(WP_REST_Server::CREATABLE),
                        // required params
                        array('fb_id' => array('required' => true,),),
                        array('device_id' => array('required' => true,),),
                        array('device_type' => array('required' => true,),),
                        array('language' => array('required' => true,),),
                        array('first_name' => array('required' => true,),),
                        array('last_name' => array('required' => true,),),
                        array('image_url' => array('required' => true,),),
                        array('email' => array('required' => true,),),
                        array('extra' => array('required' => true,),),
                        array('user_id' => array('required' => true,),),
                        array('signature' => array('required' => true,),)
                    ),
                ),

            ));

        //end post request

        // start post request
        register_rest_route($this->namespace, '/' . $this->rest_base . '/register-user-ios', array(
            array(
                'methods' => WP_REST_Server::CREATABLE,
                'callback' => array($this, 'registerUserIos'),
                'permission_callback' => array($this, 'signatureValidityCheck'),
                'args' => array_merge($this->get_endpoint_args_for_item_schema(WP_REST_Server::CREATABLE),
                    // required params
                    array('device_id' => array('required' => true,),),
                    array('device_type' => array('required' => true,),),
                    array('language' => array('required' => true,),),
                    array('first_name' => array('required' => true,),),
                    array('last_name' => array('required' => true,),),
                    array('image_url' => array('required' => true,),),
                    array('email' => array('required' => true,),),
                    array('extra' => array('required' => true,),),
                    array('user_id' => array('required' => true,),),
                    array('signature' => array('required' => true,),)
                ),
            ),

        ));

        //end post request



        // start post request
        register_rest_route($this->namespace, '/' . $this->rest_base . '/update-user-profile', array(
                array(
                    'methods' => WP_REST_Server::CREATABLE,
                    'callback' => array($this, 'updateUserProfile'),
                    'permission_callback' => array($this, 'signatureValidityCheck'),
                    'args' => array_merge($this->get_endpoint_args_for_item_schema(WP_REST_Server::CREATABLE),
                        // required params
                        array('user_id' => array('required' => true,),),
                        array('first_name' => array('required' => true,),),
                        array('last_name' => array('required' => true,),),
                        array('email' => array('required' => true,),),
                        array('extra' => array('required' => true,),),
                        array('signature' => array('required' => true,),)
                    ),
                ),

            ));

        //end post request

        // start post request
        register_rest_route($this->namespace, '/' . $this->rest_base . '/get-user-profile', array(
                array(
                    'methods' => WP_REST_Server::CREATABLE,
                    'callback' => array($this, 'getUserProfile'),
                    'permission_callback' => array($this, 'signatureValidityCheck'),
                    'args' => array_merge($this->get_endpoint_args_for_item_schema(WP_REST_Server::CREATABLE),
                        // required params
                        array('user_id' => array('required' => true,),)
                    ),
                ),

            ));

        //end post request

        // start post request
        register_rest_route($this->namespace, '/' . $this->rest_base . '/get-multilingual-app-labels', array(
                array(
                    'methods' => WP_REST_Server::CREATABLE,
                    'callback' => array($this, 'getAppLabels'),
                    'permission_callback' => array($this, 'signatureValidityCheck'),
                    'args' => array_merge($this->get_endpoint_args_for_item_schema(WP_REST_Server::CREATABLE),
                        // required params
                        array('user_id' => array('required' => true,),),
                        array('signature' => array('required' => true,),)
                    ),
                ),

            ));

        //end post request

     // start post request
        register_rest_route($this->namespace, '/' . $this->rest_base . '/check-new-user-subscription', array(
                array(
                    'methods' => WP_REST_Server::CREATABLE,
                    'callback' => array($this, 'checkNewUserSubscription'),
                    'permission_callback' => array($this, 'signatureValidityCheck'),
                    'args' => array_merge($this->get_endpoint_args_for_item_schema(WP_REST_Server::CREATABLE),
                        // required params
                        array('user_id' => array('required' => true,),),
                        array('device_id' => array('required' => true,),),
                        array('signature' => array('required' => true,),)
                    ),
                ),

            ));

        //end post request

        // start post request
        register_rest_route($this->namespace, '/' . $this->rest_base . '/get-multilingual-app-labels-by-ids', array(
            array(
                'methods' => WP_REST_Server::CREATABLE,
                'callback' => array($this, 'getAppLabelsByIds'),
                'permission_callback' => array($this, 'signatureValidityCheck'),
                'args' => array_merge($this->get_endpoint_args_for_item_schema(WP_REST_Server::CREATABLE),
                    // required params
                    array('user_id' => array('required' => true,),),
                    array('signature' => array('required' => true,),)
                ),
            ),

        ));

        //end post request

        // start post request
        register_rest_route($this->namespace, '/' . $this->rest_base . '/get-multilingual-feel-like-menu', array(
                array(
                    'methods' => WP_REST_Server::CREATABLE,
                    'callback' => array($this, 'getMultilingualFeelLikeMenu'),
                    'permission_callback' => array($this, 'signatureValidityCheck'),
                    'args' => array_merge($this->get_endpoint_args_for_item_schema(WP_REST_Server::CREATABLE),
                        // required params
                        array('user_id' => array('required' => true,),),
                        array('signature' => array('required' => true,),)
                    ),
                ),

            ));

        //end post request

        // start post request
        register_rest_route($this->namespace, '/' . $this->rest_base . '/update-user-preference', array(
                array(
                    'methods' => WP_REST_Server::CREATABLE,
                    'callback' => array($this, 'updateUserPreference'),
                    'permission_callback' => array($this, 'signatureValidityCheck'),
                    'args' => array_merge($this->get_endpoint_args_for_item_schema(WP_REST_Server::CREATABLE),
                        // required params
                        array('user_id' => array('required' => true,),),
                        array('preference_id' => array('required' => true,),),
                        array('preference_type' => array('required' => true,),),
                        array('value' => array('required' => true,),),
                        array('signature' => array('required' => true,),)
                    ),
                ),

            ));

        //end post request

        // start post request
        register_rest_route($this->namespace, '/' . $this->rest_base . '/get-user-preference', array(
                array(
                    'methods' => WP_REST_Server::CREATABLE,
                    'callback' => array($this, 'getUserPreference'),
                    'permission_callback' => array($this, 'signatureValidityCheck'),
                    'args' => array_merge($this->get_endpoint_args_for_item_schema(WP_REST_Server::CREATABLE),
                        // required params
                        array('user_id' => array('required' => true,),),
                        array('signature' => array('required' => true,),)
                    ),
                ),

            ));

        //end post request

        // start post request
        register_rest_route($this->namespace, '/' . $this->rest_base . '/create-user-subscription', array(
                array(
                    'methods' => WP_REST_Server::CREATABLE,
                    'callback' => array($this, 'createUserSubscription'),
                    'permission_callback' => array($this, 'signatureValidityCheck'),
                    'args' => array_merge($this->get_endpoint_args_for_item_schema(WP_REST_Server::CREATABLE),
                        // required params
                        array('user_id' => array('required' => true,),),
                        array('device_id' => array('required' => true,),),
                        array('subscription_type' => array('required' => true,),),
                        array('signature' => array('required' => true,),)
                    ),
                ),

            ));

        //end post request

        // start post request
        register_rest_route($this->namespace, '/' . $this->rest_base . '/update-user-subscription', array(
                array(
                    'methods' => WP_REST_Server::CREATABLE,
                    'callback' => array($this, 'updateUserSubscription'),
                    'permission_callback' => array($this, 'signatureValidityCheck'),
                    'args' => array_merge($this->get_endpoint_args_for_item_schema(WP_REST_Server::CREATABLE),
                        // required params
                        array('user_id' => array('required' => true,),),
                        array('extra' => array('required' => true,),),
                        array('subscription_type' => array('required' => true,),),
                        array('device_type' => array('required' => true,),),
                        array('signature' => array('required' => true,),)
                    ),
                ),

            ));

        //end post request

 // start post request
        register_rest_route($this->namespace, '/' . $this->rest_base . '/update_user_subscription_expiry_by_device_id', array(
                array(
                    'methods' => WP_REST_Server::CREATABLE,
                    'callback' => array($this, 'updateUserSubscriptionios'),
                    'permission_callback' => array($this, 'signatureValidityCheck'),
                    'args' => array_merge($this->get_endpoint_args_for_item_schema(WP_REST_Server::CREATABLE),
                        // required params
                        array('device_id' => array('required' => true,),),
                        array('extra' => array('required' => true,),),
                        array('subscription_type' => array('required' => true,),),
                        array('device_type' => array('required' => true,),),
                        array('signature' => array('required' => true,),)
                    ),
                ),

            ));

        //end post request


        // start post request
        register_rest_route($this->namespace, '/' . $this->rest_base . '/update-subscription', array(
                array(
                    'methods' => WP_REST_Server::CREATABLE,
                    'callback' => array($this, 'updateSubscription'),
                    'permission_callback' => array($this, 'signatureValidityCheck'),
                    'args' => array_merge($this->get_endpoint_args_for_item_schema(WP_REST_Server::CREATABLE),
                        // required params
                        array('user_id' => array('required' => true,),),
                        array('extra' => array('required' => true,),),
                        array('subscription_type' => array('required' => true,),),
                        array('device_type' => array('required' => true,),),
                        array('signature' => array('required' => true,),)
                    ),
                ),

            ));

        //end post request
        // start post request
        register_rest_route($this->namespace, '/' . $this->rest_base . '/get-user-subscription', array(
                array(
                    'methods' => WP_REST_Server::CREATABLE,
                    'callback' => array($this, 'getUserSubscription'),
                    'permission_callback' => array($this, 'signatureValidityCheck'),
                    'args' => array_merge($this->get_endpoint_args_for_item_schema(WP_REST_Server::CREATABLE),
                        // required params
                        array('user_id' => array('required' => true,),),
                        array('signature' => array('required' => true,),)
                    ),
                ),

            ));

        //end post request


        // start post request
        register_rest_route($this->namespace, '/' . $this->rest_base . '/get-user-subscription-by-device-id', array(
            array(
                'methods' => WP_REST_Server::CREATABLE,
                'callback' => array($this, 'getUserSubscriptionByDeviceId'),
                'permission_callback' => array($this, 'signatureValidityCheck'),
                'args' => array_merge($this->get_endpoint_args_for_item_schema(WP_REST_Server::CREATABLE),
                    // required params
                    array('device_id' => array('required' => true,),),
                    array('signature' => array('required' => true,),)
                ),
            ),

        ));

        //end post request

        // start post request
        register_rest_route($this->namespace, '/' . $this->rest_base . '/update-user-renewal', array(
                array(
                    'methods' => WP_REST_Server::CREATABLE,
                    'callback' => array($this, 'updateUserRenewal'),
                    'permission_callback' => array($this, 'signatureValidityCheck'),
                    'args' => array_merge($this->get_endpoint_args_for_item_schema(WP_REST_Server::CREATABLE),
                        // required params
                        array('user_id' => array('required' => true,),),
                        array('auto_renewal' => array('required' => true,),),
                        array('signature' => array('required' => true,),)
                    ),
                ),

            ));

        //end post request

        // start post request
        register_rest_route($this->namespace, '/' . $this->rest_base . '/get-languages', array(
                array(
                    'methods' => WP_REST_Server::CREATABLE,
                    'callback' => array($this, 'getLanguages'),
                    'permission_callback' => array($this, 'signatureValidityCheck'),
                    'args' => array_merge($this->get_endpoint_args_for_item_schema(WP_REST_Server::CREATABLE),
                        // required params
                        array('user_id' => array('required' => true,),),
                        array('offset' => array('required' => true,),),
                        array('signature' => array('required' => true,),)
                    ),
                ),

            ));

        //end post request

        // start post request
        register_rest_route($this->namespace, '/' . $this->rest_base . '/create-new-user', array(
            array(
                'methods' => WP_REST_Server::CREATABLE,
                'callback' => array($this, 'createNewUser'),
                'permission_callback' => array($this, 'signatureValidityCheck'),
                'args' => array_merge($this->get_endpoint_args_for_item_schema(WP_REST_Server::CREATABLE),
                    // required params
                    array('user_id' => array('required' => true,),),
                    array('device_id' => array('required' => true,),),
                    array('device_type' => array('required' => true,),),
                    array('gcm_id' => array('required' => true,),),
                    array('signature' => array('required' => true,),)
                ),
            ),

        ));

        //end post request

    // start post request
        register_rest_route($this->namespace, '/' . $this->rest_base . '/update-notification-logs', array(
            array(
                'methods' => WP_REST_Server::CREATABLE,
                'callback' => array($this, 'updateNotificationLogs'),
                'permission_callback' => array($this, 'signatureValidityCheck'),
                'args' => array_merge($this->get_endpoint_args_for_item_schema(WP_REST_Server::CREATABLE),
                    // required params
                    array('user_id' => array('required' => true,),),
                    array('notification_id' => array('required' => true,),),
                    array('signature' => array('required' => true,),)
                ),
            ),

        ));

        //end post request


        // start post request
        register_rest_route($this->namespace, '/' . $this->rest_base . '/update-user-image', array(
                /*array(
                    'methods'         => WP_REST_Server::READABLE,
                    'callback'        => array( $this, 'getUserItems' ),
                    'permission_callback' => array( $this, 'signatureValidityCheck' ),
                    'args'            => array_merge( $this->get_endpoint_args_for_item_schema( WP_REST_Server::CREATABLE ),
                    // required params
                            array('user_id'    => array('required' => true,),),
                            //array('image_url'    => array('required' => true,),),
                            array('signature'    => array('required' => true,),)
                    ),
                ),*/
                array(
                    'methods' => WP_REST_Server::EDITABLE,
                    'callback' => array($this, 'updateUserImage'),
                    'permission_callback' => array($this, 'signatureValidityCheck'),
                    'args' => array_merge($this->get_endpoint_args_for_item_schema(WP_REST_Server::CREATABLE),
                        // required params
                        array('user_id' => array('required' => true,),),
                        //		array('image_url'    => array('required' => true,),),
                        array('signature' => array('required' => true,),)
                    ),
                ),

            ));

        //end post request
    }

    public function test_push($request)
    {
        $response_json['p_message'][0]['status'] = 'create';
        $response_json['p_message'][0]['message'] = "Welcome to GetZend, Thank you for subscribing";
        $response_json['message'] = "Welcome to GetZend, Thank you for subscribing";
        sendUserNotification(12, $response_json);
        //sIos(['082871DF2176A1F79A5CD198AE7EC1D26F4FD10CFA1A4D65D968A9190698BD71'], $response_json);
        debug('here',1);
    }

    public function signatureValidityCheck($request)
    {

        $product = $this->prepare_item_for_database($request);
        $validationHeader = $this->validateRequest($product);

        if ($validationHeader != APP_TRUE)
            return false;
        return true;
    }

    protected function prepare_item_for_database($request)
    {
        $prepared_product = new stdClass;

        if (isset($request['user_id'])) {
            $prepared_product->user_id = $request['user_id'];
        }
        if (isset($request['notification_id'])) {
            $prepared_product->notification_id = $request['notification_id'];
        }
        if (isset($request['target_ids'])) {
            $prepared_product->target_ids = $request['target_ids'];
        }

        if (isset($request['offset'])) {
            $prepared_product->offset = $request['offset'];
        }

        if (isset($request['fb_id'])) {
            $prepared_product->fb_id = $request['fb_id'];
        }

        if (isset($request['device_id'])) {
            $prepared_product->device_id = $request['device_id'];
        }

        if (isset($request['language'])) {
            $prepared_product->language = $request['language'];
        }

        if (isset($request['subscription_type'])) {
            $prepared_product->subscription_type = $request['subscription_type'];
        }

        if (isset($request['extra'])) {
            $prepared_product->extra = $request['extra'];
        }

        if (isset($request['device_type'])) {
            $prepared_product->device_type = $request['device_type'];
        }

        if (isset($request['preference_id'])) {
            $prepared_product->preference_id = $request['preference_id'];
        }

        if (isset($request['value'])) {
            $prepared_product->value = $request['value'];
        }

        if (isset($request['preference_type'])) {
            $prepared_product->preference_type = $request['preference_type'];
        }

        if (isset($request['first_name'])) {
            $prepared_product->first_name = $request['first_name'];
        }

        if (isset($request['last_name'])) {
            $prepared_product->last_name = $request['last_name'];
        }

        if (isset($request['image_url'])) {
            $prepared_product->image_url = $request['image_url'];
        }

        if (isset($request['email'])) {
            $prepared_product->email = $request['email'];
        }

        if (isset($request['auto_renewal'])) {
            $prepared_product->auto_renewal = $request['auto_renewal'];
        }
        if (isset($request['expiry_date'])) {
            $prepared_product->expiry_date = $request['expiry_date'];
        }
        if (isset($request['gcm_id'])) {
            $prepared_product->expiry_date = $request['gcm_id'];
        }
        if (isset($request['limit'])) {
            $prepared_product->limit = $request['limit'];
        }
        if (isset($request['device_id'])) {
            $prepared_product->device_id = $request['device_id'];
        }
        if (isset($request['device_token'])) {
            $prepared_product->device_token = $request['device_token'];
        }
        if (isset($request['signature'])) {
            $prepared_product->signature = $request['signature'];
        }

        return apply_filters('rest_pre_insert_user', $prepared_product, $request);
    }

    public function registerUser($request)
    {
        global $wpdb, $api_response;

        $param = $this->prepare_item_for_database($request);
        $isEmailVerified = (empty($param->email)) ? 0 : 1;
        $gcmid =$request['gcm_id'];

        $sp_result = $wpdb->get_results("call user_create('$param->fb_id','$param->device_id','$param->device_type','$param->language','$param->extra','$param->first_name','$param->last_name','$param->image_url','$param->email','$isEmailVerified','$gcmid');");


        $response = $this->prepare_user_item($sp_result, $request);
        $response = rest_ensure_response($response);
        if ($sp_result[0]->result == 'user_already_exist_record_updated') {

            $result['code'] = "114";
            $result['message'] = $api_response['114'];
            $result['data'] = $response->data;
            return $result;

        }
       // echo "call create_default_user_preferences_relation(" . $sp_result[0]->id . ")";
        //die();
      $sp_preferences_result = $wpdb->get_results("call create_default_user_preferences_relation(" . $sp_result[0]->id . ")");
       // echo "call create_default_user_preferences_relation(" . $sp_result[0]->id . ")";
       // die();

        $language = $this->languageValue;
        $param->language = strtolower($param->language);
        if (in_array($param->language, $this->languageList)) {
            foreach ($sp_preferences_result as $sp_preference) {
                if (strtolower($sp_preference->title) == 'language') {
                     $sp_preferences_result = $wpdb->get_results("call update_user_preference_value(" . $sp_result[0]->id . ",$sp_preference->preference_id,'" . $language[$param->language] . "')");
                }
            }


        }
      /*  $response = $this->prepare_user_item( $sp_result, $request );
        $response = rest_ensure_response( $response );*/


        if (count($response->data) == 0) {

            $result['code'] = "106";
            $result['message'] = $api_response['106'];
            $result['data'] = $response->data;

        } else {

            $result['code'] = '0';
            $result['message'] = $api_response['0'];
            $result['data'] = $response->data;

        }
        return $result;
    }

    public function registerUserIos($request)
    {
        global $wpdb, $api_response;

        $param = $this->prepare_item_for_database($request);
        $isEmailVerified = (empty($param->email)) ? 0 : 1;
        $gcmid =$request['gcm_id'];

        $sp_result = $wpdb->get_results("call user_create_ios('$param->device_id','$param->device_token','$param->device_type','$param->language','$param->extra','$param->first_name','$param->last_name','$param->image_url','$param->email','$isEmailVerified','$gcmid');");


       /* echo "call user_create_ios('$param->device_id','$param->device_type','$param->language','$param->extra','$param->first_name','$param->last_name','$param->image_url','$param->email','$isEmailVerified','$gcmid')";
        die();*/
        $response = $this->prepare_user_item($sp_result, $request);
        $response = rest_ensure_response($response);
        if ($sp_result[0]->result == 'user_already_exist_record_updated') {

            $result['code'] = "114";
            $result['message'] = $api_response['114'];
            $result['data'] = $response->data;
            return $result;

        }
       // echo "call create_default_user_preferences_relation(" . $sp_result[0]->id . ")";
        //die();
      $sp_preferences_result = $wpdb->get_results("call create_default_user_preferences_relation(" . $sp_result[0]->id . ")");
       // echo "call create_default_user_preferences_relation(" . $sp_result[0]->id . ")";
       // die();

        $language = $this->languageValue;
        $param->language = strtolower($param->language);
        if (in_array($param->language, $this->languageList)) {
            foreach ($sp_preferences_result as $sp_preference) {
                if (strtolower($sp_preference->title) == 'language') {
                     $sp_preferences_result = $wpdb->get_results("call update_user_preference_value(" . $sp_result[0]->id . ",$sp_preference->preference_id,'" . $language[$param->language] . "')");
                }
            }


        }
      /*  $response = $this->prepare_user_item( $sp_result, $request );
        $response = rest_ensure_response( $response );*/

     /// var_dump($response);die();

        if (count($response->data) == 0) {

            $result['code'] = "106";
            $result['message'] = $api_response['106'];
            $result['data'] = $response->data;

        } else {

            $result['code'] = '0';
            $result['message'] = $api_response['0'];
            $result['data'] = $response->data;

        }
        return $result;
    }

    public function prepare_user_item($product, $request)
    {
        $i = 0;
        $ArrayList = [];

        foreach ($product as $item) {
            $tmp = $item;

            $ArrayList[$i]['user_id'] = $tmp->id;
            if (isset($tmp->fb_id))
                $ArrayList[$i]['fb_id'] = $tmp->fb_id;
            if (isset($tmp->email))
                $ArrayList[$i]['email'] = $tmp->email;
            if (isset($tmp->is_subscribed))
                $ArrayList[$i]['is_subscribed'] = $tmp->is_subscribed;
            if (isset($tmp->is_email_verified))
                $ArrayList[$i]['is_email_verified'] = $tmp->is_email_verified;
            if (isset($tmp->extra))
                $ArrayList[$i]['extra'] = $tmp->extra;
            if (isset($tmp->first_name))
                $ArrayList[$i]['first_name'] = $tmp->first_name;
            if (isset($tmp->last_name))
                $ArrayList[$i]['last_name'] = $tmp->last_name;
            if (isset($tmp->image_url))
                $ArrayList[$i]['image_url'] = $tmp->image_url;
            if (isset($tmp->language))
                $ArrayList[$i]['language'] = $tmp->language;
            if (isset($tmp->subscription_cancel))
                $ArrayList[$i]['subscription_cancel'] = $tmp->subscription_cancel;
            if (isset($tmp->created_at))
                $ArrayList[$i]['created_at'] = $tmp->created_at;
            if (isset($tmp->updated_at))
                $ArrayList[$i]['updated_at'] = $tmp->updated_at;
           /* if (isset($tmp->expiry_date))*/


                $ArrayList[$i]['expiry_date'] = $tmp->expiry_date;

            $i++;
        }

        return $ArrayList;

    }

    public function updateUserProfile($request)
    {
        global $wpdb, $api_response;

        $param = $this->prepare_item_for_database($request);
        //print_r($param);exit;

        $sp_get_result = $wpdb->get_results("call get_user_profile('$param->user_id');");
        //print_r($sp_get_result[0]);exit;

        if (((!$sp_get_result[0]->is_email_verified) || ($sp_get_result[0]->email != $param->email)) && !empty($param->email)) {
            $code = md5(APP_SALT . $param->user_id . $param->email);
            $web_url = WP_SITEURL . "/email-verification/?$code";
            $subject = 'GetZend: Verify email address';
            $mail_content = $this->getMailTemplate('email-verification-template', $sp_get_result[0]->language);
            //print "$mail_content\n";exit;
            $mail_content = str_replace('<!--name-->', $sp_get_result[0]->first_name, $mail_content);
            $mail_content = str_replace('<!--link-->', $web_url, $mail_content);
            $is_send = $this->api_mail($param->email, $subject, $mail_content);
            $wpdb->get_results("update gz_users set email_activation_key = '$code', is_email_verified = 0 where id = $param->user_id");
        }

        //exit;


        $sp_result = $wpdb->get_results("call  update_user_profile('$param->user_id','$param->first_name','$param->last_name','$param->email','$param->extra');");

        if (isset($sp_result[0]->result)) {

            $result['code'] = "108";
            $result['message'] = $api_response['108'];
            $result['data'] = $sp_result;

            return $result;
        }

        $response = $this->prepare_user_item($sp_result, $request);
        $response = rest_ensure_response($response);


        if (count($response->data) == 0) {

            $result['code'] = "108";
            $result['message'] = $api_response['108'];
            $result['data'] = $response->data;

        } else {

            $result['code'] = '0';
            $result['message'] = $api_response['0'];
            $result['data'] = $response->data;

        }
        return $result;
    }

    public function getUserItems($request)
    {
        $body = $request->get_body();

        //print_r($body);
        exit;
    }

    public function updateUserImage($request)
    {
        global $wpdb, $api_response;

        $files = $request->get_file_params();
        //$headers = $request->get_headers();
        //$body = $request->get_body();
        $upload_dir = wp_upload_dir();
        $file_info = array();
        foreach ($files as $file) {
            $file_info = $file;
        }

        $param = $this->prepare_item_for_database($request);
        $file_info['name'] = explode('.', $file_info['name']);
        $file_path = md5($param->user_id . $file_info['name'][0] . time()) . '.' . $file_info['name'][1];
        $db_path = '/uploads' . $upload_dir['subdir'] . '/' . $file_path;
        $converted = move_uploaded_file($file_info['tmp_name'], $upload_dir['path'] . '/' . $file_path);

        $wpdb->get_results("call update_user_profile_image_url('$param->user_id','$db_path');");
        $sp_get_result = $wpdb->get_results("call get_user_profile('$param->user_id');");

        $response = $this->prepare_user_item($sp_get_result, $request);
        $response = rest_ensure_response($response);


        if (count($response->data) == 0) {

            $result['code'] = "108";
            $result['message'] = $api_response['108'];
            $result['data'] = $response->data;

        } else {

            $result['code'] = '0';
            $result['message'] = $api_response['0'];
            $result['data'] = $response->data;

        }
        return $result;
    }

    public function getUserProfile($request)
    {



        global $wpdb, $api_response;
       /// $test ='sssss';
      // echo dirname(__FILE__) ;

            $param = $this->prepare_item_for_database($request);
      // echo  $fullsize_path = get_attached_file('GooglePlayAndroidDeveloper-59624591ad84.p12' );
        //echo realpath('GooglePlayAndroidDeveloper-59624591ad84.p12') . PHP_EOL;
     // die();

        $client_email = 'kb-450@api-4679654566540323853-95242.iam.gserviceaccount.com';
        $p12_key_path = dirname(__FILE__) .'/GooglePlayAndroidDeveloper-59624591ad84.p12';
       // echo $p12_key_path;
       // die();
        $sp_result = $wpdb->get_results("call get_transaction_detail_by_user_id('$param->user_id');");

        for($i=0;$i<count($sp_result);$i++){

           $getarray =  json_decode($sp_result[$i]->extra);

            if($getarray->packageName!=''){

              //  echo 'no package found'.$getarray->packageName;
              // die();

//                echo $getarray->packageName;
//                echo '<br>';
//                echo $getarray->productId;
//                echo '<br>';
//                echo $getarray->purchaseToken;
//                die();

                /* echo $getarray->packageName;

                 die();*/
                $package_name =  $getarray->packageName;
                $product_id = $getarray->productId;
                $purchase_token =  $getarray->purchaseToken;



              //  $product_id = 'monthly_subs';
               /// $purchase_token = 'bpgjfngabimmhhofljgciifm.AO-J1OwR1PMYIQb_fi-d1Vni8ODfvCL5ODfEPCuvxhab7RCtpdzMsL5uDztlziNSohU3fe5uYdYLmihrDfyyCJ0kOviL9sX8zSOZOi9rP5f7mOn4BU-0b2hO0OzhZLRZXwIL3RjxOprj';

                //echo $getarray->purchaseToken;
                // die();

                try {

                    $validator = new PlayValidator(['client_email' => $client_email, 'p12_key_path' => $p12_key_path]);

                    $responsex = $validator->setPackageName($package_name)->setProductId($product_id)->setPurchaseToken($purchase_token)->validate();


                    $arrayx =  (array) $responsex;
                    /*function getMData()
                    {
                        return $this->modelData;
                    }*/


//var_dump($response->getMData());
//print_r($arrayx);

                    $apierror ='';
                    $autorenew = 0;
                    $dateInLocal ='';
                    foreach ($arrayx as $item) {
                        //  echo $item;
                        foreach ($item as $key => $value       ) {
                            // echo '"' . $key . '" = ';
                            if($key=="autoRenewing") {
                                   (int)$value;
                              //  echo 'aaaaaaaaaa-'.$value.'-aaaaaaaaaa';
                                if($value==""){
                                    $autorenew = 1;
                      //  echo "<br>false  push noti now <br>";
                                }
                                else{
                                    $autorenew = 0;
                                //   echo "<br>true push noti now <br>";
                                    //  echo(int)$value . "<br>";
                                }
                            }
                            if($key=="expiryTimeMillis"){
                              //  echo $value.'----';
                                $timestamp=$value;
                                $mil = $value;
                                $seconds = $mil / 1000;
                                $dateInLocal = date("Y-m-d H:i:s", $seconds);
                               // $dateInLocal =date('Y-m-d H:i:s', $timestamp);


                               //echo $autorenew;
                            }
                          // echo $item.'<br>';
                        }
                    }
              //  die();
                   // echo $autorenew;
                   // die();
                    $sp_result = $wpdb->get_results("call update_user_subscription_by_user_id($param->user_id,'$dateInLocal',$autorenew);");
                   ///return "call update_user_subscription_by_user_id($param->user_id,'$dateInLocal',$autorenew);";

                } catch (Exception $e) {
                 //  echo 'got error = ' . $e->getMessage() . PHP_EOL;
                    $apierror ='   '.$e->getMessage();

                }
            }






        }
       // die();








       // $param = $this->prepare_item_for_database($request);

        $sp_result = $wpdb->get_results("call get_user_profile('$param->user_id');");




        if (isset($sp_result[0]->result)) {

            $result['code'] = "107";
            $result['message'] = $api_response['107'];
            $result['data'] = $sp_result;

            return $result;
        }
        //print_r($sp_result);
        $response = $this->prepare_user_item($sp_result, $request);
        $response = rest_ensure_response($response);
      /*  var_dump($response->data);
        die;*/

        if (count($response->data) == 0) {

            $result['code'] = "107";
            $result['message'] = $api_response['107'];
            $result['data'] = $response->data;

        } else {

            $result['code'] = '0';
            $result['message'] = $api_response['0'].$apierror;
            $result['data'] = $response->data;

        }
        return $result;
    }

    public function getAppLabels($request)
    {
        global $wpdb, $api_response;

        $param = $this->prepare_item_for_database($request);
        $sp_result = $wpdb->get_results("call get_multilingual_labels();");
        $response = $this->prepare_multilingual_labels($sp_result, $request);
        $response = rest_ensure_response($response);


        if (count($response->data) == 0) {

            $result['code'] = "100";
            $result['message'] = $api_response['100'];
            $result['data'] = $response->data;

        } else {

            $result['code'] = '0';
            $result['message'] = $api_response['0'];
            $result['data'] = $response->data;

        }
        return $result;
    }


    public function checkNewUserSubscription($request)
    {
        global $wpdb, $api_response;

        $param = $this->prepare_item_for_database($request);
        $sp_result = $wpdb->get_results("call check_new_user_subscription_expiry('$param->device_id');");

        $response = rest_ensure_response($sp_result);
       // echo $sp_result[0]->result;

       // var_dump($response->data);

        if ($sp_result[0]->result == 'account_expired') {

            $result['code'] = "1";
            $result['message'] = $sp_result[0]->result;
            $result['data'] = $response->data;

        } else {

            $result['code'] = '0';
            $result['message'] = $api_response['0'];
            $result['data'] = $response->data;

        }
        return $result;
    }



    public function getAppLabelsByIds($request)
    {
        global $wpdb, $api_response;

        $param = $this->prepare_item_for_database($request);
        $sp_result = $wpdb->get_results("call get_multilingual_labels_updated_ID('$param->target_ids',$param->offset,100);");
        $response = $this->prepare_multilingual_labels($sp_result, $request);
        $response = rest_ensure_response($response);


        if (count($response->data) == 0) {

            $result['code'] = "100";
            $result['message'] = $api_response['100'];
            $result['data'] = $response->data;

        } else {

            $result['code'] = '0';
            $result['message'] = $api_response['0'];
            $result['data'] = $response->data;

        }
        return $result;
    }

    public function prepare_multilingual_labels($product, $request)
    {
        $i = 0;
        $ArrayList = [];

        foreach ($product as $item) {
            $tmp = $item;

            $ArrayList[$tmp->key]['id'] = $tmp->id;
            $ArrayList[$tmp->key]['title'] = languageManager($tmp->post_title);
            $i++;
        }

        return $ArrayList;

    }

    public function getMultilingualFeelLikeMenu($request)
    {
        global $wpdb, $api_response;

        $current_date = date('Y-m-d H:i:s');
        $param = $this->prepare_item_for_database($request);
        $is_subscribed = 1;
        $sp_subscribe_result = $wpdb->get_results("call get_subscribed_user_check($param->user_id,'$current_date');");

        if ($sp_subscribe_result[0]->status == 'no_user_exist_or_subcription_expired') {
            $is_subscribed = 0;
        }

        $sp_feel_result = $wpdb->get_results("CALL get_all_data_by_post_type('feel',0,100);");
        //print_r($sp_feel_result);
        foreach ($sp_feel_result as $sp_feel) {
            //print_r($sp_feel);exit;
            $sp_feel->post_title = languageManager($sp_feel->post_title);
            $sp_feel->description = languageManager($sp_feel->description);

            //if($is_subscribed){
            if (preg_match('/Subscribed Length=\s*(\d+)\s*/', $sp_feel->post_value, $matches)) {
                $sp_feel->subscribed_duration = $matches[1];
            } else {
                $sp_feel->subscribed_duration = 0;
            }
            //}else{
            if (preg_match('/Unsubscribed Length=\s*(\d+)\s*/', $sp_feel->post_value, $matches)) {
                $sp_feel->unsubscribed_duration = $matches[1];
            } else {
                $sp_feel->unsubscribed_duration = 0;
            }
            //}
            unset($sp_feel->term_id);
            unset($sp_feel->data);
            unset($sp_feel->post_value);
            unset($sp_feel->demo);
            unset($sp_feel->live_url);
            unset($sp_feel->cover);
            unset($sp_feel->category_value);
            unset($sp_feel->category);
        }

        $response = rest_ensure_response($sp_feel_result);


        if (count($response->data) == 0) {

            $result['code'] = "100";
            $result['message'] = $api_response['100'];
            $result['data'] = $response->data;

        } else {

            $result['code'] = '0';
            $result['message'] = $api_response['0'];
            $result['data'] = $response->data;

        }
        return $result;
    }

    public function updateUserPreference($request)
    {
        global $wpdb, $api_response;

        $param = $this->prepare_item_for_database($request);

        if (strtolower($param->preference_type) == 'language') {
            $param->value = strtolower($param->value);
            $language = $this->languageValue;
            if (in_array($param->value, $this->languageList)) {
                $param->value = $language[$param->value];
            } else {
                $param->value = 'english';
            }
        }

        $sp_result = $wpdb->get_results("call update_user_preference_value($param->user_id,$param->preference_id,'$param->value');");

        $response = rest_ensure_response($sp_result);


        if (count($response->data) == 0) {

            $result['code'] = "100";
            $result['message'] = $api_response['100'];
            $result['data'] = $response->data;

        } else {

            $result['code'] = '0';
            $result['message'] = $api_response['0'];
            $result['data'] = $response->data;

        }
        return $result;
    }

    public function getUserPreference($request)
    {
        global $wpdb, $api_response;

        $param = $this->prepare_item_for_database($request);


        $sp_result = $wpdb->get_results("call get_user_preferences_by_user_id($param->user_id);");

        $response = rest_ensure_response($sp_result);


        if (count($response->data) == 0) {

            $result['code'] = "100";
            $result['message'] = $api_response['100'];
            $result['data'] = $response->data;

        } else {

            $result['code'] = '0';
            $result['message'] = $api_response['0'];
            $result['data'] = $response->data;

        }
        return $result;
    }

    public function createUserSubscription($request)
    {
        global $wpdb, $api_response;
        /*
        CALL create_user_subscription(userId,start_datetime,expiry_datetime,subscription_type,auto_renewal,subscription_amount);*/
        $param = $this->prepare_item_for_database($request);
        $param->subscription_type = strtolower($param->subscription_type);
        $subscription_plan_detail = $this->getSubscriptionPlan();

        //$auto_renewal = ($param->auto_renewal > 0)? 1 : 0;
        $auto_renewal = 0;

        $subscription_type = (in_array($param->subscription_type, array('monthly', 'yearly'))) ? $param->subscription_type : 'monthly';
        $subscription_amount = $subscription_plan_detail['monthly']['amount'];
        //$subscription_expiry = $subscription_plan_detail['monthly_expiry_date'];
        $subscription_expiry = $subscription_plan_detail['current_date'];
        if (isset($subscription_plan_detail[$subscription_type])) {
            $subscription_amount = $subscription_plan_detail[$subscription_type]['amount'];
            //$subscription_expiry = $subscription_plan_detail[$subscription_type.'_expiry_date'];
        }
  /*      echo $subscription_amount."<br>";
        echo $subscription_expiry."<br>";
        echo $subscription_type."<br>";
        echo $auto_renewal."<br>";
        echo $subscription_amount."<br>===";
        echo $subscription_plan_detail['current_date'];

        die();*/

        $sp_result = $wpdb->get_results("call create_user_subscription($param->user_id,'${subscription_plan_detail['current_date']}','$subscription_expiry','$subscription_type',$auto_renewal,$subscription_amount,'$param->device_id');");
/*var_dump($sp_result);
var_dump($request);
        die();*/
        if (isset($sp_result[0]->status)) {
            $result['code'] = "110";
            $result['message'] = $api_response['110'];
            $result['data'] = [];
            return $result;
        }

        $response = rest_ensure_response($sp_result);


        if (count($response->data) == 0) {

            $result['code'] = "100";
            $result['message'] = "User already Exist";
            $result['data'] = $response->data;

        } else {

            $result['code'] = '0';
            $result['message'] = $api_response['0'];
            $result['data'] = $response->data;

        }
        return $result;
    }

    public function createNewUser($request)
    {
        global $wpdb, $api_response;
        /*
        CALL create_user_subscription(userId,start_datetime,expiry_datetime,subscription_type,auto_renewal,subscription_amount);*/
        $param = $this->prepare_item_for_database($request);

       // call `create_new_user`(in deviceId varchar(255),in deviceType enum('android','ios','web'),in extra text)

            $gcmid =$request['gcm_id'];

        $sp_result = $wpdb->get_results("call create_new_user('$param->device_id','$param->device_type','$param->extra','$gcmid');");
    //return "call create_new_user('$param->device_id','$param->device_type','$param->extra','$gcmid')";
       // die();
       //var_dump($sp_result);

       if ($sp_result[0]->result=='new_user_created') {
            $result['code'] = "0";
            $result['message'] = $api_response['0'];
            $result['data'] = [];
            return $result;
        }
        else{
            $result['code'] = "1";
            $result['message'] = "already used one day trial";
            $result['data'] = [];
            return $result;
        }

        $response = rest_ensure_response($sp_result);


        if (count($response->data) == 0) {

            $result['code'] = "100";
            $result['message'] = $api_response['100'];
            $result['data'] = $response->data;

        } else {

            $result['code'] = '0';
            $result['message'] = $api_response['0'];
            $result['data'] = $response->data;

        }
        return $result;
    }

    public function updateNotificationLogs($request)
    {
        global $wpdb, $api_response;
        /*
        CALL create_user_subscription(userId,start_datetime,expiry_datetime,subscription_type,auto_renewal,subscription_amount);*/
        $param = $this->prepare_item_for_database($request);

        // call `create_new_user`(in deviceId varchar(255),in deviceType enum('android','ios','web'),in extra text)



        $sp_result = $wpdb->get_results("call update_notification_logs('$param->notification_id');");

     /*    var_dump($sp_result);
         die();*/
        if ($sp_result[0]->result=='notification_received_by_user') {
            $result['code'] = "0";
            $result['message'] = $api_response['0'];
            $result['data'] = [];
            return $result;
        }
        else{
            $result['code'] = "1";
            $result['message'] = "log id not exist";
            $result['data'] = [];
            return $result;
        }

        $response = rest_ensure_response($sp_result);


        if (count($response->data) == 0) {

            $result['code'] = "100";
            $result['message'] = $api_response['100'];
            $result['data'] = $response->data;

        } else {

            $result['code'] = '0';
            $result['message'] = $api_response['0'];
            $result['data'] = $response->data;

        }
        return $result;
    }


    private function getSubscriptionPlan()
    {
        global $wpdb, $api_response;

        $sp_result = $wpdb->get_results("CALL get_all_data_by_post_type('subscription_plan',0,100);");
        $result = array();
        foreach ($sp_result as $row) {
         //  echo  $row->post_value;
        /*    _edit_lock=1470725682:1,Amount=12.50 / month,
_edit_last=1,Amount=12.50 / month
_edit_lock=1472738944:1,Amount=4.50 / month,_edit_last=1
_edit_lock=1472808624:1,Amount=Free,_edit_last=1*/
            //if(preg_match('/Amount=\s*(\d+(\.\d+))\s*/mis',$row->post_value,$match)){
            if (preg_match('/Amount=\s*\d*(\.)?\d+\s*/mis', $row->post_value, $match)) {
               // echo '----------------';
               // echo  $row->post_value;
              //  var_dump($match);
               // echo '-----------XXXXXXXXXX--'.$row->post_name.'---' .explode('=', $match[0])[1].'------XXXXXXXX-------------';
               if(explode('=', $match[0])[1]==0){
                   $total_value ='Free';
               }
               else{
                   $total_value =explode('=', $match[0])[1];
               }
                $result[$row->post_name]['amount'] = $total_value;
                $result[$row->post_name]['plan'] = $row->post_name;
                $result[$row->post_name]['title'] = languageManager($row->post_title);
                $result[$row->post_name]['description'] = languageManager($row->post_content);
            }
        }
      //  die();
        $result['current_date'] = date("Y-m-d H:i:s");
        $result['monthly_expiry_date'] = date('Y-m-d H:i:s', strtotime('+1 month', time()));
        $result['yearly_expiry_date'] = date('Y-m-d H:i:s', strtotime('+1 year', time()));
        return $result;
    }

    public function updateUserSubscriptionios($request)
    {
        global $wpdb, $api_response;

        $arry = Array ( "original_purchase_date_pst" => "2012-04-30 08:05:55 America/Los_Angeles",
            "original_transaction_id" => "1000000046178817", "original_purchase_date_ms" => "1335798355868",
            "transaction_id" => "1000000046178817" ,"quantity" => 1, "product_id" => "com.mindmobapp.download",
            "bvrs" => 20120427 ,"purchase_date_ms" => 1335798355868, "purchase_date" => "2012-04-30 15:05:55 Etc/GMT",
            "original_purchase_date" => "2012-04-30 15:05:55 Etc/GMT", "purchase_date_pst" => "2012-04-30 08:05:55 America/Los_Angeles",
            "bid" => "com.mindmobapp.MindMob", "item_id" => "521129812" );
        /*
        `update_user_subscription_expiry`(subscriptionId,userId,expiryDate,subscriptionType,amount);
        */
        $param = $this->prepare_item_for_database($request);
        $param->subscription_type = strtolower($param->subscription_type);

        //Get my subscription
        $sp_user_subscription = $wpdb->get_results("call get_user_subscription_by_device_id('$param->device_id');");

       /// var_dump($sp_user_subscription);
      /*  $url = 'https://android.googleapis.com/gcm/send';
        define("GOOGLE_API_KEY", "AIzaSyAVCyQN0HcqL8z3aQXr1OYpLmqpGe1ouUA");
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
        var_dump($result);
        die();*/
        if (count($sp_user_subscription) == 0) {
            $result['code'] = "111";
            $result['message'] = $api_response['111'];
            $result['data'] = [];
            return $result;
        }

        /*
                if($sp_user_subscription[0]->expiry_date > date("Y-m-d H:i:s")){
                    $response = rest_ensure_response($sp_user_subscription);
                    $result['code'] = "110";
                    $result['message'] = $api_response['110'];
                    $result['data'] = $response->data;
                    return $result;
                }
        */
        $subscription_plan_detail = $this->getSubscriptionPlan();

        //$auto_renewal = ($param->auto_renewal > 0)? 1 : 0;
        $subscription_type_array = array('monthly' => 'month', 'yearly' => 'year', 'life_time' => 'life_time', 'quarterly'=>'quarterly');

        $subscription_type = (in_array($param->subscription_type, array('monthly', 'yearly','life_time', 'quarterly'))) ? $param->subscription_type : 'monthly';
        $subscription_amount = $subscription_plan_detail['monthly']['amount'];
        $subscription_expiry = date('Y-m-d H:i:s', strtotime('+1 month', strtotime($sp_user_subscription[0]->expiry_date)));
        //print_r($subscription_expiry);exit;
        if (isset($subscription_plan_detail[$subscription_type])) {
            $subscription_amount = $subscription_plan_detail[$subscription_type]['amount'];
            $period = (isset($subscription_type_array[$subscription_type])) ? $subscription_type_array[$subscription_type] : 'month';

            if($period == 'quarterly')
            {
                $subscription_expiry = date('Y-m-d H:i:s', strtotime('+3 month', strtotime($sp_user_subscription[0]->expiry_date)));
            }
            else
            {
                $subscription_expiry = date('Y-m-d H:i:s', strtotime('+1 ' . $period, strtotime($sp_user_subscription[0]->expiry_date)));    
            }
            
        }

        $param->device_type = strtolower($param->device_type);

        if ($param->device_type == 'android') {
            $return = $this->verifyAndroidPurchaseToken($param->extra);

            if ($return['code'] != 0) {
                return $return;
            }
            else {
            }
        }
        elseif ($param->device_type == 'ios') {
            $this->verifyIosPurchaseToken($param->extra);
        } else {
            $result['code'] = "2";
            $result['message'] = 'Purchase Token Not Verify';
            $result['data'] = [];
            return $result;
        }

        $sp_result = $wpdb->get_results("call update_user_subscription_expiry_by_device_id(" . $sp_user_subscription[0]->id . ",'$param->device_id','$subscription_expiry','$subscription_type',$subscription_amount);");
    //echo "call update_user_subscription_expiry_device_id(" . $sp_user_subscription[0]->id . ",'$param->device_id','$subscription_expiry','$subscription_type',$subscription_amount);";
        $receiptbytes = $param->extra;


        $applesharedsecret = '2b11fa69783b4d81b4bbba59966b499b';
        $receiptbytes = preg_replace('/\s+/', '', $receiptbytes);


        $appleurl          = "https://sandbox.itunes.apple.com/verifyReceipt"; // for production
// use https://sandbox.itunes.apple.com/verifyReceipt for testing with sandbox receipt
        $request = json_encode(array("receipt-data" => $receiptbytes,"password"=>$applesharedsecret));
        $ch = curl_init($appleurl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
        $jsonresult = curl_exec($ch);

      // var_dump($jsonresult);
        curl_close($ch);

        $sp_transaction_result = $wpdb->get_results("CALL `create_transaction_logs_device_id`('$param->device_id','$param->device_type','','$subscription_amount','subscription','$jsonresult','approved');");
       /// echo "CALL `create_transaction_logs_device_id`('$param->device_id','$param->device_type','','$subscription_amount','subscription','$jsonresult','approved')";
        //die();
        $response_json['p_message'][0]['status'] = 'create';
        $response_json['p_message'][0]['message'] = "Welcome to GetZend, Thank you for subscribing";
        $response_json['message'] = "Welcome to GetZend, Thank you for subscribing";

        //sendUserNotification($param->user_id, $response_json);

        $response = rest_ensure_response($sp_result);


        if (count($response->data) == 0) {

            $result['code'] = "112";
            $result['message'] = $api_response['112'];
            $result['data'] = $response->data;

        } else {

            $result['code'] = '0';
            $result['message'] = $api_response['0'];
            $result['data'] = $response->data;

        }
        return $result;
    }


    public function updateUserSubscription($request)
    {
        global $wpdb, $api_response;
        /*
        `update_user_subscription_expiry`(subscriptionId,userId,expiryDate,subscriptionType,amount);
        */
        $param = $this->prepare_item_for_database($request);
        $param->subscription_type = strtolower($param->subscription_type);

        //Get my subscription
        $sp_user_subscription = $wpdb->get_results("call get_user_subscription_by_user_id($param->user_id);");

      /*  $url = 'https://android.googleapis.com/gcm/send';
        define("GOOGLE_API_KEY", "AIzaSyAVCyQN0HcqL8z3aQXr1OYpLmqpGe1ouUA");
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
        var_dump($result);
        die();*/
        if (count($sp_user_subscription) == 0) {
            $result['code'] = "111";
            $result['message'] = $api_response['111'];
            $result['data'] = [];
            return $result;
        }

        /*
                if($sp_user_subscription[0]->expiry_date > date("Y-m-d H:i:s")){
                    $response = rest_ensure_response($sp_user_subscription);
                    $result['code'] = "110";
                    $result['message'] = $api_response['110'];
                    $result['data'] = $response->data;
                    return $result;
                }
        */
        $subscription_plan_detail = $this->getSubscriptionPlan();

        //$auto_renewal = ($param->auto_renewal > 0)? 1 : 0;
        $subscription_type_array = array('monthly' => 'month', 'yearly' => 'year');

        $subscription_type = (in_array($param->subscription_type, array('monthly', 'yearly'))) ? $param->subscription_type : 'monthly';
        $subscription_amount = $subscription_plan_detail['monthly']['amount'];
        $subscription_expiry = date('Y-m-d H:i:s', strtotime('+1 month', strtotime($sp_user_subscription[0]->expiry_date)));
        //print_r($subscription_expiry);exit;
        if (isset($subscription_plan_detail[$subscription_type])) {
            $subscription_amount = $subscription_plan_detail[$subscription_type]['amount'];
            $period = (isset($subscription_type_array[$subscription_type])) ? $subscription_type_array[$subscription_type] : 'month';

            $subscription_expiry = date('Y-m-d H:i:s', strtotime('+1 ' . $period, strtotime($sp_user_subscription[0]->expiry_date)));
        }

        $param->device_type = strtolower($param->device_type);

        if ($param->device_type == 'android') {
            $return = $this->verifyAndroidPurchaseToken($param->extra);

            if ($return['code'] != 0) {
                return $return;
            }
            else {
            }
        }
        elseif ($param->device_type == 'ios') {
            $this->verifyIosPurchaseToken($param->extra);
        } else {
            $result['code'] = "2";
            $result['message'] = $api_response['2'];
            $result['data'] = [];
            return $result;
        }

        $sp_result = $wpdb->get_results("call update_user_subscription_expiry(" . $sp_user_subscription[0]->id . ",$param->user_id,'$subscription_expiry','$subscription_type',$subscription_amount);");
        $sp_transaction_result = $wpdb->get_results("CALL `create_transaction_logs`($param->user_id,'$param->device_type','','$subscription_amount','subscription','$param->extra','approved');");
        $response_json['p_message'][0]['status'] = 'create';
        $response_json['p_message'][0]['message'] = "Welcome to GetZend, Thank you for subscribing";
        $response_json['message'] = "Welcome to GetZend, Thank you for subscribing";

        sendUserNotification($param->user_id, $response_json);

        $response = rest_ensure_response($sp_result);


        if (count($response->data) == 0) {

            $result['code'] = "112";
            $result['message'] = $api_response['112'];
            $result['data'] = $response->data;

        } else {

            $result['code'] = '0';
            $result['message'] = $api_response['0'];
            $result['data'] = $response->data;

        }
        return $result;
    }

    public function updateSubscription($request) {
        global $wpdb, $api_response;
        /*
        `update_user_subscription_expiry`(subscriptionId,userId,expiryDate,subscriptionType,amount);
        */
        $param = $this->prepare_item_for_database($request);
        $param->subscription_type = strtolower($param->subscription_type);

        //Get my subscription
        $sp_user_subscription = $wpdb->get_results("call get_user_subscription_by_user_id($param->user_id);");

        if (count($sp_user_subscription) == 0) {
            $result['code'] = "111";
            $result['message'] = $api_response['111'];
            $result['data'] = [];
            return $result;
        }

        /*
                if($sp_user_subscription[0]->expiry_date > date("Y-m-d H:i:s")){
                    $response = rest_ensure_response($sp_user_subscription);
                    $result['code'] = "110";
                    $result['message'] = $api_response['110'];
                    $result['data'] = $response->data;
                    return $result;
                }
        */
        $subscription_plan_detail = $this->getSubscriptionPlan();

        //$auto_renewal = ($param->auto_renewal > 0)? 1 : 0;
        $subscription_type_array = array('monthly' => 'month', 'yearly' => 'year');

        $subscription_type = (in_array($param->subscription_type, array('monthly', 'yearly'))) ? $param->subscription_type : 'monthly';
        $subscription_amount = $subscription_plan_detail['monthly']['amount'];
        $subscription_expiry = date('Y-m-d H:i:s', strtotime('+1 month', strtotime($sp_user_subscription[0]->expiry_date)));
        //print_r($subscription_expiry);exit;
        if (isset($subscription_plan_detail[$subscription_type])) {
            $subscription_amount = $subscription_plan_detail[$subscription_type]['amount'];
            $period = (isset($subscription_type_array[$subscription_type])) ? $subscription_type_array[$subscription_type] : 'month';

            $subscription_expiry = date('Y-m-d H:i:s', strtotime('+1 ' . $period, strtotime($sp_user_subscription[0]->expiry_date)));
        }

        $param->device_type = strtolower($param->device_type);

        if ($param->device_type == 'android') {
            $return = $this->verifyAndroidPurchaseToken($param->extra);

            if ($return['code'] != 0) {
                return $return;
            }
            else {
            }
        }
        elseif ($param->device_type == 'ios') {
            $this->verifyIosPurchaseToken($param->extra);
        } else {
            $result['code'] = "2";
            $result['message'] = $api_response['2'];
            $result['data'] = [];
            return $result;
        }

        $sp_result = $wpdb->get_results("call update_user_subscription_expiry(" . $sp_user_subscription[0]->id . ",$param->user_id,'$subscription_expiry','$subscription_type',$subscription_amount);");
        $sp_transaction_result = $wpdb->get_results("CALL `create_transaction_logs`($param->user_id,'$param->device_type','','$subscription_amount','subscription','$param->extra','approved');");
        $response_json['p_message'][0]['status'] = 'create';
        $response_json['p_message'][0]['message'] = "Welcome to GetZend, Thank you for subscribing";
        $response_json['message'] = "Welcome to GetZend, Thank you for subscribing";

        sendUserNotification($param->user_id, $response_json);

        $response = rest_ensure_response($sp_result);


        if (count($response->data) == 0) {

            $result['code'] = "112";
            $result['message'] = $api_response['112'];
            $result['data'] = $response->data;

        } else {

            $result['code'] = '0';
            $result['message'] = $api_response['0'];
            $result['data'] = $response->data;

        }
        return $result;
    }

    public function getUserSubscription($request)
    {

        global $wpdb, $api_response;
        /*
        `update_user_subscription_expiry`(subscriptionId,userId,expiryDate,subscriptionType,amount);
        */
        $param = $this->prepare_item_for_database($request);


        $subscription_plan_detail = $this->getSubscriptionPlan();

        $sp_user_subscription = $wpdb->get_results("call get_user_subscription_by_user_id($param->user_id);");

        $response = rest_ensure_response($sp_user_subscription);


        unset($subscription_plan_detail['current_date']);
        unset($subscription_plan_detail['monthly_expiry_date']);
        unset($subscription_plan_detail['yearly_expiry_date']);

        $result['code'] = '0';
        $result['message'] = $api_response['0'];
        $result['data']['user_subscription'] = $response->data;
        $result['data']['subscription_detail'] = $subscription_plan_detail;


        return $result;
    }

    public function getUserSubscriptionByDeviceId($request)
    {

        ///var_dump($request);

        global $wpdb, $api_response;
        /*
        `update_user_subscription_expiry`(subscriptionId,userId,expiryDate,subscriptionType,amount);
        */
        $param = $this->prepare_item_for_database($request);


        $subscription_plan_detail = $this->getSubscriptionPlan();

        $sp_user_subscription = $wpdb->get_results("call get_user_subscription_by_device_id('$param->device_id');");
       /// dd($sp_user_subscription);
        $response = rest_ensure_response($sp_user_subscription);


        unset($subscription_plan_detail['current_date']);
        unset($subscription_plan_detail['monthly_expiry_date']);
        unset($subscription_plan_detail['yearly_expiry_date']);

        $result['code'] = '0';
        $result['message'] = $api_response['0'];
        $result['data']['user_subscription'] = $response->data;
        $result['data']['subscription_detail'] = $subscription_plan_detail;


        return $result;
    }

    public function updateUserRenewal($request)
    {
        global $wpdb, $api_response;
        /*
        `update_user_subscription_expiry`(subscriptionId,userId,expiryDate,subscriptionType,amount);
        */
        $param = $this->prepare_item_for_database($request);

        $sp_preference_result = $wpdb->get_results("call get_user_preferences_by_user_id($param->user_id);");
        $preference_id = 0;
        foreach ($sp_preference_result as $row) {
            if ($row->title == 'subscription_renewal') {
                $preference_id = $row->preference_id;
            }
        }

        if (!$preference_id) {
            $result['code'] = '113';
            $result['message'] = $api_response['113'];
            $result['data'] = [];
            return $result;
        }
        $param->auto_renewal = ($param->auto_renewal != 0) ? 1 : 0;
        $sp_user_subscription = $wpdb->get_results("call update_user_preference_value($param->user_id,$preference_id,'$param->auto_renewal');");

        $subscription_status = ($sp_user_subscription[0]->value) ? 'subscribed' : 'un-subscribed';
        $response = rest_ensure_response($sp_user_subscription);


        $result['code'] = '0';
        $result['message'] = $api_response['0'];
        $result['data'] = array('status' => $subscription_status);


        return $result;
    }

    public function getLanguages($request)
    {
        global $wpdb, $api_response;
        /*
        `update_user_subscription_expiry`(subscriptionId,userId,expiryDate,subscriptionType,amount);
        */
        $param = $this->prepare_item_for_database($request);

        $sp_result = $wpdb->get_results("call `get_language_preferences`($param->offset,100);");

        /*foreach($sp_result as $row){

        }*/


        $result['code'] = '0';
        $result['message'] = $api_response['0'];
        $result['data'] = array('status' => $sp_result);


        return $result;
    }

    protected function prepare_item_for_database2($request)
    {
        $prepared_product = new stdClass;

        if (isset($request['user_id'])) {
            $prepared_product->user_id = $request['user_id'];
        }

        if (isset($request['mixer_id'])) {
            $prepared_product->mixer_id = $request['mixer_id'];
        }

        if (isset($request['offset'])) {
            $prepared_product->offset = $request['offset'];
        }

        if (isset($request['title'])) {
            $prepared_product->title = $request['title'];
        }

        if (isset($request['description'])) {
            $prepared_product->description = $request['description'];
        }

        if (isset($request['mixture_detail'])) {
            $prepared_product->mixture_detail = $request['mixture_detail'];
        }

        if (isset($request['extra'])) {
            $prepared_product->extra = $request['extra'];
        }

        if (isset($request['signature'])) {
            $prepared_product->signature = $request['signature'];
        }

        return apply_filters('rest_pre_insert_mixer', $prepared_product, $request);
    }

    private function curlGetRequest($url)
    {
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        $curl_response = curl_exec($curl);
        if ($curl_response === FALSE) {
            $info = curl_getinfo($curl);
            curl_close($curl);
        }
        curl_close($curl);

        //print_r($curl_response);
        return $curl_response;
    }


}
