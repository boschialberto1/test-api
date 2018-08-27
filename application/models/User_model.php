<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class User_model extends MY_Model
{
        public function __construct() 
        {
                parent::__construct();
                
        }
        
        public function get($array)
        {
                $row = $this->connection->prepare("SELECT * FROM users WHERE name= :name");
                $row->bindParam(":name", $array->username);
                if ($row->execute())
                    return array("hasError"=>false,"result" => $sth->fetch(PDO::FETCH_OBJ));
                else
                    return array("hasError"=>true,"result"=> "NOk");
        }
        
        public function add($array)
        {
                $row = $this->connection->prepare("INSERT INTO users (name) VALUE (:name)");
                $row->bindParam(":name", $array->username);
                if ($row->execute())
                    return array("hasError"=>false,"result" => "OK");
                else
                    return array("hasError"=>true,"result"=> "NOk");
        }
        
        public function update($array)
        {
                $row = $this->connection->prepare("UPDATE users SET name = :name WHERE name = :old_name");  
                $row->bindParam(":old_name", $array->username);
                $row->bindParam(":name", $array->new_username);
                if ($row->execute())
                    return array("hasError"=>false,"result" => "OK");
                else
                    return array("hasError"=>true,"result"=> "NOk");
        }
        
        public function delete($array)
        {
                $row = $this->connection->prepare("DELETE FROM users WHERE name = :name");
                $row->bindParam(":name", $array->username);
                if ($row->execute())
                    return array("hasError"=>false,"result" => "OK");
                else
                    return array("hasError"=>true,"result"=> "NOk");
        }
}