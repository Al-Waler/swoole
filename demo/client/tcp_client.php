<?php
//连接swoole tcp服务
$client = new swoole_client(SWOOLE_SOCK_TCP);

if(!$client->connect("127.0.0.1", 9501)) {
	echo "连接失败";
	exit;
}

//php cli常量
fwrite(STDOUT,"请输入消息:");

//获取输入信息
$msg = trim(fgets(STDIN));

//发送数据给 tcp server

$client->send($msg);

//接受来自server数据
$result = $client->recv();

echo $result;
