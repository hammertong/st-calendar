<?php
if (!isset($_SERVER['PHP_AUTH_USER'])) {
    header('WWW-Authenticate: Basic realm="ST Presence"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Authentication required';
    http_response_code(401);
    die("unauthorized");
} 

$username = $_SERVER['PHP_AUTH_USER'];
$password = $_SERVER['PHP_AUTH_PW'];


