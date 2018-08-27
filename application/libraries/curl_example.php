<?php
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Curl_Example
{
	private $API_URL;
	
	private $privateKey ='sdh$tf%89Iadff?kfs2!';
	private $publicKey='api_test';
	
	function __construct()
	{
                $this->API_URL = get_protocol().base_url()."api/v1/";
	}
	public function apiCall($forcedInput ='',$directShow=true)
	{
                //if we need to call this not via AJAX but via PHP we will force input 
                if($forcedInput<>'')
                        $rawReq=$forcedInput;
                else	
                        $rawReq=file_get_contents('php://input');

                $postReq = json_decode($rawReq);


                //check method, input method may be different from api server one
                $allowedMethods = array(
                        "get" => "get",
                        "update" => "update",
                        "delete" => "delete",
                        "create" => "create"

                );
                if(!isset($allowedMethods[$postReq->method]))
                        die('invalid api method');

                $req=json_encode($postReq->req);
                $signature =hash_hmac( "sha256", $req, $this->privateKey );
			
                $url = $this->API_URL.$allowedMethods[$postReq->method];
                $params = array(
                  'api_key' => $this->publicKey,
                  'signature' => $signature,      
                  'api_request' => $req
                      );
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $params); 
		//debug curl response
		/*curl_setopt($ch, CURLOPT_VERBOSE, true);
		$verbose = fopen('php://temp', 'w+');
		curl_setopt($ch, CURLOPT_STDERR, $verbose);*/
		//end debug
                $response = curl_exec($ch);
		//parse debug response
		/*if ($response === FALSE) {
			printf("cUrl error (#%d): %s<br>\n", curl_errno($ch),
                        htmlspecialchars(curl_error($ch)));
		}
		rewind($verbose);
		$verboseLog = stream_get_contents($verbose);
		echo "Verbose information:\n<pre>", htmlspecialchars($verboseLog), "</pre>\n";*/
		//
		curl_close($ch);
	
                // $response = json_decode($response, true);
                if($directShow)
                        echo $response;
                else
                        return $response;

                }
}

?>