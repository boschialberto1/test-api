<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class User extends MY_Controller
{
        private $private_keys;
        public function __construct() {
                parent::__construct();
                //we can have different entry point, use array to store
                //can be hardcoded or stored on db
                $this->private_keys=array(
			"api_test"=>'sdh$tf%89Iadff?kfs2!'
		);
                
                if(!isset($_POST['signature'])||!isset($_POST['api_request'])||!isset($_POST['api_key']))
			die('wrong request');
                //signature must be hash_hmac sha256 for major security
		$expectedSig =hash_hmac( "sha256", $_POST['api_request'], $this->private_keys[$_POST['api_key']] );
		if($expectedSig!=$_POST["signature"])
			die('wrong credentials');
        }
        
        public function get()
        {
                $qParams = json_decode($_POST["api_request"]);
                if (!isset($qParams->username) || empty($qParams->username))
                        die('wrong request from function');
                $result = $this->usermodel->get($qParams);
                echo json_encode($result);
        }
        
        public function update()
        {
                $qParams = json_decode($_POST["api_request"]);
                if ((!isset($qParams->username) || empty($qParams->username)) &&
                        (!isset($qParams->new_username) || empty($qParams->new_username)))
                        die('wrong request from function');
                $result = $this->usermodel->update($qParams);
                echo json_encode($result);
        }
        
        public function delete()
        {
                $qParams = json_decode($_POST["api_request"]);
                if (!isset($qParams->username) || empty($qParams->username))
                        die('wrong request from function');
                $result = $this->usermodel->delete($qParams);
                echo json_encode($result);
        }
        
        public function create()
        {
                $qParams = json_decode($_POST["api_request"]);
                if (!isset($qParams->username) || empty($qParams->username))
                        die('wrong request from function');
                $result = $this->usermodel->add($qParams);
                echo json_encode($result);
        }
}

