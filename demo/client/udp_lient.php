<?php

//连接swoole udp服务
$client = new swoole_client(SWOOLE_SOCK_UDP);

while(true) {
	//php cli常量
	fwrite(STDOUT,"请输入消息:\n");

	//获取输入信息
	$msg = trim(fgets(STDIN));

	//发送数据给UDP
	$client->sendto("127.0.0.1",9502,$msg);

	//接受来自server数据
	$result = $client->recv();

	echo $result;
}
