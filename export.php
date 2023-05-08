<?php

require_once "config.php";
require_once "session.php";



require "vendor/autoload.php";
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

define ('COLS', [
	"A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", 
	"N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z",
	"AA", "AB", "AC", "AD", "AE", "AF", "AG"
]);

$month 	= 5;
$year 	= 2023;

$sheetName 	= "$year" . "-" . ($month < 10 ? "0" : "" ) . "$month";

$pdo = new PDO ( "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8") );
$stm = $pdo->prepare("SELECT * FROM events where MONTH(evt_start) = :month and YEAR(evt_start) = :year;");
if (FALSE === $stm->execute(array(":month" => $month, ":year" => $year))) {
    error_log("sql error(1): " . json_encode($stm->errorInfo()));
    //http_response_code(500);
    die("server error");
}
$rows = $stm->fetchAll(PDO::FETCH_ASSOC);
$pdo = null;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
//$sheet->setSheetName("$sheetName");

$n = 31;
for ($i = 1; $i <= $n; $i ++) {	
	$sheet->setCellValue(COLS[$i] . "1", $i);
}

$n = 1;
foreach($rows as $row) {
	//TBD...
	$n ++;
	$sheet->setCellValue("A" . $n, $row["evt_text"]);
}

$writer = new Xlsx($spreadsheet);
$writer->save("/run/media/federico/MNTFRC01/repositories/uc_tools/calendar/export." . time() . ".xlsx");

//http_response_code(204);
//die("no content");



