<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class MY_Model extends CI_Model
{
        protected $connection;
        public function __construct() {
                parent::__construct();
                $this->connection = new PDO( "mysql:host=localhost;dbname=apitest", "database_user", "top_secret", array(
			 PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION 
		) );
        }
}

