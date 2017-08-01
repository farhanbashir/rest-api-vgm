<?php

/**
 * Access mixer
 */
class WP_REST_Mixer_Controller extends WP_REST_Controller
{

    public function __construct()
    {
        $this->namespace = 'public';
        $this->rest_base = 'mixer';
    }


    /**
     * Register the routes for the objects of the controller.
     */
    public function register_routes()
    {

        // start post request
        register_rest_route($this->namespace, '/' . $this->rest_base . '/create-meditation-mixer', array(
            array(
                'methods' => WP_REST_Server::CREATABLE,
                'callback' => array($this, 'createMeditationMixer'),
                'permission_callback' => array($this, 'signatureValidityCheck'),
                'args' => array_merge($this->get_endpoint_args_for_item_schema(WP_REST_Server::CREATABLE),
                    // required params
                    array('user_id' => array('required' => true,),),
                    array('meditationTitle' => array('required' => true,),),
                    array('meditationDescription' => array('required' => true,),),
                    array('meditationId' => array('required' => true,),)
                ),
            ),

        ));

        //end post request

        // start post request
        register_rest_route($this->namespace, '/' . $this->rest_base . '/get-meditation-mixer-listing', array(
            array(
                'methods' => WP_REST_Server::CREATABLE,
                'callback' => array($this, 'getMeditationMixerListing'),
                'permission_callback' => array($this, 'signatureValidityCheck'),
                'args' => array_merge($this->get_endpoint_args_for_item_schema(WP_REST_Server::CREATABLE),
                    // required params
                    array('user_id' => array('required' => true,),),
                    array('offset' => array('required' => true,),)
                ),
            ),

        ));

        // start post request
        register_rest_route($this->namespace, '/' . $this->rest_base . '/delete-meditation-mixer', array(
            array(
                'methods' => WP_REST_Server::CREATABLE,
                'callback' => array($this, 'deleteMeditationMixer'),
                'permission_callback' => array($this, 'signatureValidityCheck'),
                'args' => array_merge($this->get_endpoint_args_for_item_schema(WP_REST_Server::CREATABLE),
                    // required params
                    array('user_id' => array('required' => true,),),
                    array('mixer_id' => array('required' => true,),)
                ),
            ),

        ));

        //end post request


        // start post request
        register_rest_route($this->namespace, '/' . $this->rest_base . '/update-meditation-mixer', array(
            array(
                'methods' => WP_REST_Server::CREATABLE,
                'callback' => array($this, 'updateMeditationMixer'),
                'permission_callback' => array($this, 'signatureValidityCheck'),
                'args' => array_merge($this->get_endpoint_args_for_item_schema(WP_REST_Server::CREATABLE),
                    // required params
                    array('user_id' => array('required' => true,),),
                    array('id' => array('required' => true,),)
                ),
            ),

        ));

        //end post request


        // start post request
        register_rest_route($this->namespace, '/' . $this->rest_base . '/get-meditation-by-id', array(
            array(
                'methods' => WP_REST_Server::CREATABLE,
                'callback' => array($this, 'getMeditationById'),
                'permission_callback' => array($this, 'signatureValidityCheck'),
                'args' => array_merge($this->get_endpoint_args_for_item_schema(WP_REST_Server::CREATABLE),
                    // required params

                    array('id' => array('required' => true,),)
                ),
            ),

        ));

        //end post request

   // start post request
        register_rest_route($this->namespace, '/' . $this->rest_base . '/get-meditation-list-all', array(
            array(
                'methods' => WP_REST_Server::CREATABLE,
                'callback' => array($this, 'getMeditationListAll'),
                'permission_callback' => array($this, 'signatureValidityCheck'),
                'args' => array_merge($this->get_endpoint_args_for_item_schema(WP_REST_Server::CREATABLE),
                    // required params

                    array('id' => array('required' => true,),)
                ),
            ),

        ));

        //end post request


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

        if (isset($request['id'])) {
            $prepared_product->id = $request['id'];
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
        if (isset($request['meditationTitle'])) {
            $prepared_product->meditationTitle = $request['meditationTitle'];
        }
        if (isset($request['meditationDescription'])) {
            $prepared_product->meditationDescription = $request['meditationDescription'];
        }
        if (isset($request['meditationId'])) {
            $prepared_product->meditationId = $request['meditationId'];
        }

        if (isset($request['meditationName'])) {
            $prepared_product->meditationName = $request['meditationName'];
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

        if (isset($request['back_ground_volume'])) {
            $prepared_product->back_ground_volume = $request['back_ground_volume'];
        }

        if (isset($request['music_volume'])) {
            $prepared_product->music_volume = $request['music_volume'];
        }


        if (isset($request['voice_volume'])) {
            $prepared_product->voice_volume = $request['voice_volume'];
        }


        if (isset($request['meditation_time'])) {
            $prepared_product->meditation_time = $request['meditation_time'];
        }

        if (isset($request['meditation_time_id'])) {
            $prepared_product->meditation_time_id = $request['meditation_time_id'];
        }

        if (isset($request['music_voice_progress'])) {
            $prepared_product->music_voice_progress = $request['music_voice_progress'];
        }

        if (isset($request['background_volume_progress'])) {
            $prepared_product->background_volume_progress = $request['background_volume_progress'];
        }
        if (isset($request['scene_id'])) {
            $prepared_product->scene_id = $request['scene_id'];
        }


        if (isset($request['signature'])) {
            $prepared_product->signature = $request['signature'];
        }

        return apply_filters('rest_pre_insert_mixer', $prepared_product, $request);
    }


    public function updateMeditationMixer($request)
    {
        global $wpdb, $api_response;


        $param = $this->prepare_item_for_database($request);


        $data = array(
            array('back_ground_volume', $param->back_ground_volume),
            array('music_volume', $param->music_volume),
            array('voice_volume', $param->voice_volume),
            array('meditation_time', $param->meditation_time),
            array('meditation_time_id', $param->meditation_time_id),
            array('music_voice_progress', $param->music_voice_progress),
            array('background_volume_progress', $param->background_volume_progress),
            array('scene_id', $param->scene_id),);


        $somedata = json_encode($data, true);

        try {
          $meditationId = (int)$param->id;
          $user_id = (int)$param->user_id;

           $sp_result = $wpdb->get_results("CALL update_gz_meditation_mixer($meditationId,$user_id, '$somedata');");
                //return "CALL update_gz_meditation_mixer($meditationId,$user_id, '$somedata')";
            $response = rest_ensure_response($sp_result);
        } catch (Exception $e) {
            return $e->getMessage();
        }

     if (count($response->data) == 0) {

            $result['code'] = "301";
            $result['message'] = $api_response['301'];
            $result['data'] = $response->data;

        } else {


            $test = json_decode($sp_result[0]->meditation_data);

             for($i=0;$i<count($test);$i++){

                for($f=0;$f<count($test[$i]);$f++){

                     if($test[$i][0]=='back_ground_volume') {
                        $response->data[0]->{'back_ground_volume'} = $test[$i][1];
                    }
                    if($test[$i][0]=='music_volume') {
                        $response->data[0]->{'music_volume'} = $test[$i][1];
                    }
                    if($test[$i][0]=='voice_volume') {
                        $response->data[0]->{'voice_volume'} = $test[$i][1];
                    }
                    if($test[$i][0]=='meditation_time') {
                        $response->data[0]->{'meditation_time'} = $test[$i][1];
                    }
                    if($test[$i][0]=='meditation_time_id') {
                        $response->data[0]->{'meditation_time_id'} = $test[$i][1];
                    }
                    if($test[$i][0]=='music_voice_progress') {
                        $response->data[0]->{'music_voice_progress'} = $test[$i][1];
                    }
                    if($test[$i][0]=='back_ground_volume') {
                        $response->data[0]->{'back_ground_volume'} = $test[$i][1];
                    }
                    if($test[$i][0]=='background_volume_progress') {
                        $response->data[0]->{'background_volume_progress'} = $test[$i][1];
                    }
                    if($test[$i][0]=='scene_id') {
                        $response->data[0]->{'scene_id'} = $test[$i][1];
                    }

                }

            }
            unset($response->data[0]->meditation_data);
            $result['code'] = '0';
            $result['message'] = $api_response['0'];
            $result['data'] = $response->data;

        }
        return $result;
    }

    public function createMeditationMixer($request)
    {
        global $wpdb, $api_response;


        $param = $this->prepare_item_for_database($request);


        $data = array(
            array('back_ground_volume', $param->back_ground_volume),
            array('music_volume', $param->music_volume),
            array('voice_volume', $param->voice_volume),
            array('meditation_time', $param->meditation_time),
            array('meditation_time_id', $param->meditation_time_id),
            array('music_voice_progress', $param->music_voice_progress),
            array('background_volume_progress', $param->background_volume_progress),
            array('scene_id', $param->scene_id),);


        $somedata = json_encode($data, true);
        /*  return $somedata;
        $somedata ='';
        die();*/


        /*  echo $param->user_id;
          echo $param->meditationTitle;
          echo $param->meditationDescription;
          echo $param->meditationId;
          die();*/

        // $sp_result = $wpdb->get_results( "CALL get_gz_meditation_mixer_user_id($param->user_id, 1,100);" );
      /*  create_meditation_mixture`(IN userId INT,IN meditationTitle varchar(120),
IN meditationDescription TEXT,IN meditationId INT, IN meditationName varchar(120),IN meditationData TEXT)*/
        try {
       // return "CALL create_meditation_mixture($param->user_id, '$param->meditationTitle', '$param->meditationDescription',$param->meditationId,'$param->meditationName','$somedata');";

            $sp_result = $wpdb->get_results("CALL create_meditation_mixture($param->user_id, '$param->meditationTitle', '$param->meditationDescription',$param->meditationId,'$param->meditationName','$somedata');");
          /*  var_dump($sp_result);
            die();*/
            /*
           // $meditation_id = $sp_result[0]->id;
           */
          //  var_dump($wpdb->get_results("CALL create_meditation_mixture($param->user_id, '$param->meditationTitle', '$param->meditationDescription',$param->meditationId,'$param->meditationName','$somedata');"));

            $response = rest_ensure_response($sp_result);
        } catch (Exception $e) {
            return $e->getMessage();
        }


        /*    var_dump(rest_ensure_response( $sp_result ));
           die();*/
        if (count($response->data) == 0) {

            $result['code'] = "301";
            $result['message'] = $api_response['301'];
            $result['data'] = $response->data;

        } else {


           $test = json_decode($sp_result[0]->meditation_data);

          //  echo count($test);
            for($i=0;$i<count($test);$i++){

                for($f=0;$f<count($test[$i]);$f++){
                   // $Countries[$country->{"name"}] = $result;

                    if($test[$i][0]=='back_ground_volume') {
                        $response->data[0]->{'back_ground_volume'} = $test[$i][1];
                    }
                    if($test[$i][0]=='music_volume') {
                        $response->data[0]->{'music_volume'} = $test[$i][1];
                    }
                    if($test[$i][0]=='voice_volume') {
                        $response->data[0]->{'voice_volume'} = $test[$i][1];
                    }
                    if($test[$i][0]=='meditation_time') {
                        $response->data[0]->{'meditation_time'} = $test[$i][1];
                    }
                    if($test[$i][0]=='meditation_time_id') {
                        $response->data[0]->{'meditation_time_id'} = $test[$i][1];
                    }
                    if($test[$i][0]=='music_voice_progress') {
                        $response->data[0]->{'music_voice_progress'} = $test[$i][1];
                    }
                    if($test[$i][0]=='back_ground_volume') {
                        $response->data[0]->{'back_ground_volume'} = $test[$i][1];
                    }
                    if($test[$i][0]=='background_volume_progress') {
                        $response->data[0]->{'background_volume_progress'} = $test[$i][1];
                    }
                    if($test[$i][0]=='scene_id') {
                        $response->data[0]->{'scene_id'} = $test[$i][1];
                    }
                 //  $test[$i][1];
                   // echo $test[$i][0]['back_ground_volume'];

                }

            }
           // echo $response->data[0]->back_ground_volume;
      //print_r($test);
/*            "back_grsound_volume": "aaaaaaa",
	"music_volume": "Mixer Title",
	"voice_volume": "this is description",
	"meditation_time": "this is description",
	"meditation_time_id": "this is description",
	"music_voice_progress": "this is description",
	"background_volume_progress": "this is description",*/
            //var_dump($response->data);
            unset($response->data[0]->meditation_data);
            $result['code'] = '0';
            $result['message'] = $api_response['0'];
            $result['data'] = $response->data;

        }
        return $result;
    }

    /*  public function createMeditationMixer( $request ) {
          global $wpdb, $api_response;

          $param = $this->prepare_item_for_database( $request );

          $sp_result = $wpdb->get_results( "CALL create_meditation_mixture($param->user_id, '$param->title',0,'$param->description');" );

          $qry_meditation_detail = "INSERT INTO `gz_meditation_detail`(`meditation_id`,`product_id`,`volume`,`extra`,`created_at`,`updated_at`)
          VALUES";
          $meditation_id = $sp_result[0]->id;
          $qry_meditation_detail_array =array();
          foreach($param->mixture_detail as $mixture_product){
              $qry_meditation_detail_array[] = "(${meditation_id},${mixture_product['product_id']},${mixture_product['volume']}, '${mixture_product['extra']}',NOW(),NOW())";
          }
          $qry_meditation_detail = $qry_meditation_detail . implode(',',$qry_meditation_detail_array);

          $sp_meditation_result = $wpdb->get_results( "$qry_meditation_detail" );
          //$response = $this->prepare_user_item( $sp_result, $request );
          $response = rest_ensure_response( $sp_result );


          if(count($response->data) == 0){

              $result['code'] = "301";
              $result['message'] = $api_response['301'];
              $result['data'] = $response->data;

          } else{

              $result['code'] = '0';
              $result['message'] = $api_response['0'];
              $result['data'] = $response->data;

          }
          return $result;
      }*/

    public function getMeditationMixerListing($request)
    {
        global $wpdb, $api_response;

        $param = $this->prepare_item_for_database($request);

        $sp_result = $wpdb->get_results("CALL get_meditation_mixture_by_user_id($param->user_id, $param->offset,100);");

      /*  var_dump($sp_result);
        die();*/
        $response = rest_ensure_response($sp_result);

        if (count($response->data) == 0) {

            $result['code'] = "303";
            $result['message'] = $api_response['303'];
            $result['data'] = $response->data;

        } else {

          /*  echo count($response->data);
            die();*/
            for($a=0;$a<count($response->data);$a++) {
                $test = json_decode($response->data[$a]->meditation_data);

                //  echo count($test);
                for ($i = 0; $i < count($test); $i++) {

                    for ($f = 0; $f < count($test[$i]); $f++) {
                        // $Countries[$country->{"name"}] = $result;

                        if ($test[$i][0] == 'back_ground_volume') {
                            $response->data[$a]->{'back_ground_volume'} = $test[$i][1];
                        }
                        if ($test[$i][0] == 'music_volume') {
                            $response->data[$a]->{'music_volume'} = $test[$i][1];
                        }
                        if ($test[$i][0] == 'voice_volume') {
                            $response->data[$a]->{'voice_volume'} = $test[$i][1];
                        }
                        if ($test[$i][0] == 'meditation_time') {
                            $response->data[$a]->{'meditation_time'} = $test[$i][1];
                        }
                        if ($test[$i][0] == 'meditation_time_id') {
                            $response->data[$a]->{'meditation_time_id'} = $test[$i][1];
                        }
                        if ($test[$i][0] == 'music_voice_progress') {
                            $response->data[$a]->{'music_voice_progress'} = $test[$i][1];
                        }
                        if ($test[$i][0] == 'back_ground_volume') {
                            $response->data[$a]->{'back_ground_volume'} = $test[$i][1];
                        }
                        if ($test[$i][0] == 'background_volume_progress') {
                            $response->data[$a]->{'background_volume_progress'} = $test[$i][1];
                        }
                        if ($test[$i][0] == 'scene_id') {
                            $response->data[$a]->{'scene_id'} = $test[$i][1];
                        }
                        //  $test[$i][1];
                        // echo $test[$i][0]['back_ground_volume'];

                    }

                }
                unset($response->data[$a]->meditation_data);
            }

            $result['code'] = '0';
            $result['message'] = $api_response['0'];
            $result['data'] = $response->data;

        }
        return $result;
    }

    public function getMeditationById($request)
    {
        global $wpdb, $api_response;


        $param = $this->prepare_item_for_database($request);

        $sp_result = $wpdb->get_results("call get_meditation_by_id($param->id);");
        $sp_session_result = $wpdb->get_results("call get_categories_by_session('');");

        $feel_like_filter_data = array();
        $categories = array();
        $sessions = array();



      /*  foreach ($sp_session_result as $row) {

          //  $sessionDuration = $this->getSessionDuration(strtolower($row->session));

            $categories[$row->id]['category_id']        = $row->id;
            $categories[$row->id]['category_title']     = languageManager($row->post_title);
            $categories[$row->id]['category_name']      = $row->post_name;

            //$sessions[$row->session_id]['session_id']   = $row->session_id;
           // $sessions[$row->session_id]['session']      = $row->session;
            $sessions[$row->session_id]['start_time']   = $sessionDuration["start_time"];
            $sessions[$row->session_id]['end_time']     = $sessionDuration["end_time"];

        }*/



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


    public function getMeditationListAll($request)
    {
        global $wpdb, $api_response;

        $param = $this->prepare_item_for_database($request);

        $sp_result = $wpdb->get_results("CALL get_meditation_list_all($param->id,100);");

    /* var_dump($sp_result);
        die();
    */    $response = rest_ensure_response($sp_result);

        if (count($response->data) == 0) {

            $result['code'] = "303";
            $result['message'] = $api_response['303'];
            $result['data'] = $response->data;

        } else {

          /*  echo count($response->data);
            die();*/
            for($a=0;$a<count($response->data);$a++) {
                $test = json_decode($response->data[$a]->meditation_data);

                //  echo count($test);
                for ($i = 0; $i < count($test); $i++) {

                    for ($f = 0; $f < count($test[$i]); $f++) {
                        // $Countries[$country->{"name"}] = $result;

                        if ($test[$i][0] == 'back_ground_volume') {
                            $response->data[$a]->{'back_ground_volume'} = $test[$i][1];
                        }
                        if ($test[$i][0] == 'music_volume') {
                            $response->data[$a]->{'music_volume'} = $test[$i][1];
                        }
                        if ($test[$i][0] == 'voice_volume') {
                            $response->data[$a]->{'voice_volume'} = $test[$i][1];
                        }
                        if ($test[$i][0] == 'meditation_time') {
                            $response->data[$a]->{'meditation_time'} = $test[$i][1];
                        }
                        if ($test[$i][0] == 'meditation_time_id') {
                            $response->data[$a]->{'meditation_time_id'} = $test[$i][1];
                        }
                        if ($test[$i][0] == 'music_voice_progress') {
                            $response->data[$a]->{'music_voice_progress'} = $test[$i][1];
                        }
                        if ($test[$i][0] == 'back_ground_volume') {
                            $response->data[$a]->{'back_ground_volume'} = $test[$i][1];
                        }
                        if ($test[$i][0] == 'background_volume_progress') {
                            $response->data[$a]->{'background_volume_progress'} = $test[$i][1];
                        }if ($test[$i][0] == 'scene_id') {
                            $response->data[$a]->{'scene_id'} = $test[$i][1];
                        }
                        //  $test[$i][1];
                        // echo $test[$i][0]['back_ground_volume'];

                    }

                }
                unset($response->data[$a]->meditation_data);
            }

            $result['code'] = '0';
            $result['message'] = $api_response['0'];
            $result['data'] = $response->data;

        }
        return $result;
    }

    public function deleteMeditationMixer($request)
    {
        global $wpdb, $api_response;

        $param = $this->prepare_item_for_database($request);

        $sp_result = $wpdb->get_results("CALL delete_gz_meditation_mixer($param->user_id, $param->mixer_id);");

        $response = rest_ensure_response($sp_result);

        if (count($response->data) == 0) {

            $result['code'] = "302";
            $result['message'] = $api_response['302'];
            $result['data'] = $response->data;

        } else {

            $result['code'] = '0';
            $result['message'] = $api_response['0'];
            $result['data'] = $response->data;

        }
        return $result;
    }

    public function getMediaPartURL($url, $needle = '/wp-content')
    {
        return substr($url, strpos($url, $needle), strlen($url));
    }


    protected function getSessionDuration($seesionId) {
        $session_duration['morning']['start_time'] = '5';
        $session_duration['morning']['end_time'] = '12';
        $session_duration['midday']['start_time'] = '12';
        $session_duration['afternoon']['end_time'] = '17';
        $session_duration['afternoon']['start_time'] = '17';
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
