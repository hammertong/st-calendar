<?php
require_once  "config.php";
require_once  "session.php";

class Calendar {
  // (A) CONSTRUCTOR - CONNECT TO DATABASE
  private $pdo = null;
  private $stmt = null;
  public $error = "";
  public $profile = null;
  
  function __construct () {
    $this->profile = $_SESSION["profile"];
	$this->pdo = new PDO(
      "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=".DB_CHARSET,
      DB_USER, DB_PASSWORD, [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
  }

  // (B) DESTRUCTOR - CLOSE DATABASE CONNECTION
  function __destruct () {
    if ($this->stmt!==null) { $this->stmt = null; }
    if ($this->pdo!==null) { $this->pdo = null; }
  }

  // (C) HELPER - RUN SQL QUERY
  function query ($sql, $data=null) {
    $this->stmt = $this->pdo->prepare($sql);
    $this->stmt->execute($data);
  }

  // (D) SAVE EVENT
  function save ($start, $end, $txt, $color, $bg, $id=null) {
    // (D1) START & END DATE CHECK
    if (strtotime($end) < strtotime($start)) {
      $this->error = "End date cannot be earlier than start date";
      return false;
    }

    // block double SW insertion
    $this->query(
      "SELECT count(*) as is_present from `events` where DATE (`evt_start`) = DATE(?) and userid = ?", 
      [ $start, $this->profile['userid'] ]
    );
    $check = $this->stmt->fetch();
    if (intval ($check["is_present"]) > 0) return true;
    
    // (D2) RUN SQL
    if ($id==null) {
      $sql = "INSERT INTO `events` (`evt_start`, `evt_end`, `evt_text`, `evt_color`, `evt_bg`, `userid`) VALUES (?,?,?,?,?,?)";
      $data = [$start, $end, strip_tags($txt), $color, $bg, $this->profile['userid']];
    } else {
      $sql = "UPDATE `events` SET `evt_start`=?, `evt_end`=?, `evt_text`=?, `evt_color`=?, `evt_bg`=?, `userid`=? WHERE `evt_id`=?";
      $data = [$start, $end, strip_tags($txt), $color, $bg, $this->profile['userid'], $id];
    }
    $this->query($sql, $data);
    return true;
  }

  // (E) DELETE EVENT
  function del ($id) {
    $this->query("DELETE FROM `events` WHERE `evt_id`=?", [$id]);
    return true;
  }
  
  function getFilterView() {
	//TBD ...
    error_log("check role ...: " . $this->profile["roles"]);
	return "";
  }

  // (F) GET EVENTS FOR SELECTED PERIOD
  function get ($month, $year) {
    // (F1) DATE RANGE CALCULATIONS
    $month = $month<10 ? "0$month" : $month ;
    $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);
    $dateYM = "{$year}-{$month}-";
    $start = $dateYM . "01 00:00:00";
    $end = $dateYM . $daysInMonth . " 23:59:59";

    $filter = $this->getFilterView();     

    // (F2) GET EVENTS
    // s & e : start & end date
    // c & b : text & background color
    // t : event text
    $this->query("SELECT * FROM `events` WHERE (	  
      (`evt_start` BETWEEN ? AND ?)
      OR (`evt_end` BETWEEN ? AND ?)
      OR (`evt_start` <= ? AND `evt_end` >= ?)
    ) $filter ", [$start, $end, $start, $end, $start, $end]);
    $events = [];
    while ($r = $this->stmt->fetch()) {
      $events[$r["evt_id"]] = [
        "s" => $r["evt_start"], "e" => $r["evt_end"],
        "c" => $r["evt_color"], "b" => $r["evt_bg"],
        "t" => $r["evt_text"]
      ];
    }

    // (F3) RESULTS
    return count($events)==0 ? false : $events ;
  }
}

// (H) NEW CALENDAR OBJECT
$_CAL = new Calendar();
