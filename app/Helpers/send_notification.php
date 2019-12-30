<?php


    function sendNotification($account_type, $msg = 'new message',$msg_ar = 'رسالة جديده' ,$player_id = null ,$tag_key="chat",  $data = array())
		{
			if($account_type == 0) //user
			{
					$app_id = "c9e41d02-070e-472c-acb5-4c4a452b442f";
					$auth_key = "YWYyNzg0NjAtMTQxZS00YmQ0LWFlYWYtNTYwMDA0ZWY1ZThh";
			}
			elseif($account_type == 1)//consultant
			{
					$app_id = "c4651496-9a84-4040-bad7-1ccb13c17756";
					$auth_key = "ZjVjMGMwYjAtMWRlNi00MDFhLTg1MDUtNmE2ODcxMDY4Yjhl";
      }
       
        $content = array(
                         "en" => $msg_ar,
                         "ar" => $msg_ar
                         );
       
           $fields = array(
                        'app_id' => "$app_id",
                        'include_player_ids' =>  $player_id,
                        'data' => $data,
                        //'tags' => $daTags,
                        'contents' => $content,
                        'content_available' => false
                        );

        $fields = json_encode($fields);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json; charset=utf-8",
                                                   "Authorization: Basic $auth_key"));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }

    // function sendNotificationToAll($msg = '')
    // {
    //     $content = array(
    //                      "en" => "$msg"
    //                      );
		//
    //     $fields = array(
    //                     'app_id' => "6af10f82-cf99-426b-9339-717a4a9ae988",
    //                     'included_segments' => array('Active Users'),
    //                     'data' => array("foo" => "bar"),
    //                     'contents' => $content
    //                     );
		//
    //     $fields = json_encode($fields);
		//
    //     $ch = curl_init();
    //     curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
    //     curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
    //                                                'Authorization: Basic MDhjMThkZmUtNjIzNy00MDQxLTliZjMtNDA5YjJjZWVlNDVi'));
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    //     curl_setopt($ch, CURLOPT_HEADER, FALSE);
    //     curl_setopt($ch, CURLOPT_POST, TRUE);
    //     curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
    //     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		//
    //     $response = curl_exec($ch);
    //     curl_close($ch);
		//
    //     return $response;
    // }
