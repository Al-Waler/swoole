<?php
$server = new swoole_websocket_server("0.0.0.0", 9501);

//加载静态资源
/*$server->set([
	'document_root'	=> '/home/wwwroot/swoole/demo/data',
	'enable_static_handler' => true
]);*/
//监听websocket连接打开事件
$server->on('open', 'onopen');

function onopen($server,$request) {
	print_r($request->fd);
}

//监听ws消息事件
$server->on('message', function (swoole_websocket_server $server, $frame) {
    echo "receive from {$frame->fd}:{$frame->data},opcode:{$frame->opcode},fin:{$frame->finish}\n";
    $server->push($frame->fd, "kirito-push-succsss");
});

$server->on('close', function ($ser, $fd) {
    echo "client {$fd} closed\n";
});

$server->start();