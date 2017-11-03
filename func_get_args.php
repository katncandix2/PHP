<?php
	/*
	函数接收任意参数
	 */
	
	function foo()
	{
		$args = func_get_args();
		foreach ($args as $key => $value) {
			echo $value.',';
		}
	}
	

	foo(1,2,3,4,5);