<?php

$http = new swoole_http_server('0.0.0.0',8811);

//设置静态根目录静态优先访问，不走回调
$http->set([
	'document_root'	=> '/home/wwwroot/swoole/demo/data',
	'enable_static_handler' => true
]);

$http->on('request',function($request,$response){
	//$data = $request->get['m'];
	$response->cookie('kirito','lllllll',time()+1800);
	$response->end("<h1>HTTPserver</h1>");
});

$http->start();