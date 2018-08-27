<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (!function_exists('debug')) 
{
        function debug($array = false, $function = "", $die = false, $line = false) 
        {
                echo "<pre style='background:#fff; color:#000;'>";
                echo "<h3>".$function."</h3>";
                print_r($array);
                if ($line) {
                    echo "<br>LINE :";
                    print_r($line);
                }
                echo "<br><br>" .$_SERVER['REQUEST_URI'];
                echo "</pre>";
                if ($die) 
                {
                        die();
                }
        }
        
}

if (!function_exists('get_protocol'))
{
        function get_protocol()
        {
                if (isset($_SERVER['HTTPS']) &&
                    ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) ||
                    isset($_SERVER['HTTP_X_FORWARDED_PROTO']) &&
                    $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') 
                {
                        $protocol = 'https://';
                }
                else 
                {
                        $protocol = 'http://';
                }
        }
}
