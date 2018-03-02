<?php

	class Main extends Thread
	{
		private $word;
		public function __construct($word)
		{
			$this->word = $word;
		}

		public function run()
		{
			echo $this->word;
		}

	}

	$Thread = new Main('hello');
	$Thread->start();