<?php 

        $db = 'cca_second';
    	$user = 'admin';
    	$passwd = 'westcoast123';

        $data = array(
        	'jsonrpc'=> '2.0',
		    'params'=> [
	            'context'=> [],
	            'db'=> $db,
	            'login'=> $user,
	            'password'=> $passwd,
	        ],
		);


        $data_string = json_encode($data);

        $ch = curl_init('http://localhost:8069/web/session/authenticate');                                                                      
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
		    'Content-Type: application/json',                                                                                
		    'Content-Length: ' . strlen($data_string))                                                                       
		);                                                                                                                   

		$result = curl_exec($ch);

		$result = array(json_decode($result, true));

		$session_id = $result[0]['result']['session_id'];

		var_dump($session_id);
		