<?php
// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

if (!class_exists('ACCommonFunctions'))
{
	class ACCommonFunctions
	{
		/** Constructor. */
		function __construct()
		{
		}

		public static function acgenerateAccessToken_func($code)
        {
            $ghl_client_id           =   get_option("hft_gohighlevel_client_id");
            $ghl_client_secret       =   get_option("hft_gohighlevel_client_secret");
            $ghl_authorization_uri   =   get_option("hft_authorization_uri");
            
            $ghlresponse = ACCommonFunctions::ac_one_time_get_refresh_token_curl($ghl_client_id, $code, $ghl_client_secret, $ghl_authorization_uri);
			
            $response = json_decode($ghlresponse,true);
            if(!empty($response['access_token']) && !empty($response['refresh_token']) && !empty($response['locationId']))
            {
                // Save token information in WordPress options
                update_option('hft_gohighlevel_access_token', $response['access_token']);
                update_option('hft_gohighlevel_refresh_token', $response['refresh_token']);
                update_option('hft_gohighlevel_token_expires', $response['expires_in']); 
                update_option('hft_gohighlevel_token_type', $response['token_type']);
                update_option('hft_gohighlevel_scope', $response['scope']);
                update_option('hft_gohighlevel_userType', $response['userType']); 
                update_option('hft_gohighlevel_companyId', $response['companyId']);
                update_option('hft_gohighlevel_locationId', $response['locationId']);
                update_option('hft_gohighlevel_userId', $response['userId']);
                update_option("hft_token_timestamp", time());
            }
        }

        /** One time access  Token */
        /*
        public static function ac_one_time_get_refresh_token_curl($ghl_client_id, $code, $ghl_client_secret, $ghl_authorization_uri)
        {
            $curl = curl_init();
            curl_setopt_array($curl, [
            CURLOPT_URL => "https://services.leadconnectorhq.com/oauth/token",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "client_id=$ghl_client_id&client_secret=$ghl_client_secret&grant_type=authorization_code&code=$code&refresh_token=&user_type=Location&redirect_uri=$ghl_authorization_uri",
            CURLOPT_HTTPHEADER => [
                "Accept: application/json",
                "Content-Type: application/x-www-form-urlencoded"
            ],
            ]);

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
            // echo "cURL Error #:" . $err;
            echo "cURL Error #: " . esc_html($err);

            } else {
            //echo $response;
            }
            return $response;
        }
        */
        /** Coverted the curl function code in wp_remote_get */
        public static function ac_one_time_get_refresh_token_curl($ghl_client_id, $code, $ghl_client_secret, $ghl_authorization_uri)
        {
            // Prepare the request body
            $body = [
                'client_id' => $ghl_client_id,
                'client_secret' => $ghl_client_secret,
                'grant_type' => 'authorization_code',
                'code' => $code,
                'refresh_token' => '',
                'user_type' => 'Location',
                'redirect_uri' => $ghl_authorization_uri
            ];

            // Set the request arguments
            $args = [
                'method'      => 'POST',
                'body'        => $body,
                'headers'     => [
                    'Accept'        => 'application/json',
                    'Content-Type'  => 'application/x-www-form-urlencoded',
                ],
                'timeout'     => 30,
            ];

            // Perform the request
            $response = wp_remote_post('https://services.leadconnectorhq.com/oauth/token', $args);

            // Check for any errors
            if (is_wp_error($response)) {
                $error_message = $response->get_error_message();
                echo 'WordPress HTTP Error: ' . esc_html($error_message);
                return null; // Return null or handle error appropriately
            }

            // Return the response body
            return wp_remote_retrieve_body($response);
        }


        /**get_refresh_token */
        /*
        public static function ac_get_refresh_token_curl($ghl_client_id, $ghl_client_secret, $ghl_authorization_uri)
        {
            $refresh_token = get_option('hft_gohighlevel_refresh_token');
			if(!empty($refresh_token))
			{
				$curl = curl_init();
				curl_setopt_array($curl, [
				CURLOPT_URL => "https://services.leadconnectorhq.com/oauth/token",
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => "",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 30,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => "POST",
				//CURLOPT_POSTFIELDS => "client_id=$ghl_client_id&client_secret=$ghl_client_secret&grant_type=authorization_code&code=$code&refresh_token=$refresh_token&user_type=Location&redirect_uri=$ghl_authorization_uri",
				CURLOPT_POSTFIELDS => "client_id=$ghl_client_id&client_secret=$ghl_client_secret&grant_type=refresh_token&refresh_token=$refresh_token&user_type=Location&redirect_uri=$ghl_authorization_uri",
				CURLOPT_HTTPHEADER => [
					"Accept: application/json",
					"Content-Type: application/x-www-form-urlencoded"
				],
				]);

				$response = curl_exec($curl);
				$err = curl_error($curl);

				curl_close($curl);

				if ($err) {
                    echo "cURL Error #: " . esc_html($err);
                // echo "cURL Error #:" . $err;
				} else {
					return $response;
				}
			}
			return false;
        }
        */

        public static function ac_get_refresh_token_curl($ghl_client_id, $ghl_client_secret, $ghl_authorization_uri)
        {
            $refresh_token = get_option('hft_gohighlevel_refresh_token');
			if(!empty($refresh_token))
			{

                $body = [
                    'client_id' => $ghl_client_id,
                    'client_secret' => $ghl_client_secret,
                    'grant_type' => 'refresh_token',
                    'refresh_token' => $refresh_token,
                    'user_type' => 'Location',
                    'redirect_uri' => $ghl_authorization_uri
                ];
            
                // Set the request arguments
                $args = [
                    'method'      => 'POST',
                    'body'        => $body,
                    'headers'     => [
                        'Accept'        => 'application/json',
                        'Content-Type'  => 'application/x-www-form-urlencoded',
                    ],
                    'timeout'     => 30,
                ];
            
                // Perform the request
                $response = wp_remote_post('https://services.leadconnectorhq.com/oauth/token', $args);
            

                if (is_wp_error($response)) {
                    $error_message = $response->get_error_message();
                    echo 'WordPress HTTP Error: ' . esc_html($error_message);
                    return null;
                }
            }
            return false;
        }

        /** Below function returns Access token, renews it if expired and then returns. */
        function ac_get_refreshed_accesstoken_func()
        {
            $current_timestamp          =   time();
            //echo $current_timestamp;
            
            $token_created_timestamp    =   get_option("hft_token_timestamp");
            $token_expires_in_seconds   =   get_option("hft_gohighlevel_token_expires");
			

            /** Check if token time expired. */
            if(($current_timestamp - $token_created_timestamp) >= $token_expires_in_seconds)
            {
                /** Re-generate the access token. */
                $ghl_client_id           =   get_option("hft_gohighlevel_client_id");
                $ghl_client_secret       =   get_option("hft_gohighlevel_client_secret");
                $ghl_authorization_uri   =   get_option("hft_authorization_uri");
                
                $ghlresponse = ACCommonFunctions::ac_get_refresh_token_curl($ghl_client_id, $ghl_client_secret, $ghl_authorization_uri);
                
                $response = json_decode($ghlresponse,true);
				if(!empty($response['access_token']) && !empty($response['locationId']))
                {
                    // Save token information in WordPress options
                    update_option('hft_gohighlevel_access_token', $response['access_token']);
                    update_option('hft_gohighlevel_token_expires', $response['expires_in']); 
                    update_option('hft_gohighlevel_refresh_token', $response['refresh_token']);
                    update_option('hft_gohighlevel_locationId', $response['locationId']);
                    update_option("hft_token_timestamp", time());
                }
            }
            $access_token   =   get_option("hft_gohighlevel_access_token");
            return $access_token;
        }

        /** Get contacts details */
        public static function ac_get_contacts_details($contactsid)
        {
			$access_token =  ACCommonFunctions::ac_get_refreshed_accesstoken_func();
            
            if(!empty($contactsid) && !empty($access_token))
            {
                $curl = curl_init();

                curl_setopt_array($curl, [
                CURLOPT_URL => "https://services.leadconnectorhq.com/contacts/$contactsid",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => [
                    "Accept: application/json",
                    "Authorization: Bearer $access_token",
                    "Version: 2021-07-28"
                ],
                ]);

                $response = curl_exec($curl);
                $err = curl_error($curl);

                curl_close($curl);

                if ($err) 
                {
                    // echo "cURL Error #:" . $err;
                    echo "cURL Error #: " . esc_html($err);
                } 
                else 
                {
                    return $response;
				}   
            }
        }

        /** contacts create */
        public static function ac_contacts_create($userdata)
        {
			$access_token =  ACCommonFunctions::ac_get_refreshed_accesstoken_func();
			if(!empty($access_token) && !empty($userdata))
            {
                $curl = curl_init();

                curl_setopt_array($curl, [
                CURLOPT_URL => "https://services.leadconnectorhq.com/contacts/",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => wp_json_encode($userdata),
                CURLOPT_HTTPHEADER => [
                    "Accept: application/json",
                    "Authorization: Bearer $access_token",
                    "Content-Type: application/json",
                    "Version: 2021-07-28"
                ],
                ]);

                $response = curl_exec($curl);
				
				$err = curl_error($curl);

                curl_close($curl);

                if ($err) 
                {
                    // echo "cURL Error #:" . $err;
                    echo "cURL Error #: " . esc_html($err);
                } 
                else 
                {
                    $responseData = json_decode($response, true);
                    if (!empty($responseData['contact'])) 
                    {
                        // Return the ID of the first contact
                        return $responseData;
                    }
                }
            }
        }

        /** Update contacts */
        public static function ac_update_contacts($contactsid, $userdata)
        {
			$access_token =  ACCommonFunctions::ac_get_refreshed_accesstoken_func();
			if(!empty($contactsid) && !empty($access_token) && !empty($userdata))
            {
                $curl = curl_init();

                curl_setopt_array($curl, [
                CURLOPT_URL => "https://services.leadconnectorhq.com/contacts/$contactsid",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "PUT",
                CURLOPT_POSTFIELDS => wp_json_encode($userdata),
                CURLOPT_HTTPHEADER => [
                    "Accept: application/json",
                    "Authorization: Bearer $access_token",
                    "Content-Type: application/json",
                    "Version: 2021-07-28"
                ],
                ]);

                $response = curl_exec($curl);
				
                $err = curl_error($curl);

                curl_close($curl);

                if ($err) 
                {
                    // echo "cURL Error #:" . $err;
                    echo "cURL Error #: " . esc_html($err);
                } 
                else 
                {
					$responseData = json_decode($response, true);
                    //return $responseData;
                    // Check if contacts exist in the response
                    if (!empty($responseData)) {
                        // Return the ID of the first contact
                        return $responseData;
                    }
                }
            }
        }

        /** GHL User Exists */
        public static function ac_check_ghl_user_exists($locationId, $email)
        {
			
			$access_token =  ACCommonFunctions::ac_get_refreshed_accesstoken_func();
            if(!empty($locationId) && !empty($email) && !empty($access_token))
            {
                $curl = curl_init();

                curl_setopt_array($curl, [
                CURLOPT_URL => "https://services.leadconnectorhq.com/contacts/?locationId=$locationId&query=$email",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => [
                    "Accept: application/json",
                    "Authorization: Bearer $access_token",
                    "Version: 2021-07-28"
                ],
                ]);

                $response = curl_exec($curl);
				
                $err = curl_error($curl);

                curl_close($curl);

                if ($err) {
                    return false;
                }
                else
                { 
                    $responseData = json_decode($response, true);
                    //return $responseData;
                    // Check if contacts exist in the response
                    if (!empty($responseData['contacts'])) {
                        // Return the ID of the first contact
                        return $responseData;
                    }
                }
            }
		} 
    }
}
