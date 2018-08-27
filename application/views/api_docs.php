<h1>API-test Documentation</h1>
<p>Simple test to use API with a DB with schema:<br>
    "users" - id,name.</p>
<h3>API Endpoint</h3>
<ol>
    <li>- $_SERVER['SERVER_NAME'].'/api/v1/'.available method</li>
    <li>- available methods
        <ul>
            <li>create</li>
            <li>update</li>
            <li>delete</li>
            <li>get</li>
        </ul>
    </li>
</ol>

<p>Required request:
<pre>
$x = (object)array(
                        'method'=>'create',
                        'req'=>(object)array("username"=>$this->input->post('username'))
                    );
$params = array(
                  'api_key' => provided public key,
                  'signature' => hash_hmac function with "sha256" ( e.g. hash_hmac( "sha256", $x->req, provided private Key )),      
                  'api_request' => $x->req
                );
curl_setopt($ch, CURLOPT_URL, url. $x->method);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
</pre></p>
<p>Results:
<pre>
    OK: {"hasError":false,"result":"OK"} / {"hasError":false,"result":[user object]}
    NOK: {"hasError":true,"result":"NOk"}
</pre>
</p>
<h2>SAMPLES</h2>
------------------------------------<br>
<a href='/documentation/add_example'>Add User</a><br>
------------------------------------<br>
<a href='/documentation/delete_example'>Delete User</a><br>
------------------------------------<br>
<a href='/documentation/update_example'>Update User</a><br>
------------------------------------<br>
<a href='/documentation/get_example'>Get User</a><br>
------------------------------------<br>
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

