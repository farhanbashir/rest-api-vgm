<?php

/**
 * Access users
 */
class WP_REST_Test_Controller extends WP_REST_Controller
{

    public function __construct()
    {
        $this->namespace = 'public';
        $this->rest_base = 'product';
    }

    /**
     * Register the routes for the objects of the controller.
     */
    public function register_routes()
    {

        // start post request
        register_rest_route($this->namespace, '/' . $this->rest_base . '/get-music-by-user-id', array(
            array(
                'methods' => WP_REST_Server::CREATABLE,
                'callback' => array($this, 'getMusicByUserId'),
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
        register_rest_route($this->namespace, '/' . $this->rest_base . '/get-paid-music-by-user-id', array(
            array(
                'methods' => WP_REST_Server::CREATABLE,
                'callback' => array($this, 'getPaidMusicByUserId'),
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
        register_rest_route($this->namespace, '/' . $this->rest_base . '/get-all-challenge-items', array(
            array(
                'methods' => WP_REST_Server::CREATABLE,
                'callback' => array($this, 'getAllChallengeItems'),
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
        register_rest_route($this->namespace, '/' . $this->rest_base . '/get-hypnotic-suggestion-by-user-id', array(
            array(
                'methods' => WP_REST_Server::CREATABLE,
                'callback' => array($this, 'getHypnoticSuggestionByUserId'),
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
        register_rest_route($this->namespace, '/' . $this->rest_base . '/get-paid-hypnotic-suggestion-by-user-id', array(
            array(
                'methods' => WP_REST_Server::CREATABLE,
                'callback' => array($this, 'getPaidHypnoticSuggestionByUserId'),
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
        register_rest_route($this->namespace, '/' . $this->rest_base . '/get-all-feel-items', array(
            array(
                'methods' => WP_REST_Server::CREATABLE,
                'callback' => array($this, 'getAllFeelItems'),
                'permission_callback' => array($this, 'signatureValidityCheck'),
                'args' => array_merge($this->get_endpoint_args_for_item_schema(WP_REST_Server::CREATABLE),
                    // required params
                    array('user_id' => array('required' => true,),),
                    array('offset' => array('required' => true,),),
                    array('signature' => array('required' => true,),)
                ),
            ),

        ));

        // start post request
        register_rest_route($this->namespace, '/' . $this->rest_base . '/get-sessions-by-categories', array(
            array(
                'methods' => WP_REST_Server::CREATABLE,
                'callback' => array($this, 'getSessionsByCategories'),
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
        register_rest_route($this->namespace, '/' . $this->rest_base . '/create-feedback', array(
            array(
                'methods' => WP_REST_Server::CREATABLE,
                'callback' => array($this, 'createFeedback'),
                'permission_callback' => array($this, 'signatureValidityCheck'),
                'args' => array_merge($this->get_endpoint_args_for_item_schema(WP_REST_Server::CREATABLE),
                    // required params
                    array('user_id' => array('required' => true,),),
                    array('rating' => array('required' => true,),),
                    array('product_ids' => array('required' => true,),),
                    array('comments' => array('required' => true,),),
                    array('extra' => array('required' => true,),),
                    array('signature' => array('required' => true,),)
                ),
            ),

        ));

        //end post request

        // start post request
        register_rest_route($this->namespace, '/' . $this->rest_base . '/get-all-scene-items', array(
            array(
                'methods' => WP_REST_Server::CREATABLE,
                'callback' => array($this, 'getAllSceneItems'),
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
        register_rest_route($this->namespace, '/' . $this->rest_base . '/get-all-scene-items-by-ids', array(
            array(
                'methods' => WP_REST_Server::CREATABLE,
                'callback' => array($this, 'getAllSceneItemsByIds'),
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
        register_rest_route($this->namespace, '/' . $this->rest_base . '/get-all-product-detail', array(
            array(
                'methods' => WP_REST_Server::CREATABLE,
                'callback' => array($this, 'getAllProductDetail'),
                'permission_callback' => array($this, 'signatureValidityCheck'),
                'args' => array_merge($this->get_endpoint_args_for_item_schema(WP_REST_Server::CREATABLE),
                    // required params
                    array('user_id' => array('required' => true,),),
                    array('product_ids' => array('required' => true,),),
                    array('signature' => array('required' => true,),)
                ),
            ),

        ));

        //end post request

        // start post request
        register_rest_route($this->namespace, '/' . $this->rest_base . '/create-purchase-product-items', array(
            array(
                'methods' => WP_REST_Server::CREATABLE,
                'callback' => array($this, 'createPurchaseProductItems'),
                'permission_callback' => array($this, 'signatureValidityCheck'),
                'args' => array_merge($this->get_endpoint_args_for_item_schema(WP_REST_Server::CREATABLE),
                    // required params
                    array('user_id' => array('required' => true,),),
                    array('product_ids' => array('required' => true,),),
                    array('device_type' => array('required' => true,),),
                    array('extra' => array('required' => true,),),
                    array('signature' => array('required' => true,),)
                ),
            ),

        ));

        //end post request

        // start post request
        register_rest_route($this->namespace, '/' . $this->rest_base . '/update-purchase-product-items', array(
            array(
                'methods' => WP_REST_Server::CREATABLE,
                'callback' => array($this, 'updatePurchaseProductItems'),
                'permission_callback' => array($this, 'signatureValidityCheck'),
                'args' => array_merge($this->get_endpoint_args_for_item_schema(WP_REST_Server::CREATABLE),
                    // required params
                    array('user_id' => array('required' => true,),),
                    array('transaction_id' => array('required' => true,),),
                    array('status' => array('required' => true,),),
                    array('extra' => array('required' => true,),),
                    array('signature' => array('required' => true,),)
                ),
            ),

        ));

        //end post request

        // start post request
        register_rest_route($this->namespace, '/' . $this->rest_base . '/get-purchase-product-items', array(
            array(
                'methods' => WP_REST_Server::CREATABLE,
                'callback' => array($this, 'getPurchaseProductItems'),
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
        register_rest_route($this->namespace, '/' . $this->rest_base . '/update-meditation-count', array(
            array(
                'methods' => WP_REST_Server::CREATABLE,
                'callback' => array($this, 'updateMeditationCount'),
                'permission_callback' => array($this, 'signatureValidityCheck'),
                'args' => array_merge($this->get_endpoint_args_for_item_schema(WP_REST_Server::CREATABLE),
                    // required params
                    array('user_id' => array('required' => true,),),
                    array('meditation_id' => array('required' => true,),),
                    array('signature' => array('required' => true,),)
                ),
            ),

        ));

        //end post request

        // start post request
        register_rest_route($this->namespace, '/' . $this->rest_base . '/get-meditation-by-id', array(
            array(
                'methods' => WP_REST_Server::CREATABLE,
                'callback' => array($this, 'getmeditationbyid'),
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
        register_rest_route($this->namespace, '/' . $this->rest_base . '/create-users-challenge', array(
            array(
                'methods' => WP_REST_Server::CREATABLE,
                'callback' => array($this, 'createUsersChallenge'),
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
        register_rest_route($this->namespace, '/' . $this->rest_base . '/delete-users-challenge', array(
            array(
                'methods' => WP_REST_Server::CREATABLE,
                'callback' => array($this, 'deleteUsersChallenge'),
                'permission_callback' => array($this, 'signatureValidityCheck'),
                'args' => array_merge($this->get_endpoint_args_for_item_schema(WP_REST_Server::CREATABLE),
                    // required params
                    array('user_id' => array('required' => true,),),
                    array('challenge_id' => array('required' => true,),),
                    array('challenge_day' => array('required' => true,),),
                    array('signature' => array('required' => true,),)
                ),
            ),

        ));

        //end post request

        // start post request
        register_rest_route($this->namespace, '/' . $this->rest_base . '/update-users-challenge', array(
            array(
                'methods' => WP_REST_Server::CREATABLE,
                'callback' => array($this, 'updateUsersChallenge'),
                'permission_callback' => array($this, 'signatureValidityCheck'),
                'args' => array_merge($this->get_endpoint_args_for_item_schema(WP_REST_Server::CREATABLE),
                    // required params
                    array('user_id' => array('required' => true,),),
                    array('challenge_id' => array('required' => true,),),
                    array('challenge_day' => array('required' => true,),),
                    array('data' => array('required' => true,),),
                     array('signature' => array('required' => true,),)
                ),
            ),

        ));

        //end post request

        // start post request  get_users_challenge_by_id
        register_rest_route($this->namespace, '/' . $this->rest_base . '/get-users-challenge-by-id', array(
            array(
                'methods' => WP_REST_Server::CREATABLE,
                'callback' => array($this, 'getUsersChallengeById'),
                'permission_callback' => array($this, 'signatureValidityCheck'),
                'args' => array_merge($this->get_endpoint_args_for_item_schema(WP_REST_Server::CREATABLE),
                    // required params
                    array('user_id' => array('required' => true,),),
                    array('challenge_id' => array('required' => true,),),
                    array('signature' => array('required' => true,),)
                ),
            ),

        ));

        //end post request


        // start post request  get_users_challenge_by_id
        register_rest_route($this->namespace, '/' . $this->rest_base . '/get-users-challenge-by-userid', array(
            array(
                'methods' => WP_REST_Server::CREATABLE,
                'callback' => array($this, 'getUsersChallengeByUserId'),
                'permission_callback' => array($this, 'signatureValidityCheck'),
                'args' => array_merge($this->get_endpoint_args_for_item_schema(WP_REST_Server::CREATABLE),
                    // required params
                     array('user_id' => array('required' => true,),),
                     array('signature' => array('required' => true,),)
                ),
            ),

        ));

        //end post request

  // start post request  get_users_challenge_by_id
        register_rest_route($this->namespace, '/' . $this->rest_base . '/reset-users-challenge-status', array(
            array(
                'methods' => WP_REST_Server::CREATABLE,
                'callback' => array($this, 'resetUsersChallengeStatus'),
                'permission_callback' => array($this, 'signatureValidityCheck'),
                'args' => array_merge($this->get_endpoint_args_for_item_schema(WP_REST_Server::CREATABLE),
                    // required params
                    array('user_id' => array('required' => true,),),
                    array('challenge_id' => array('required' => true,),),
                    array('signature' => array('required' => true,),)
                ),
            ),

        ));

        //end post request


        // start post request
        register_rest_route($this->namespace, '/' . $this->rest_base . '/get-meditation-by-updated-ids', array(
            array(
                'methods' => WP_REST_Server::CREATABLE,
                'callback' => array($this, 'getMeditationByUpdatedIds'),
                'permission_callback' => array($this, 'signatureValidityCheck'),
                'args' => array_merge($this->get_endpoint_args_for_item_schema(WP_REST_Server::CREATABLE),
                    // required params
                    array('user_id' => array('required' => true,),),
                    array('target_ids' => array('required' => true,),),
                    array('signature' => array('required' => true,),)
                ),
            ),

        ));

        //end post request

    }

    //call `create_users_challenge`(in userId int);
    public function createUsersChallenge($request)
    {
        global $wpdb, $api_response;

        $param = $this->prepare_item_for_database($request);
        //$sp_result = $wpdb->get_results( "call get_all_data_by_scene($param->user_id);" );
        $sp_result = $wpdb->get_results("call create_users_challenge($param->user_id);");


        $result_array = array();
        foreach ($sp_result as $row) {
            $result_array[] = $this->prepare_item_listing_response(array($row), $request, true);
        }
        $response = rest_ensure_response($result_array);


        if (count($response->data) == 0) {

            $result['code'] = "202";
            $result['message'] = $api_response['202'];
            $result['data'] = $response->data;

        } else {

            $result['code'] = '0';
            $result['message'] = $api_response['0'];
            $result['data'] = $response->data;
        }
        return $result;
    }

    //call call `get_users_challenge_by_id`(in challengeId int);
    public function getUsersChallengeById($request)
    {
        global $wpdb, $api_response;

        $param = $this->prepare_item_for_database($request);
        //$sp_result = $wpdb->get_results( "call get_all_data_by_scene($param->user_id);" );
        $sp_result = $wpdb->get_results("call get_users_challenge_by_id($param->challenge_id);");


        $result_array = array();
        foreach ($sp_result as $row) {
            $result_array[] = $this->prepare_item_listing_response(array($row), $request, true);
        }
        $response = rest_ensure_response($result_array);


        if (count($response->data) == 0) {

            $result['code'] = "202";
            $result['message'] = $api_response['202'];
            $result['data'] = $response->data;

        } else {

            $result['code'] = '0';
            $result['message'] = $api_response['0'];
            $result['data'] = $response->data;
        }
        return $result;
    }

  // call `get_users_challenge_by_user_id`(100);
    public function getUsersChallengeByUserId($request)
    {
        global $wpdb, $api_response;

        $param = $this->prepare_item_for_database($request);
        //$sp_result = $wpdb->get_results( "call get_all_data_by_scene($param->user_id);" );
        $sp_result = $wpdb->get_results("call get_users_challenge_by_user_id($param->user_id);");
        //var_dump("call get_users_challenge_by_user_id($param->user_id);");

        $result_array = array();
        foreach ($sp_result as $row) {
            $result_array[] = $this->prepare_item_listing_response(array($row), $request, true);
        }
        $response = rest_ensure_response($result_array);


        if (count($response->data) == 0) {

            $result['code'] = "202";
            $result['message'] = $api_response['202'];
            $result['data'] = $response->data;

        } else {

            $result['code'] = '0';
            $result['message'] = $api_response['0'];
            $result['data'] = $response->data;
        }
        return $result;
    }


// call `update_users_challenge_status`(1,'cancelled');
    public function resetUsersChallengeStatus($request)
    {
        // call `update_users_challenge_status`(1,'cancelled');
        // ENUM('active','completed','cancelled')
        global $wpdb, $api_response;

        $param = $this->prepare_item_for_database($request);
        //$sp_result = $wpdb->get_results( "call get_all_data_by_scene($param->user_id);" );
        $sp_result = $wpdb->get_results("call update_users_challenge_status($param->challenge_id,'cancelled');");
       // echo "call update_users_challenge_status($param->challenge_id,'cancelled');";


        $result_array = array();
        foreach ($sp_result as $row) {
            $result_array[] = $this->prepare_item_listing_response(array($row), $request, true);
        }
        $response = rest_ensure_response($result_array);


        if (count($response->data) == 0) {

            $result['code'] = "202";
            $result['message'] = $api_response['202'];
            $result['data'] = $response->data;

        } else {

            $result['code'] = '0';
            $result['message'] = $api_response['0'];
            $result['data'] = $response->data;
        }
        return $result;
    }





    // call `delete_users_challenge_link`(in challengeId int, in challengeDay int);
    public function updateUsersChallenge($request)
    {

        global $wpdb, $api_response;

        $param = $this->prepare_item_for_database($request);
        //var_dump($param);
       // echo $param->data;
        $sp_result = $wpdb->get_results("call delete_users_challenge_link($param->challenge_id,$param->challenge_day);");
        $tmp_data = array();
        $tmp_data = explode(',',$param->data);
        foreach ($tmp_data as $row_temp) {
         //   echo $row_temp;
            $newdata = array();
            $newdata = explode('=',$row_temp);
            //echo 'target Id = '.$newdata[0].'--';
            //echo 'target value = '.$newdata[1].'<br>';

            $insert_query = "INSERT INTO `gz_users_challenge_link` 
                        (`challenge_id`,`target_id`,`challenge_day`,`target_type`,`target_value`,`created_at`,`updated_at`)
                        VALUES
                        ('$param->challenge_id','$newdata[0]','$param->challenge_day','challenge','$newdata[1]','','')";
            //echo $insert_query;
            $isertData =  $wpdb->get_results($insert_query);
        }


                $reult_update=array(['result'=>'result update successfully']);


        $result_array = array();

        foreach ($reult_update as $row) {
            $result_array[] = $this->prepare_item_listing_response(array($row), $request, true);
        }
        $response = rest_ensure_response($result_array);


        if (count($response->data) == 0) {

            $result['code'] = "202";
            $result['message'] = $api_response['202'];
            $result['data'] = $response->data;

        } else {

            $result['code'] = '0';
            $result['message'] = $api_response['0'];
            $result['data'] = $reult_update;
        }
        return $result;
    }


 // call `delete_users_challenge_link`(in challengeId int, in challengeDay int);
    public function deleteUsersChallenge($request)
    {
        global $wpdb, $api_response;

        $param = $this->prepare_item_for_database($request);
        //$sp_result = $wpdb->get_results( "call get_all_data_by_scene($param->user_id);" );
        $sp_result = $wpdb->get_results("call delete_users_challenge_link($param->challenge_id,$param->challenge_day);");
       // echo "call delete_users_challenge_link($param->challenge_id,$param->challenge_day);";
       // var_dump($sp_result);

        $result_array = array();
        foreach ($sp_result as $row) {
            $result_array[] = $this->prepare_item_listing_response(array($row), $request, true);
        }
        $response = rest_ensure_response($result_array);


        if (count($response->data) == 0) {

            $result['code'] = "202";
            $result['message'] = $api_response['202'];
            $result['data'] = $response->data;

        } else {

            $result['code'] = '0';
            $result['message'] = $api_response['0'];
            $result['data'] = $response->data;
        }
        return $result;
    }



    public function signatureValidityCheck($request)
    {

        $product = $this->prepare_item_for_database($request);
        $validationHeader = $this->validateRequest($product);

        if ($validationHeader != APP_TRUE)
            return false;
        return true;
    }

    public function getMusicByUserId($request)
    {
        global $wpdb, $api_response;

        $param = $this->prepare_item_for_database($request);
        $sp_result = $wpdb->get_results("call get_my_audio_list($param->user_id,$param->offset,100);");
        $response = $this->prepare_item_listing_response($sp_result, $request);
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



    public function getPaidMusicByUserId($request)
    {
        global $wpdb, $api_response;

        $param = $this->prepare_item_for_database($request);
        $sp_result = $wpdb->get_results("call get_paid_audio_list($param->user_id,$param->offset,100);");
        $response = $this->prepare_item_listing_response($sp_result, $request);
        $response = rest_ensure_response($response);

        if (count($response->data) == 0) {

            $result['code'] = "101";
            $result['message'] = $api_response['101'];
            $result['data'] = $response->data;

        } else {

            $result['code'] = '0';
            $result['message'] = $api_response['0'];
            $result['data'] = $response->data;

        }
        return $result;
    }

    public function getAllChallengeItems($request)
    {
        global $wpdb, $api_response;

        $param = $this->prepare_item_for_database($request);
        //$sp_result = $wpdb->get_results( "call get_all_data_by_scene($param->offset,100);" );
        $sp_result = $wpdb->get_results("call get_all_challenge_data($param->offset,100);");
        // var_dump($sp_result);
        //  die();
        //print_r($sp_result);exit;

        //$sp_wheal_result = $wpdb->get_results("CALL get_all_data_by_scene(0,100);" );
        /*$sp_wheal_result = $wpdb->get_results("CALL get_all_data_by_post_type('feel',0,100);" );
        //print_r($sp_wheal_result);exit;
        $sp_category_result = $wpdb->get_results("call get_all_categories()" );

        //$feel_like_types = array("Something","FeelingCalm","TakingANap","GettingEnergized","Unplugging","ReleasingTension");
        $feel_like_types = array();
        $categories = array();
        foreach($sp_wheal_result as $sp_wheal_tag){
            $feel_like_types[$sp_wheal_tag->id] = $sp_wheal_tag->post_name;
        }
        foreach($sp_category_result as $sp_category){
            if(strtolower($sp_category->name) == 'scene')
                $categories[$sp_category->term_id] = $sp_category->name;
        }*/
        $feel_like_filter_data = array();
        /*foreach($sp_result as $row){
            foreach($feel_like_types as $type_key => $feel_like_type){
                //if(preg_match("/$feel_like_type/mis",$row->data)){
                    foreach($categories as $cat_key => $category){
                        if(preg_match("/$category/mis",$row->data)){
                        //preg_match("'/ms_album=\s*(\d+)\s*/
        /*",$row->data,$match);
                                preg_match("/ms_album=(.*?)(,|$)/mis",$row->data,$match);
                                    $row->category = $category;
                                    $row->category_id = $cat_key;
                                    $row->session = (isset($match[1]))? $match[1] : '';
                                    $row->feel_id = $type_key;
                                    $tmp_scene_gif_data = array();
                                    $tmp_scene_gif_data = explode(',|',$row->scene_gif_data);
                                    if(count($tmp_scene_gif_data) < 4){
                                        $tmp_scene_gif_data[1] = (isset($tmp_scene_gif_data[1])) ? $tmp_scene_gif_data[1] : '';
                                        $tmp_scene_gif_data[2] = (isset($tmp_scene_gif_data[2])) ? $tmp_scene_gif_data[2] : '';
                                        $tmp_scene_gif_data[3] = (isset($tmp_scene_gif_data[3])) ? $tmp_scene_gif_data[3] : '';
                                    }
                                    $row->scene_gif_id = $tmp_scene_gif_data[0];
                                    $row->scene_gif_title = $tmp_scene_gif_data[1];
                                    $row->scene_gif_name = $tmp_scene_gif_data[2];
                                    $row->scene_gif_url = $tmp_scene_gif_data[3];
                                    $feel_like_filter_data[$row->id] = $this->prepare_item_listing_response (array($row), $request, true );
                                }
                            }
                       // }
                    }
                }*/
        foreach ($sp_result as $row) {
            $tmp = new stdClass;
            $url_data = array();


            $tmp->id = $row->ID;
            $tmp->title = languageManager($row->post_title);
            $tmp->name = $row->post_name;
            $tmp->high = '';
            $tmp->low = '';


            preg_match("/challenge_high=(.*?)(,|$)/mis", $row->data, $session_match);
            preg_match("/challenge_low=(.*?)(,|$)/mis", $row->data, $url_match);

            if (isset($session_match[1]))
                $tmp->high = $session_match[1];
            if (isset($url_match[1]))
                $tmp->low =  $url_match[1];





            /* if (isset($session_match[1]))
                 $tmp->session = $session_match[1];
             if (isset($url_match[1]))
                 $url_data = unserialize(unserialize($url_match[1]));*/


            foreach ($url_data as $url) {

                if (!empty($url['rpg_image_label'])) {
                    // echo substr ($url['rpg_image_url'], strpos($url['rpg_image_url'], '/wp-content'), strlen($url['rpg_image_url'])); die;
                    $tmp->$url['rpg_image_label'] = (!empty($url['rpg_image_url'])) ? substr($url['rpg_image_url'], strpos($url['rpg_image_url'], '/wp-content'), strlen($url['rpg_image_url'])) : '/wp-content/uploads/2016/06/Beach-Sound.mp3';
                    $tmp->$url['rpg_image_label'] = $this->makeAbsolutePath($tmp->$url['rpg_image_label']);
                }
            }
            $feel_like_filter_data[] = $tmp;
        }
        // die();
        $response = rest_ensure_response($feel_like_filter_data);
        // var_dump($feel_like_filter_data);
        if (count($response->data) == 0) {

            $result['code'] = "202";
            $result['message'] = $api_response['202'];
            $result['data'] = $response->data;

        } else {

            $result['code'] = '0';
            $result['message'] = $api_response['0'];
            $result['data'] = $response->data;
        }
        return $result;
    }

    public function getHypnoticSuggestionByUserId($request)
    {
        global $wpdb, $api_response;

        $param = $this->prepare_item_for_database($request);
        $sp_result = $wpdb->get_results("call get_my_hypnotic_suggestion_list($param->user_id,$param->offset,100);");
        $response = $this->prepare_item_listing_response($sp_result, $request);
        $response = rest_ensure_response($response);

        if (count($response->data) == 0) {

            $result['code'] = "102";
            $result['message'] = $api_response['102'];
            $result['data'] = $response->data;

        } else {

            $result['code'] = '0';
            $result['message'] = $api_response['0'];
            $result['data'] = $response->data;

        }
        return $result;
    }

    public function getPaidHypnoticSuggestionByUserId($request)
    {
        global $wpdb, $api_response;

        $param = $this->prepare_item_for_database($request);
        $sp_result = $wpdb->get_results("call get_paid_hypnotic_suggestion_list($param->user_id,$param->offset,100);");
        $response = $this->prepare_item_listing_response($sp_result, $request);
        $response = rest_ensure_response($response);

        if (count($response->data) == 0) {

            $result['code'] = "103";
            $result['message'] = $api_response['103'];
            $result['data'] = $response->data;

        } else {

            $result['code'] = '0';
            $result['message'] = $api_response['0'];
            $result['data'] = $response->data;

        }
        return $result;
    }


    protected function prepare_item_for_database($request)
    {
        $prepared_product = new stdClass;

        if (isset($request['user_id'])) {
            $prepared_product->user_id = $request['user_id'];
        }

        if (isset($request['target_ids'])) {
            $prepared_product->target_ids = $request['target_ids'];
        }

        if (isset($request['id'])) {
            $prepared_product->id = $request['id'];
        }

        if (isset($request['offset'])) {
            $prepared_product->offset = $request['offset'];
        }

        if (isset($request['rating'])) {
            $prepared_product->rating = $request['rating'];
        }

        if (isset($request['product_ids'])) {
            $prepared_product->product_ids = $request['product_ids'];
        }

        if (isset($request['comments'])) {
            $prepared_product->comments = $request['comments'];
        }

        if (isset($request['extra'])) {
            $prepared_product->extra = $request['extra'];
        }

        if (isset($request['device_type'])) {
            $prepared_product->device_type = $request['device_type'];
        }

        if (isset($request['transaction_id'])) {
            $prepared_product->transaction_id = $request['transaction_id'];
        }

        if (isset($request['status'])) {
            $prepared_product->status = $request['status'];
        }

        if (isset($request['meditation_id'])) {
            $prepared_product->meditation_id = $request['meditation_id'];
        }

        if (isset($request['challenge_id'])) {
            $prepared_product->challenge_id = $request['challenge_id'];
        }

        if (isset($request['challenge_day'])) {
            $prepared_product->challenge_day = $request['challenge_day'];
        }
        if (isset($request['data'])) {
            $prepared_product->data = $request['data'];
        }

        if (isset($request['signature'])) {
            $prepared_product->signature = $request['signature'];
        }

        return apply_filters('rest_pre_insert_user', $prepared_product, $request);
    }

    public function prepare_item_listing_response($product, $request, $getSingleRow = false)
    {
        $i = 0;
        $ArrayList = [];
        $map_key['scene_gif_id'] = array('key' => 'scene_gif_id');
        $map_key['scene_gif_title'] = array('key' => 'scene_gif_title');
        $map_key['scene_gif_name'] = array('key' => 'scene_gif_name');
        $map_key['scene_gif_url'] = array('key' => 'scene_gif_url');
        $map_key['session'] = array('key' => 'session');


        if ($getSingleRow) {
            foreach ($product as $item) {
                $tmp = $item;

                if (isset($tmp->user_id))
                    $ArrayList['user_id'] = $tmp->user_id;
                if (isset($tmp->id))
                    $ArrayList['id'] = $tmp->id;
                if (isset($tmp->product_id))
                    $ArrayList['product_id'] = $tmp->product_id;
                if (isset($tmp->transaction_id))
                    $ArrayList['transaction_id'] = $tmp->transaction_id;
                if (isset($tmp->post_title))
                    $ArrayList['title'] = languageManager($tmp->post_title);
                if (isset($tmp->description))
                    $ArrayList['description'] = languageManager($tmp->description);

                if (isset($tmp->demo))
                    $ArrayList['demo_url'] = $tmp->demo;
                if (isset($tmp->live_url))
                    $ArrayList['live_url'] = $tmp->live_url;

                if (isset($tmp->cover))
                    $ArrayList['image_url'] = $tmp->cover;
                if (isset($tmp->price)) {
                    $tmp_normalize = map_key_normalize_data('price', $tmp->price);
                    $ArrayList[$tmp_normalize['key']] = $tmp_normalize['value'];
                }

                if (isset($tmp->category))
                    $ArrayList['category'] = $tmp->category;
                if (isset($tmp->challenge_id))
                    $ArrayList['challenge_id'] = $tmp->challenge_id;
                if (isset($tmp->challenge_day))
                    $ArrayList['challenge_day'] = $tmp->challenge_day;

                if (isset($tmp->category_id))
                    $ArrayList['category_id'] = $tmp->category_id;
                if (isset($tmp->feel_id))
                    $ArrayList['feel_id'] = $tmp->feel_id;
                if (isset($tmp->post_date)) {
                    $tmp_normalize = map_key_normalize_data('created_at', $tmp->post_date);
                    $ArrayList[$tmp_normalize['key']] = $tmp_normalize['value'];
                }
                if (isset($tmp->post_modified)) {
                    $tmp_normalize = map_key_normalize_data('updated_at', $tmp->post_modified);
                    $ArrayList[$tmp_normalize['key']] = $tmp_normalize['value'];
                }

                if (isset($tmp->scene_gif_id))
                    $ArrayList['scene_gif_id'] = $tmp->scene_gif_id;
                if (isset($tmp->data))
                    $ArrayList['data'] = $tmp->data;
                if (isset($tmp->result))
                    $ArrayList['result'] = $tmp->result;
                if (isset($tmp->scene_gif_title))
                    $ArrayList['scene_gif_title'] = $tmp->scene_gif_title;
                if (isset($tmp->scene_gif_name))
                    $ArrayList['scene_gif_name'] = $tmp->scene_gif_name;
                if (isset($tmp->scene_gif_url))
                    $ArrayList['scene_gif_url'] = $tmp->scene_gif_url;
                if (isset($tmp->session_id))
                    $ArrayList['session_id'] = $tmp->session_id;
                if (isset($tmp->session))
                    $ArrayList['session'] = $tmp->session;
                if (isset($tmp->time))
                    $ArrayList['duration'] = $tmp->time;
                if (isset($tmp->start_date))
                    $ArrayList['start_date'] = $tmp->start_date;
                if (isset($tmp->end_date))
                    $ArrayList['end_date'] = $tmp->end_date;
                if (isset($tmp->status))
                    $ArrayList['status'] = $tmp->status;


                if (isset($tmp->induction_url))
                    $ArrayList['induction_url'] = languageManager($this->makeAbsolutePath($tmp->induction_url));
                if (isset($tmp->relaxation_url))
                    $ArrayList['relaxation_url'] = languageManager($this->makeAbsolutePath($tmp->relaxation_url));
                if (isset($tmp->bring_them_up_url))
                    $ArrayList['bring_them_up_url'] = languageManager($this->makeAbsolutePath($tmp->bring_them_up_url));
                if (isset($tmp->subscribed_duration))
                    $ArrayList['subscribed_duration'] = $tmp->subscribed_duration;
                if (isset($tmp->unsubscribed_duration))
                    $ArrayList['unsubscribed_duration'] = $tmp->unsubscribed_duration;
                if (isset($tmp->interval_induction))
                    $ArrayList['interval_induction'] = $tmp->interval_induction;


                if (isset($tmp->interval_relaxation))
                    $ArrayList['interval_relaxation'] = $tmp->interval_relaxation;
                if (isset($tmp->interval_bring_them_up))
                    $ArrayList['interval_bring_them_up'] = $tmp->interval_bring_them_up;
                if (isset($tmp->post_content))
                    $ArrayList['detail_description'] = languageManager($tmp->post_content);
                if (isset($tmp->brain_wave_music))
                    $ArrayList['brain_wave_music'] = $this->makeAbsolutePath($tmp->brain_wave_music);

                if (isset($tmp->relaxation_vol))
                    $ArrayList['relaxation_vol'] = $this->makeAbsolutePath($tmp->relaxation_vol);

                if (isset($tmp->bring_them_up_vol))
                    $ArrayList['bring_them_up_vol'] = $this->makeAbsolutePath($tmp->bring_them_up_vol);

                if (isset($tmp->induction_vol))
                    $ArrayList['induction_vol'] = $this->makeAbsolutePath($tmp->induction_vol);

                if (isset($tmp->file_vol))
                    $ArrayList['file_vol'] = $this->makeAbsolutePath($tmp->file_vol);




                $i++;
            }
            return $ArrayList;
        }


        foreach ($product as $item) {
            $tmp = $item;

            $ArrayList[$i]['id'] = $tmp->id;
            $ArrayList[$i]['title'] = languageManager($tmp->post_title);
            $ArrayList[$i]['description'] = languageManager($tmp->description);
            $ArrayList[$i]['demo_url'] = $tmp->demo;
            $ArrayList[$i]['cover_image'] = $tmp->cover;
            $ArrayList[$i]['category'] = $tmp->category;
            $ArrayList[$i]['created_at'] = $tmp->post_date;
            $ArrayList[$i]['updated_at'] = $tmp->post_modified;
            $i++;
        }

        return $ArrayList;

    }


    public function getAllFeelItems($request)
    {
        global $wpdb, $api_response;

        $param = $this->prepare_item_for_database($request);
        //$sp_result = $wpdb->get_results( "call get_all_data_by_feel_likes('',$param->offset,100);" );
        $sp_result = $wpdb->get_results("call get_meditation_list_all($param->offset,100);");
        $sp_session_result = $wpdb->get_results("call get_categories_by_session('');");
        $feel_like_filter_data = array();
        $categories = array();
        $sessions = array();
        //print_r($sp_result);exit;
        // CALL get_all_data_by_post_type('feel',0,100);
        /*$sp_wheal_result = $wpdb->get_results("CALL get_all_data_by_post_type('feel',0,100);" );

        $sp_category_result = $wpdb->get_results("call get_all_categories()" );

        //$feel_like_types = array("Something","FeelingCalm","TakingANap","GettingEnergized","Unplugging","ReleasingTension");
        $feel_like_types = array();
        $categories = array();
        foreach($sp_wheal_result as $sp_wheal_tag){
            $feel_like_types[$sp_wheal_tag->id] = $sp_wheal_tag->post_name;
        }
        foreach($sp_category_result as $sp_category){
            $categories[$sp_category->term_id] = $sp_category->name;
        }
        foreach($sp_result as $row){
            foreach($feel_like_types as $type_key => $feel_like_type){
                if(preg_match("/$feel_like_type/mis",$row->data)){
                    foreach($categories as $cat_key => $category){
                        if(preg_match("/$category/mis",$row->data)){
                            $row->category = $category;
                            $row->category_id = $cat_key;
                            $row->feel_id = $type_key;
                            $feel_like_filter_data[$type_key][$cat_key][] = $this->prepare_item_listing_response(array($row), $request, true );
                        }
                    }
                }
            }
        }*/
        foreach ($sp_session_result as $row) {

            $sessionDuration = $this->getSessionDuration(strtolower($row->session));

            $categories[$row->id]['category_id']        = $row->id;
            $categories[$row->id]['category_title']     = languageManager($row->post_title);
            $categories[$row->id]['category_name']      = $row->post_name;

            $sessions[$row->session_id]['session_id']   = $row->session_id;
            $sessions[$row->session_id]['session']      = $row->session;
            $sessions[$row->session_id]['start_time']   = $sessionDuration["start_time"];
            $sessions[$row->session_id]['end_time']     = $sessionDuration["end_time"];

        }

        foreach ($sp_result as $row) {

            // Converting URLs to Part URLs
            $row->file = $this->getMediaPartURL($row->file);

            $row->induction_url = wp_extract_urls($row->induction_url);
            @$row->induction_url = "[:en]" . $this->getMediaPartURL($row->induction_url[0]) . "[:]";

            $row->relaxation_url = wp_extract_urls($row->relaxation_url);
            @$row->relaxation_url = "[:en]" . $this->getMediaPartURL($row->relaxation_url[0]) . "[:]";

            $row->bring_them_up_url = wp_extract_urls($row->bring_them_up_url);
            @$row->bring_them_up_url = "[:en]" . $this->getMediaPartURL($row->bring_them_up_url[0]) . "[:]";

            $row->brain_wave_music = $row->file;
            //  echo $row->category;
            $row->category = languageManager($row->category);
            //print_r($row->category);
            // @$row->category = "[:en]" . $this->getMediaPartURL($row->category[0]) . "[:]";
            // print_r($row->category);


            $feel_like_filter_data[$row->session_id][$row->category_id][] = $this->prepare_item_listing_response(array($row), $request, true);

            //$categories[$row->category_id] = $row->category;
            //$sessions[$row->session_id] = $row->session;
        }

        $response = rest_ensure_response($feel_like_filter_data);

        if (count($response->data) == 0) {

            $result['code'] = "109";
            $result['message'] = $api_response['109'];
            $result['data'] = $response->data;

        } else {

            $result['code'] = '0';
            $result['message'] = $api_response['0'];
            $result['data']['listing'] = $response->data;
            $result['data']['categories'] = $categories;
            $result['data']['sessions'] = $sessions;

        }
        return $result;
    }


    public function getMeditationById($request)
    {
        global $wpdb, $api_response;

        $param = $this->prepare_item_for_database($request);
        //$sp_result = $wpdb->get_results( "call get_all_data_by_feel_likes('',$param->offset,100);" );
        $sp_result = $wpdb->get_results("call get_meditation_list_all(0,100);");

        $sp_session_result = $wpdb->get_results("call get_categories_by_session('');");
        $feel_like_filter_data = array();
        $categories = array();
        $sessions = array();
        //print_r($sp_result);exit;
        // CALL get_all_data_by_post_type('feel',0,100);
        /*$sp_wheal_result = $wpdb->get_results("CALL get_all_data_by_post_type('feel',0,100);" );

        $sp_category_result = $wpdb->get_results("call get_all_categories()" );

        //$feel_like_types = array("Something","FeelingCalm","TakingANap","GettingEnergized","Unplugging","ReleasingTension");
        $feel_like_types = array();
        $categories = array();
        foreach($sp_wheal_result as $sp_wheal_tag){
            $feel_like_types[$sp_wheal_tag->id] = $sp_wheal_tag->post_name;
        }
        foreach($sp_category_result as $sp_category){
            $categories[$sp_category->term_id] = $sp_category->name;
        }
        foreach($sp_result as $row){
            foreach($feel_like_types as $type_key => $feel_like_type){
                if(preg_match("/$feel_like_type/mis",$row->data)){
                    foreach($categories as $cat_key => $category){
                        if(preg_match("/$category/mis",$row->data)){
                            $row->category = $category;
                            $row->category_id = $cat_key;
                            $row->feel_id = $type_key;
                            $feel_like_filter_data[$type_key][$cat_key][] = $this->prepare_item_listing_response(array($row), $request, true );
                        }
                    }
                }
            }
        }*/
        foreach ($sp_session_result as $row) {

            $sessionDuration = $this->getSessionDuration(strtolower($row->session));

            $categories[$row->id]['category_id']        = $row->id;
            $categories[$row->id]['category_title']     = languageManager($row->post_title);
            $categories[$row->id]['category_name']      = $row->post_name;

            $sessions[$row->session_id]['session_id']   = $row->session_id;
            $sessions[$row->session_id]['session']      = $row->session;
            $sessions[$row->session_id]['start_time']   = $sessionDuration["start_time"];
            $sessions[$row->session_id]['end_time']     = $sessionDuration["end_time"];

        }

        foreach ($sp_result as $row) {

            // Converting URLs to Part URLs
            $row->file = $this->getMediaPartURL($row->file);

            $row->induction_url = wp_extract_urls($row->induction_url);
            @$row->induction_url = "[:en]" . $this->getMediaPartURL($row->induction_url[0]) . "[:]";

            $row->relaxation_url = wp_extract_urls($row->relaxation_url);
            @$row->relaxation_url = "[:en]" . $this->getMediaPartURL($row->relaxation_url[0]) . "[:]";

            $row->bring_them_up_url = wp_extract_urls($row->bring_them_up_url);
            @$row->bring_them_up_url = "[:en]" . $this->getMediaPartURL($row->bring_them_up_url[0]) . "[:]";

            $row->brain_wave_music = $row->file;
            if($row->id == $param->id) {
                $feel_like_filter_data[$row->session_id][$row->category_id][] = $this->prepare_item_listing_response(array($row), $request, true);

            }
            //$categories[$row->category_id] = $row->category;
            //$sessions[$row->session_id] = $row->session;
        }

        $response = rest_ensure_response($feel_like_filter_data);

        if (count($response->data) == 0) {

            $result['code'] = "109";
            $result['message'] = $api_response['109'];
            $result['data'] = $response->data;

        } else {

            $result['code'] = '0';
            $result['message'] = $api_response['0'];
            $result['data']['listing'] = $response->data;
            $result['data']['categories'] = $categories;
            $result['data']['sessions'] = $sessions;

        }
        return $result;
    }

    public function getMeditationByUpdatedIds($request)
    {


        global $wpdb, $api_response;


        $param = $this->prepare_item_for_database($request);
        /* echo $param->target_ids;*/
        $getId = explode(",",$param->target_ids);
        // var_dump($getId);
        $sp_result = $wpdb->get_results("call get_meditation_list_all_by_updated_ids('$param->target_ids',$param->offset,100);");

        $sp_session_result = $wpdb->get_results("call get_categories_by_session('');");


        $feel_like_filter_data = array();
        $categories = array();
        $sessions = array();




        foreach ($sp_result as $row) {
            //echo  $row->category ;
            // Converting URLs to Part URLs
            $row->file = $this->getMediaPartURL($row->file);

            $row->induction_url = wp_extract_urls($row->induction_url);
            @$row->induction_url = "[:en]" . $this->getMediaPartURL($row->induction_url[0]) . "[:]";

            $row->relaxation_url = wp_extract_urls($row->relaxation_url);
            @$row->relaxation_url = "[:en]" . $this->getMediaPartURL($row->relaxation_url[0]) . "[:]";

            $row->bring_them_up_url = wp_extract_urls($row->bring_them_up_url);
            @$row->bring_them_up_url = "[:en]" . $this->getMediaPartURL($row->bring_them_up_url[0]) . "[:]";

            $row->brain_wave_music = $row->file;

            $row->category = languageManager($row->category);
            /*     print_r( $row->category);*/
            // @$row->category = "[:en]" . $this->getMediaPartURL($row->category[0]) . "[:]";

            for($t=0;$t<count($getId);$t++)
                if($row->id == $getId[$t]) {


                    foreach ($sp_session_result as $row_temp) {
                        if($row_temp->id == $row->category_id) {
                            $sessionDuration = $this->getSessionDuration(strtolower($row_temp->session));

                            $categories[$row_temp->id]['category_id'] = $row_temp->id;
                            $categories[$row_temp->id]['category_title'] = languageManager($row_temp->post_title);
                            $categories[$row_temp->id]['category_name'] = $row_temp->post_name;

                            $sessions[$row_temp->session_id]['session_id'] = $row_temp->session_id;
                            $sessions[$row_temp->session_id]['session'] = $row_temp->session;
                            $sessions[$row_temp->session_id]['start_time'] = $sessionDuration["start_time"];
                            $sessions[$row_temp->session_id]['end_time'] = $sessionDuration["end_time"];
                        }
                    }
                    $feel_like_filter_data[$row->session_id][$row->category_id][] = $this->prepare_item_listing_response(array($row), $request, true);

                }
            //$categories[$row->category_id] = $row->category;
            //$sessions[$row->session_id] = $row->session;
        }

        // $response = rest_ensure_response($feel_like_filter_data);
        $response = rest_ensure_response($feel_like_filter_data);
        /*   echo '<pre>';
           var_dump($sp_result);
           echo '</pre>';
           die();*/

        if (count($response->data) == 0) {

            $result['code'] = "109";
            $result['message'] = $api_response['109'];
            $result['data'] = $response->data;

        } else {

            $result['code'] = '0';
            $result['message'] = $api_response['0'];
            $result['data']['listing'] = $response->data;
            $result['data']['categories'] = $categories;
            $result['data']['sessions'] = $sessions;

        }
        return $result;
    }



    public function getSessionsByCategories($request)
    {
        global $wpdb, $api_response;

        $param = $this->prepare_item_for_database($request);

        $sp_session_result = $wpdb->get_results("call get_categories_by_session('');");
        $feel_like_filter_data = array();
        $categories = array();
        $sessions = array();

        $session_duration['morning']['start_time'] = '5';
        $session_duration['morning']['end_time'] = '12';
        $session_duration['afternoon']['start_time'] = '12';
        $session_duration['afternoon']['end_time'] = '17';
        $session_duration['evening']['start_time'] = '17';
        $session_duration['evening']['end_time'] = '21';
        $session_duration['night']['start_time'] = '21';
        $session_duration['night']['end_time'] = '5';

        foreach ($sp_session_result as $row) {

            $row->session = strtolower($row->session);
            $categories[$row->id]['category_id'] = $row->id;
            $categories[$row->id]['category_title'] = languageManager($row->post_title);
            $categories[$row->id]['category_name'] = $row->post_name;

            if (isset($session_duration[$row->session])) {
                $sessions[$row->session_id]['session_id'] = $row->session_id;
                $sessions[$row->session_id]['session'] = $row->session;
                $sessions[$row->session_id]['start_time'] = $session_duration[$row->session]['start_time'];
                $sessions[$row->session_id]['end_time'] = $session_duration[$row->session]['end_time'];
            }
        }

        $response = rest_ensure_response($feel_like_filter_data);

        if (count($sp_session_result) == 0) {

            $result['code'] = "109";
            $result['message'] = $api_response['109'];
            $result['data'] = [];

        } else {

            $result['code'] = '0';
            $result['message'] = $api_response['0'];
            $result['data']['categories'] = $categories;
            $result['data']['sessions'] = $sessions;

        }
        return $result;
    }

    public function getAllSceneItems($request)
    {
        global $wpdb, $api_response;

        $param = $this->prepare_item_for_database($request);
        //$sp_result = $wpdb->get_results( "call get_all_data_by_scene($param->offset,100);" );
        $sp_result = $wpdb->get_results("call get_all_scene_data($param->offset,100);");
        //print_r($sp_result);exit;

        //$sp_wheal_result = $wpdb->get_results("CALL get_all_data_by_scene(0,100);" );
        /*$sp_wheal_result = $wpdb->get_results("CALL get_all_data_by_post_type('feel',0,100);" );
        //print_r($sp_wheal_result);exit;
        $sp_category_result = $wpdb->get_results("call get_all_categories()" );

        //$feel_like_types = array("Something","FeelingCalm","TakingANap","GettingEnergized","Unplugging","ReleasingTension");
        $feel_like_types = array();
        $categories = array();
        foreach($sp_wheal_result as $sp_wheal_tag){
            $feel_like_types[$sp_wheal_tag->id] = $sp_wheal_tag->post_name;
        }
        foreach($sp_category_result as $sp_category){
            if(strtolower($sp_category->name) == 'scene')
                $categories[$sp_category->term_id] = $sp_category->name;
        }*/
        $feel_like_filter_data = array();
        /*foreach($sp_result as $row){
            foreach($feel_like_types as $type_key => $feel_like_type){
                //if(preg_match("/$feel_like_type/mis",$row->data)){
                    foreach($categories as $cat_key => $category){
                        if(preg_match("/$category/mis",$row->data)){
                        //preg_match("'/ms_album=\s*(\d+)\s*/
        /*",$row->data,$match);
                                preg_match("/ms_album=(.*?)(,|$)/mis",$row->data,$match);
                                    $row->category = $category;
                                    $row->category_id = $cat_key;
                                    $row->session = (isset($match[1]))? $match[1] : '';
                                    $row->feel_id = $type_key;
                                    $tmp_scene_gif_data = array();
                                    $tmp_scene_gif_data = explode(',|',$row->scene_gif_data);
                                    if(count($tmp_scene_gif_data) < 4){
                                        $tmp_scene_gif_data[1] = (isset($tmp_scene_gif_data[1])) ? $tmp_scene_gif_data[1] : '';
                                        $tmp_scene_gif_data[2] = (isset($tmp_scene_gif_data[2])) ? $tmp_scene_gif_data[2] : '';
                                        $tmp_scene_gif_data[3] = (isset($tmp_scene_gif_data[3])) ? $tmp_scene_gif_data[3] : '';
                                    }
                                    $row->scene_gif_id = $tmp_scene_gif_data[0];
                                    $row->scene_gif_title = $tmp_scene_gif_data[1];
                                    $row->scene_gif_name = $tmp_scene_gif_data[2];
                                    $row->scene_gif_url = $tmp_scene_gif_data[3];
                                    $feel_like_filter_data[$row->id] = $this->prepare_item_listing_response (array($row), $request, true );
                                }
                            }
                       // }
                    }
                }*/
        foreach ($sp_result as $row) {
            $tmp = new stdClass;
            $url_data = array();


            $tmp->id = $row->ID;
            $tmp->title = languageManager($row->post_title);
            $tmp->name = $row->post_name;
            $tmp->session = '';
            $tmp->mobile = '';
            $tmp->tablet = '';
            $tmp->audio = '';

            preg_match("/rpg_session=(.*?)(,|$)/mis", $row->data, $session_match);
            preg_match("/rpg_all_photos_details=(.*?)(,|$)/mis", $row->data, $url_match);

            if (isset($session_match[1]))
                $tmp->session = $session_match[1];
            if (isset($url_match[1]))
                $url_data = unserialize(unserialize($url_match[1]));

            foreach ($url_data as $url) {

                if (!empty($url['rpg_image_label'])) {
                    // echo substr ($url['rpg_image_url'], strpos($url['rpg_image_url'], '/wp-content'), strlen($url['rpg_image_url'])); die;
                    $tmp->$url['rpg_image_label'] = (!empty($url['rpg_image_url'])) ? substr($url['rpg_image_url'], strpos($url['rpg_image_url'], '/wp-content'), strlen($url['rpg_image_url'])) : '/wp-content/uploads/2016/06/Beach-Sound.mp3';
                    $tmp->$url['rpg_image_label'] = $this->makeAbsolutePath($tmp->$url['rpg_image_label']);
                }
            }
            $feel_like_filter_data[] = $tmp;
        }
        $response = rest_ensure_response($feel_like_filter_data);

        if (count($response->data) == 0) {

            $result['code'] = "202";
            $result['message'] = $api_response['202'];
            $result['data'] = $response->data;

        } else {

            $result['code'] = '0';
            $result['message'] = $api_response['0'];
            $result['data'] = $response->data;
        }
        return $result;
    }

    public function getAllSceneItemsByIds($request)
    {
        global $wpdb, $api_response;

        $param = $this->prepare_item_for_database($request);
        //$sp_result = $wpdb->get_results( "call get_all_data_by_scene($param->offset,100);" );
        $sp_result = $wpdb->get_results("call get_all_scene_data_by_updated_ids('$param->target_ids',$param->offset,100);");
        //print_r($sp_result);exit;

        //$sp_wheal_result = $wpdb->get_results("CALL get_all_data_by_scene(0,100);" );
        /*$sp_wheal_result = $wpdb->get_results("CALL get_all_data_by_post_type('feel',0,100);" );
        //print_r($sp_wheal_result);exit;
        $sp_category_result = $wpdb->get_results("call get_all_categories()" );

        //$feel_like_types = array("Something","FeelingCalm","TakingANap","GettingEnergized","Unplugging","ReleasingTension");
        $feel_like_types = array();
        $categories = array();
        foreach($sp_wheal_result as $sp_wheal_tag){
            $feel_like_types[$sp_wheal_tag->id] = $sp_wheal_tag->post_name;
        }
        foreach($sp_category_result as $sp_category){
            if(strtolower($sp_category->name) == 'scene')
                $categories[$sp_category->term_id] = $sp_category->name;
        }*/
        $feel_like_filter_data = array();
        /*foreach($sp_result as $row){
            foreach($feel_like_types as $type_key => $feel_like_type){
                //if(preg_match("/$feel_like_type/mis",$row->data)){
                    foreach($categories as $cat_key => $category){
                        if(preg_match("/$category/mis",$row->data)){
                        //preg_match("'/ms_album=\s*(\d+)\s*/
        /*",$row->data,$match);
                                preg_match("/ms_album=(.*?)(,|$)/mis",$row->data,$match);
                                    $row->category = $category;
                                    $row->category_id = $cat_key;
                                    $row->session = (isset($match[1]))? $match[1] : '';
                                    $row->feel_id = $type_key;
                                    $tmp_scene_gif_data = array();
                                    $tmp_scene_gif_data = explode(',|',$row->scene_gif_data);
                                    if(count($tmp_scene_gif_data) < 4){
                                        $tmp_scene_gif_data[1] = (isset($tmp_scene_gif_data[1])) ? $tmp_scene_gif_data[1] : '';
                                        $tmp_scene_gif_data[2] = (isset($tmp_scene_gif_data[2])) ? $tmp_scene_gif_data[2] : '';
                                        $tmp_scene_gif_data[3] = (isset($tmp_scene_gif_data[3])) ? $tmp_scene_gif_data[3] : '';
                                    }
                                    $row->scene_gif_id = $tmp_scene_gif_data[0];
                                    $row->scene_gif_title = $tmp_scene_gif_data[1];
                                    $row->scene_gif_name = $tmp_scene_gif_data[2];
                                    $row->scene_gif_url = $tmp_scene_gif_data[3];
                                    $feel_like_filter_data[$row->id] = $this->prepare_item_listing_response (array($row), $request, true );
                                }
                            }
                       // }
                    }
                }*/
        foreach ($sp_result as $row) {
            $tmp = new stdClass;
            $url_data = array();


            $tmp->id = $row->ID;
            $tmp->title = languageManager($row->post_title);
            $tmp->name = $row->post_name;
            $tmp->session = '';
            $tmp->mobile = '';
            $tmp->tablet = '';
            $tmp->audio = '';

            preg_match("/rpg_session=(.*?)(,|$)/mis", $row->data, $session_match);
            preg_match("/rpg_all_photos_details=(.*?)(,|$)/mis", $row->data, $url_match);

            if (isset($session_match[1]))
                $tmp->session = $session_match[1];
            if (isset($url_match[1]))
                $url_data = unserialize(unserialize($url_match[1]));

            foreach ($url_data as $url) {

                if (!empty($url['rpg_image_label'])) {
                    // echo substr ($url['rpg_image_url'], strpos($url['rpg_image_url'], '/wp-content'), strlen($url['rpg_image_url'])); die;
                    $tmp->$url['rpg_image_label'] = (!empty($url['rpg_image_url'])) ? substr($url['rpg_image_url'], strpos($url['rpg_image_url'], '/wp-content'), strlen($url['rpg_image_url'])) : '/wp-content/uploads/2016/06/Beach-Sound.mp3';
                    $tmp->$url['rpg_image_label'] = $this->makeAbsolutePath($tmp->$url['rpg_image_label']);
                }
            }
            $feel_like_filter_data[] = $tmp;
        }
        $response = rest_ensure_response($feel_like_filter_data);

        if (count($response->data) == 0) {

            $result['code'] = "202";
            $result['message'] = $api_response['202'];
            $result['data'] = $response->data;

        } else {

            $result['code'] = '0';
            $result['message'] = $api_response['0'];
            $result['data'] = $response->data;
        }
        return $result;
    }

    public function createFeedback($request)
    {
        global $wpdb, $api_response;

        $param = $this->prepare_item_for_database($request);

        $product_ids = explode(',', $param->product_ids);

        try {
            foreach ($product_ids as $product_id) {

                $data = ["user_id" => $param->user_id, "target_id" => $product_id, "target_type" => 'post',
                    "rating" => $param->rating, 'comments' => $param->comments, 'extra' => $param->extra,
                    "created_at" => date("Y-m-d H:i:s"), "updated_at" => date("Y-m-d H:i:s")];

                $wpdb->insert('gz_feedback', $data);
            }

            $result['code'] = '0';
            $result['message'] = $api_response['0'];
            $result['data'] = [];

        } catch (Exception $e) {
            $result['code'] = "201";
            $result['message'] = $api_response['201'];
            $result['data'] = [];
        }

        return $result;
    }

    public function getAllProductDetail($request)
    {
        global $wpdb, $api_response;

        $param = $this->prepare_item_for_database($request);

        $sp_result = $wpdb->get_results("Call get_all_data_by_product_id('$param->product_ids')");

        $result_data = array();
        foreach ($sp_result as $row) {
            $result_data[] = $this->prepare_item_listing_response(array($row), $request, true);
        }

        $response = rest_ensure_response($result_data);
        if (count($response->data) == 0) {

            $result['code'] = "203";
            $result['message'] = $api_response['203'];
            $result['data'] = $response->data;

        } else {

            $result['code'] = '0';
            $result['message'] = $api_response['0'];
            $result['data'] = $response->data;
        }
        return $result;
    }

    public function createPurchaseProductItems($request)
    {
        global $wpdb, $api_response;

        $param = $this->prepare_item_for_database($request);


        $param->device_type = strtolower($param->device_type);

        if ($param->device_type == 'android') {
            $return = $this->verifyAndroidPurchaseToken($param->extra);
            if ($return['code'] != 0)
                return $return;
        } elseif ($param->device_type == 'ios') {
            $this->verifyIosPurchaseToken($param->extra);
        } else {
            $result['code'] = "2";
            $result['message'] = $api_response['2'];
            $result['data'] = [];
            return $result;
        }

        $sp_result = $wpdb->get_results("Call get_all_data_by_product_id('$param->product_ids')");

        $result_data = array();
        $product_detail = '';
        $amount = 0;


        foreach ($sp_result as $row) {
            $amount = $amount + $row->price;
        }

        $sp_transaction_result = $wpdb->get_results("CALL `create_transaction_logs`($param->user_id,'$param->device_type','$param->product_ids','$amount','product','$param->extra','pending');");

        $transaction_id = $sp_transaction_result[0]->id;

        $qry_str_purchased_product = "
        INSERT INTO gz_purchased_products (user_id,product_id,transaction_id,post_title,post_content,post_date,
        post_modified, time,file,demo,info,cover,price,description,tags,creator,category)
        SELECT '$param->user_id' as user_id, wp.id, '$transaction_id' as transaction_id, wp.post_title,wp.post_content,wp.post_date,wp.post_modified,
ms.time,ms.file,ms.demo,ms.info,ms.cover,ms.price,ms.description,
GROUP_CONCAT(t.name) as name, t.name as creator ,GROUP_CONCAT(tt.taxonomy) as taxonomy
FROM wp_posts as wp
left JOIN wp_msdb_post_data AS ms on ms.id = wp.id
left JOIN wp_term_relationships AS tr ON tr.object_id = wp.id
left JOIN wp_term_taxonomy AS tt ON tt.term_id = tr.term_taxonomy_id
left JOIN wp_terms AS t ON t.term_id = tt.term_id
where wp.id in ($param->product_ids) group by wp.id ";

        $wpdb->get_results($qry_str_purchased_product);


        $response = rest_ensure_response($sp_transaction_result);
        if (count($response->data) == 0) {

            $result['code'] = "204";
            $result['message'] = $api_response['204'];
            $result['data'] = $response->data;

        } else {

            $result['code'] = '0';
            $result['message'] = $api_response['0'];
            $result['data'] = $response->data;
        }
        return $result;
    }

    public function updatePurchaseProductItems($request)
    {
        global $wpdb, $api_response;

        $param = $this->prepare_item_for_database($request);

        $param->status = strtolower($param->status);
        $status_array = array('cancel', 'pending', 'approved');
        $status = 'cancel';

        if (in_array($param->status, $status_array)) {
            $status = $param->status;
        }

        $sp_result = $wpdb->get_results("Call update_transaction_logs_status($param->user_id,$param->transaction_id,'$param->extra','$status')");

        $response = rest_ensure_response($sp_result);
        if (count($response->data) == 0) {

            $result['code'] = "203";
            $result['message'] = $api_response['203'];
            $result['data'] = $response->data;

        } else {

            $response_json['p_message'][0]['status'] = 'purchase';
            $response_json['p_message'][0]['message'] = "Thanks for purchasing from GetZend";
            $response_json['message'] = "Thanks for purchasing from GetZend";

            sendUserNotification($param->user_id, $response_json);

            $result['code'] = '0';
            $result['message'] = $api_response['0'];
            $result['data'] = $response->data;
        }
        return $result;
    }

    public function getPurchaseProductItems($request)
    {
        global $wpdb, $api_response;

        $param = $this->prepare_item_for_database($request);

        $sp_result = $wpdb->get_results("Call get_purchase_list_by_user_id($param->user_id,$param->offset,100)");

        $result_array = array();
        foreach ($sp_result as $row) {
            $result_array[] = $this->prepare_item_listing_response(array($row), $request, true);
        }
        $response = rest_ensure_response($result_array);
        if (count($response->data) == 0) {

            $result['code'] = "205";
            $result['message'] = $api_response['205'];
            $result['data'] = $response->data;

        } else {

            $result['code'] = '0';
            $result['message'] = $api_response['0'];
            $result['data'] = $response->data;
        }
        return $result;
    }

    public function updateMeditationCount($request)
    {
        global $wpdb, $api_response;

        $param = $this->prepare_item_for_database($request);
        $current_date = date('Y-m-d H:i:s');;
        //print "Call create_meditation_count($param->meditation_id,'$current_date',$param->user_id";exit;
        $sp_result = $wpdb->get_results("Call create_meditation_count($param->meditation_id,'$current_date',$param->user_id)");

        $response = rest_ensure_response($sp_result);


        $result['code'] = '0';
        $result['message'] = $api_response['0'];
        $result['data'] = $response->data;

        return $result;
    }

    public function getMediaPartURL($url, $needle = '/wp-content')
    {
        return substr($url, strpos($url, $needle), strlen($url));
    }

    protected function getSessionDuration($seesionId) {
        $session_duration['morning']['start_time'] = '5';
        $session_duration['morning']['end_time'] = '12';
        $session_duration['afternoon']['start_time'] = '12';
        $session_duration['afternoon']['end_time'] = '17';
        $session_duration['evening']['start_time'] = '17';
        $session_duration['evening']['end_time'] = '21';
        $session_duration['night']['start_time'] = '21';
        $session_duration['night']['end_time'] = '5';

        if (!isset($session_duration[$seesionId]))
            return false;

        foreach ($session_duration as $key=>$value) {
            if ($key===$seesionId) {
                return $value;
            }
        }
    }
}
