<?php
$username = $_GET['username'];
$ip = $_GET['ip'];
$port22 = $_GET['port'];
$client_ip = $_SERVER['REMOTE_ADDR'];

$server = 'xd';
$port = 533;

$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
if ($socket === false) {
    echo "" . socket_strerror(socket_last_error());
    exit;
}

$result = socket_connect($socket, $server, $port);
if ($result === false) {
    echo "connect error: " . socket_strerror(socket_last_error($socket));
    exit;
}

$message = $username . "###" . $ip . "###" . $port22;
socket_write($socket, $message, strlen($message));
echo $message;

socket_close($socket);
?>