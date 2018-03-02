<?php

require_once __DIR__ . '/vendor/autoload.php';

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;


	$conn_args = array( 
	    'host' => '123.57.218.59',  
	    'port' => '5672',  
	    'login' => 'guest',  
	    'password' => 'guest',  
	); 

	//建立connection
	$connection = new AMQPStreamConnection(
		$conn_args['host'], 
		$conn_args['port'], 
		$conn_args['login'], 
		$conn_args['password']);
	$channel = $connection->channel();

	echo ' [*] Waiting for messages. To exit press CTRL+C', "\n";

	$callback = function($msg) {
 		echo " [x] Received ", $msg->body, "\n";
	};
	
	$channel->basic_consume('hello', '', false, true, false, false, $callback);
	
	while(count($channel->callbacks)) {
    	$channel->wait();
	}
	
	$channel->close();
	$connection->close();
