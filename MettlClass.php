<?php

	class MettlAPI{

		private $api_public_key = "cd6e88a2-23e7-4423-8b14-5cf8aeffb622"; 

		private $private_key = "7eacc38f-4d2b-4564-b63a-b5fdba04b9d9";

		function callAPI($api_url, $method = 'GET', $parameters = array()){

			$timestamp = time();

			$concatenated_string = $method . $api_url . "\n" . $this->api_public_key . "\n" . $timestamp;

			$signature = rawurlencode(base64_encode(hash_hmac("sha1", $concatenated_string, $this->private_key, true)));

			//echo 'Signature : '.$signature;

			$api_parameters = "?ak=".$this->api_public_key."&ts=".$timestamp."&asgn=".$signature;

			if(count($parameters) > 0){
				foreach ($parameters as $key => $value) {
					$api_parameters .= '&'.$key.'='.$value;
				}
			}

			$curl = curl_init();
			curl_setopt($curl, CURLOPT_URL, $api_url.$api_parameters);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
			$output = curl_exec($curl);
			$info = curl_getinfo($curl);
			curl_close($curl);

			$result['info'] = $info;
			$result['result'] = json_decode($output);

			return $result;

		}

	}