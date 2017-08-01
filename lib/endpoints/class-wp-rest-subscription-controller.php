<?php

/**
 * Access users
 */
class WP_REST_Subscription_Controller extends WP_REST_Controller {

    public function __construct() {
        $this->namespace = 'public';
        $this->rest_base = 'subscription';
    }

    /**
     * Register the routes for the objects of the controller.
     */
    public function register_routes() {

        // start post request
        register_rest_route( $this->namespace, '/' . $this->rest_base.'/get-music-by-user-id', array(
            array(
                'methods'         => WP_REST_Server::CREATABLE,
                'callback'        => array( $this, 'getMusicByUserId' ),
                'permission_callback' => array( $this, 'signatureValidityCheck' ),
                'args'            => array_merge( $this->get_endpoint_args_for_item_schema( WP_REST_Server::CREATABLE ),
                    // required params
                    array('user_id'    => array('required' => true,),),
                    array('offset'    => array('required' => true,),),
                    array('signature'    => array('required' => true,),)
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

    public function getMusicByUserId( $request ) {
        global $wpdb, $api_response;

        $param = $this->prepare_item_for_database( $request );
        $sp_result = $wpdb->get_results( "call get_my_audio_list($param->user_id,$param->offset,100);" );
        $response = $this->prepare_item_listing_response( $sp_result, $request );
        $response = rest_ensure_response( $response );


        if(count($response->data) == 0){

            $result['code'] = "100";
            $result['message'] = $api_response['100'];
            $result['data'] = $response->data;

        } else{

            $result['code'] = '0';
            $result['message'] = $api_response['0'];
            $result['data'] = $response->data;

        }
        return $result;
    }

    protected function prepare_item_for_database( $request ) {
        $prepared_product = new stdClass;

        if ( isset( $request['user_id'] ) ) {
            $prepared_product->user_id = $request['user_id'];
        }

        if ( isset( $request['offset'] ) ) {
            $prepared_product->offset = $request['offset'];
        }

        if ( isset( $request['signature'] ) ) {
            $prepared_product->signature = $request['signature'];
        }

        return apply_filters( 'rest_pre_insert_user', $prepared_product, $request );
    }

    public function prepare_item_listing_response( $product, $request ) {
        $i=0;
        $ArrayList=[];

        foreach($product as $item){
            $tmp =  $item;

            $ArrayList[$i]['id'] =  $tmp->id;
            $ArrayList[$i]['title'] =   languageManager($tmp->post_title);
            $ArrayList[$i]['description'] =  languageManager($tmp->description);
            $ArrayList[$i]['demo_url'] =  $tmp->demo;
            $ArrayList[$i]['cover_image'] =  $tmp->cover;
            $ArrayList[$i]['category'] =  $tmp->category;
            $ArrayList[$i]['created_at'] =  $tmp->post_date;
            $ArrayList[$i]['updated_at'] =  $tmp->post_modified;
            $i++;
        }

        return $ArrayList;

    }

}
