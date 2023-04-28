<?php
if (!isset($_SERVER['PHP_AUTH_USER'])) {
    header('WWW-Authenticate: Basic realm="ST Presence"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Authentication required';
    exit;
    //http_response_code(401);
    //die("unauthorized");
} 

$username = $_SERVER['PHP_AUTH_USER'];
$password = $_SERVER['PHP_AUTH_PW'];

$pdo = new PDO ( "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8") );
$stm = $pdo->prepare("SELECT * from users where username = :user and userpass = MD5(:pass)");
if (FALSE === $stm->execute(array(":user" => $username, ":pass" => $password))) {
    error_log("sql error: " . json_encode($stm->errorInfo()));
    http_response_code(500);
    die("server error");
}

$profile = $stm->fetch(PDO::FETCH_ASSOC);
if ($profile === FALSE || $profile == null) {
    http_response_code(403);
    die("forbidden");
}

