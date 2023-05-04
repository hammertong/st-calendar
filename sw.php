<?php

require_once  "config.php";
require_once  "session.php";

//
// TBD usare questa per scaricare l'export csv o altre azioni 
//

$method =  $_SERVER["REQUEST_METHOD"];
if (strcasecmp($method, "POST")) {
    http_response_code(405);
    die("method not allowed");
}

if ($_POST == null || count($_POST) < 3) {
    http_response_code(400);
    die("bad request");
}
$data = $_POST;

if ( ! isset($_SESSION["profile"])) {
    http_response_code(403);
    die("forbidden");
}

$profile = $_SESSION["profile"];
if ( ! isset($profile["userid"])) {
    http_response_code(401);
    die("unauthorized");
}

$userid = $profile["userid"];
$color = $profile["default_color"];

$pdo = new PDO ( "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8") );
$op =intval($data["op"]);

$stm = $pdo->prepare("SELECT * FROM calendar.events where DATE(evt_start) = DATE(:startTime) and userid = :userid;");
if (FALSE === $stm->execute(array(":userid" => $userid, ":startTime" => $data["startTime"]))) {
    error_log("sql error(1): " . json_encode($stm->errorInfo()));
    http_response_code(500);
    die("server error");
}

if ($stm->rowCount() > 0) {
    $stm = $pdo->prepare("DELETE FROM calendar.events where DATE(evt_start) = DATE(:startTime) and userid = :userid;");
    if (FALSE === $stm->execute(array(":userid" => $userid, ":startTime" => $data["startTime"]))) {
        error_log("sql error(3): " . json_encode($stm->errorInfo()));
        http_response_code(500);
        die("server error");
    }
    http_response_code(200);
    die("ok");
}

switch ($op) {
    case 1:
        $text = "SW " . $profile["name"] . " " . $profile["surname"];
        //E.G.: INSERT INTO events (evt_start, evt_end, evt_text, evt_color, evt_bg) VALUES ('2023-04-14 08:30:00', '2023-04-14 17:20:00', 'SW PROVA', '#ffffff', $color) ;
        $stm = $pdo->prepare("INSERT INTO events (
                    evt_start, 
                    evt_end, 
                    evt_text, 
                    evt_color, 
                    evt_bg, 
                    userid ) 
                VALUES (
                    :start, 
                    :end, 
                    :text,                     
                    :fgcolor, 
                    :bgcolor,
                    :userid
                    );");
        if (FALSE === $stm->execute(
                array(
                    ":start" => $data["startTime"],
                    ":end" => $data["endTime"],
                    ":text" => $text,
                    ":userid" => $userid,
                    ":fgcolor" => '#ffffff',
                    ":bgcolor" => $color
                ))) {
            error_log("sql error(2): " . json_encode($stm->errorInfo()));
            http_response_code(500);
            die("server error");
        }        
        http_response_code(200);
        die("ok");
        break;

    case 2: 

        break;
}

$pdo = null;

http_response_code(204);
die("no content");


