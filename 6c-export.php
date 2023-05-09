<?php

require_once "config.php";
require_once "session.php";

require "vendor/autoload.php";
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

define ('COLS', [
	"A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", 
	"N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z",
	"AA", "AB", "AC", "AD", "AE", "AF", "AG", "AH", "AI", "AJ", "AK"
]);

if (!isset($_REQUEST["month"])) {
	http_response_code(400);
	die("missing month");
}

if (!isset($_REQUEST["year"])) {
	http_response_code(400);
	die("missing year");
}

$month 	= $_REQUEST["month"];
$year 	= $_REQUEST["year"];

$sheetName 	= "$year" . "-" . ($month < 10 ? "0" : "" ) . "$month";
$pdo = new PDO ( "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8") );

$stm = $pdo->prepare("SELECT userid, name, surname, default_color FROM users order by surname asc");
if (FALSE === $stm->execute()) {
    error_log("sql error(0): " . json_encode($stm->errorInfo()));
    http_response_code(500);
    die("server error");
}

$users = [];
foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $u) {
	$users[$u["userid"]] = array(
		"surname" => $u["surname"],
		"name" => $u["name"],
		"color" => substr($u["default_color"], 1),
		"evt_list" => []
	);	
}

$stm = $pdo->prepare("SELECT userid, DAY(evt_start) as evt FROM events where MONTH(evt_start) = :month and YEAR(evt_start) = :year;");
if (FALSE === $stm->execute(array(":month" => $month, ":year" => $year))) {
    error_log("sql error(1): " . json_encode($stm->errorInfo()));
    http_response_code(500);
    die("server error");
}

foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $el) {
	array_push ($users[$el["userid"]]["evt_list"], $el["evt"]);
}

$pdo = null;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setTitle($sheetName);

$n = 31;
switch($month) {
	case 2:
		$n = 28;
		if ($year % 4 == 0) {			
			$n = 29;
			if ($year % 100 == 0 && $year % 400 != 0) {
				$n = 28;
			}
		}
		break;
	case 4:
	case 6:
	case 9:
	case 11:
		$n = 30;
		break;
}

$sheet->getColumnDimension("A")->setWidth(20);
$sheet->setCellValue("A1", "Cognome");
$sheet->getColumnDimension("B")->setWidth(20);
$sheet->setCellValue("B1", "Nome");
for ($i = 1; $i <= $n; $i ++) {	
	$sheet->setCellValue(COLS[$i + 1] . "1", $i);
	$sheet->getColumnDimension(COLS[$i + 1])->setWidth(4);
}

$count = 1;
foreach($users as $user) {
	$count ++;
	$sheet->setCellValue("A" . $count, $user["surname"]);
	$sheet->setCellValue("B" . $count, $user["name"]);
	foreach ($user["evt_list"] as $k) {
		$sheet->setCellValue(COLS[$k + 1] . $count, "SW");
		$sheet->getStyle(COLS[$k + 1] . $count . ':' . COLS[$k + 1] . $count)
			->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
			->getStartColor()->setARGB($user["color"]);
	}	
}

$outputFile = "/tmp/SMARTWORKING-$sheetName." . time() . ".xlsx";
$writer = new Xlsx($spreadsheet);
$writer->save($outputFile);

http_response_code(200);            
header('Content-Disposition: attachment; filename="' . basename($outputFile) . '";');
$fp = fopen($outputFile, "rb");
fpassthru($fp);
fclose($fp);
unlink($outputFile);




