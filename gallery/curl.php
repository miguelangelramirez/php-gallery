<?php

        error_reporting(E_ALL); 
        ini_set('display_errors',1);

        $ch = curl_init();  
        $url = "http://twitter.com/statuses/user_timeline/HamillHimself.json";

        curl_setopt($ch, CURLOPT_URL, $url); 

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        curl_setopt($ch, CURLOPT_HEADER, 0);

        $output = json_decode(curl_exec($ch)); 

        if ($output === FALSE) {
                echo "cURL Error" . curl_error($ch);
        }

        curl_close($ch); 

        echo "<pre>";
        print_r($output);
        echo "</pre>";