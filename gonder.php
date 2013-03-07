<?php
session_start();
?>

<?php

 error_reporting(E_ALL);

$port = $_SESSION["port"];  
$ip   = $_SESSION["ip"]  ;
 
	
$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);


if ($socket === false) {
    echo "socket_create() failed: reason: " . socket_strerror(socket_last_error()) . "\n";
} 

$result = socket_connect($socket, $ip, $port);

if ($result === false) {
    echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
}  

$q = $_GET["q"];
echo $q;


socket_write($socket, $q, strlen($q)); 
 
?>

