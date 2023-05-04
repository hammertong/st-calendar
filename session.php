<?php
require_once  "config.php";

session_start();

if ( ! isset ($_SESSION["profile"]) ) {

	if (!isset($_SERVER['PHP_AUTH_USER'])) {
		header('WWW-Authenticate: Basic realm="ST Presence"');
		header('HTTP/1.0 401 Unauthorized');
		echo 'Authentication required';
		exit;
	} 
	
	error_log("authenticating " . $_SERVER['PHP_AUTH_USER'] . " ...");

	$username = $_SERVER['PHP_AUTH_USER'];
	$password = $_SERVER['PHP_AUTH_PW'];

	$pdo = new PDO ( "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8") );
	$stm = $pdo->prepare("SELECT `users`.*, `groups`.name as organization from users join `groups` on `users`.grp = `groups`.id where username = :user and userpass = MD5(:pass) and user_status = 1");
	if (FALSE === $stm->execute(array(":user" => $username, ":pass" => $password))) {
		error_log("auth.php::sql error 1 " . json_encode($stm->errorInfo()));
		$pdo = null;
		http_response_code(500);
		die("server error");
	}

	$profile = $stm->fetch(PDO::FETCH_ASSOC);
	if ($profile === FALSE || $profile == null) {
		sleep(2);
		header('WWW-Authenticate: Basic realm="ST Presence"');
		header('HTTP/1.0 401 Unauthorized');
		echo 'Authentication required';    
		$pdo = null;
		exit;    
	}

	$stm = $pdo->prepare("SELECT roles.name, roles.id from profiles join roles on profiles.roleid = roles.id where userid = :userid ");
	if (FALSE === $stm->execute(array(":userid" => $profile["userid"]))) {
		error_log("auth.php::sql error 2 " . json_encode($stm->errorInfo()));
		$pdo = null;
		http_response_code(500);
		die("server error");
	}
	$profile["roles"] = $stm->fetchall(PDO::FETCH_ASSOC);

	$pdo = null;
	
	$_SESSION["profile"] = $profile;

}

