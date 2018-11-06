<?php

//创建Server对象监听127.0.0.1:9502端口SWOOLE_SOCK_UDP
$serv = new swoole_server("127.0.0.1",9502,SWOOLE_PROCESS,SWOOLE_SOCK_UDP);

//监听数据接受事件
$serv->on('Packet',function($serv,$data,$clientInfo){
	$serv->sendto($clientInfo['address'],$clientInfo['port'],"Server ".$data);
	var_dump($clientInfo);
});

$serv->start();