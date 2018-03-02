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

	$channel->queue_declare('hello', false, false, false, false);
	$msg = new AMQPMessage('Hello World!');
	$channel->basic_publish($msg, '', 'hello');
	echo " [x] Sent 'Hello World!'\n";
	$channel->close();
	$connection->close();