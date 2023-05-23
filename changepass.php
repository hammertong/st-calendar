<?php

require_once  "config.php";
require_once  "session.php";

$profile = $_SESSION["profile"];

if (! isset($_REQUEST['psw0'])) {
    http_response_code(410);
    die();    
}

if (! isset($_REQUEST['psw1'])) {
    http_response_code(411);
    die();    
}

if (! isset($_REQUEST['psw2'])) {
    http_response_code(412);
    die();    
}

$psw0 = trim($_REQUEST['psw0']);
$psw1 = trim($_REQUEST['psw1']);
$psw2 = trim($_REQUEST['psw2']);

if (1 > strlen($psw0)) {
    http_response_code(413);
    die();    
}

if (8 > strlen($psw1)) {
    http_response_code(414);
    die();    
}

if (strcmp($psw1, $psw2)) {
    http_response_code(415);
    die();    
}

$pdo = new PDO ( "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8") );

$stm = $pdo->prepare("SELECT count(*) as num from users where userpass = md5(:userpass) and userid = :userid");
if (FALSE === $stm->execute(array(":userpass" => $psw0, ":userid" => $profile["userid"]))) {
    error_log("sql error 1 - " . json_encode($stm->errorInfo()));    
    http_response_code(501);
    die();    
}

$r = $stm->fetch(PDO::FETCH_ASSOC);
if ($r["num"] == 0) {
    http_response_code(416);
    die();    
}

$stm = $pdo->prepare("UPDATE users set userpass = md5(:userpass) where userid = :userid");
if (FALSE === $stm->execute(array(":userpass" => $psw1, ":userid" => $profile["userid"]))) {
    error_log("sql error 2 - " . json_encode($stm->errorInfo()));    
    http_response_code(502);
    die();    
}

session_destroy();
http_response_code(200);





