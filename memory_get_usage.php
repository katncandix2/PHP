<?php

	// 获取内存使用情况
	$m = memory_get_usage();


	for ($i=0; $i <5000 ; $i++) { 
		$arr[] = md5($i);
	}
	$mm = memory_get_usage();
	foreach ($arr as $key => $value) {
		unset($arr[$key]);
	}
	echo memory_get_peak_usage();
	echo '---------------';
	echo $mm - $m;