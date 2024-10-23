<?php

    class fcm {
        
        private $key = "AAAAZCH6IWY:APA91bGYYGOGQdsi5lByfFcPRkr4nCrkG_AL1MDk6otn1sgJn6x-9NmbSzK-Kta-v0zrtuJ83MNKPc47GU-ubbZ8CzuZeh0I_PjT5narl7z07grNQ9EcrMWzMs_qotDy8yPwplDdC7-S ";
        private $url = 'https://fcm.googleapis.com/fcm/send';
        //  id is the devices registration token
        
        public function sendGCM($title ,$message ,$data ,$token ,$image ,$android_channel_id) {
                
                // echo "hello";
                
                // if(is_array($token)){
                //         $receiver = 'registration_ids';
                // }
                // elseif(is_string($token)){
                //         $receiver = 'to';
                // }else{
                //         return false;
                // }
                // print_r($token[0]['token']);
                
                $fcmRegIds = array();
                foreach($token as $row){
                    array_push($fcmRegIds, $row['token']);
                }
                
                $fields = array (
                        // $receiver => $token,
                        'registration_ids' => $fcmRegIds,
                        'restricted_package_name (Android only)'=>'com.applica.sarketab',
                        'notification' => [
                                "title" =>$title,
                                "body" => $message,
                                "image" =>$image,
                                "android_channel_id"=>$android_channel_id
                            ],
                        "data"=>$data,
                        );
                $fields = json_encode ( $fields );
                $headers = array (
                        'Authorization: key=' . $this->key,
                        'Content-Type: application/json'
                );

                $ch = curl_init ();
                curl_setopt ( $ch, CURLOPT_URL, $this->url );
                curl_setopt ( $ch, CURLOPT_POST, true );
                curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
                curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
                curl_setopt ( $ch, CURLOPT_POSTFIELDS, $fields );

                $result = curl_exec ( $ch );
                curl_close ( $ch );
                echo $result;
                
                return $result;
        }
        
        
    }

?>
