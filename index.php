<?php
require_once  "config.php";
require_once  "session.php";

$profile = $_SESSION["profile"];

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Calendar Demo</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.5">
    <link rel="icon" type="image/png" href="favicon.png">

    <!-- ANDROID + CHROME + APPLE + WINDOWS APP -->
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="theme-color" content="white">
    <link rel="apple-touch-icon" href="icon-512.png">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Calendar">
    <meta name="msapplication-TileImage" content="icon-512.png">
    <meta name="msapplication-TileColor" content="#ffffff">

    <!-- WEB APP MANIFEST -->
    <!-- https://web.dev/add-manifest/ -->
    <link rel="manifest" href="5-manifest.json">

    <!-- SERVICE WORKER -->
    <script>
    //if ("serviceWorker" in navigator) {
    //  navigator.serviceWorker.register("5-worker.js");
    //}
    </script>
  
    <script src="jquery.js"></script>    
    
    <!-- JS + CSS -->
    <script src="4b-calendar.js"></script>
	
	<link rel="stylesheet" href="autocomplete.css">
    <script src="autocomplete.js"></script>
    <script>

		function autocomplete_filter() {			
			$('.calRowEvt').each(function(o) { 
				//console.log(o); 
				debugger;
			})			
		}

		
		$( document ).ready(function() {
			
			window.profile = <?php echo json_encode($profile); ?>;
					
			var cc = ['federico', 'giuseppe', 'simone'];
			
			//console.log( "ready!" );
			autocomplete(document.getElementById("myInput"), cc);
			
			

		});
		
  
    </script>

    
    <link rel="stylesheet" href="4c-calendar.css">
	
  </head>
  <body>
    <?php
    // (A) DAYS MONTHS YEAR
    $months = [
      1 => "Gennaio", 2 => "Febbraio", 3 => "Marzo", 4 => "Aprile",
      5 => "Maggio", 6 => "Giugno", 7 => "Luglio", 8 => "Agosto",
      9 => "Settembre", 10 => "Ottobre", 11 => "Novembre", 12 => "Dicembre"
    ];    
    $monthNow = date("m");
    $yearNow = date("Y"); ?>

    <!-- (B) PERIOD SELECTOR -->
    <div id="calHead">      
      <div id="calPeriod">
        <input id="calBack" type="button" class="mi" value="&lt;">
        <select id="calMonth"><?php foreach ($months as $m=>$mth) {
          printf("<option value='%u'%s>%s</option>",
            $m, $m==$monthNow?" selected":"", $mth
          );
        } ?></select>
        <input id="calYear" type="number" value="<?=$yearNow?>">
        <input id="calNext" type="button" class="mi" value="&gt;">
      </div>    

	<!--
	  <div class="autocomplete">
		<input autocomplete="off" class="autocomplete" id="myInput" type="text" name="myCountry" placeholder="filtra risultati ...">
	  </div>
	  -->
		  
      <span style="color: white; font-weight: bolder; opacity: .6; font-style: italic;"><?php echo $profile["organization"]; ?> &nbsp; </span>
      <span style="color: white; font-weight: bolder;"><?php echo $profile["name"] . " " . $profile["surname"]; ?></span>
      <span style="color: <?php echo $profile["default_color"]; ?>; margin-left: 7px; font-size: 8mm; margin-bottom: 3px;">&#9679;</span>
      <div style="display: none">
        <input id="calAdd" type="button" value="+">
      </div>	  
	  <!--
	  <a href="logout.php"><img src = "logout.svg" alt="logout" style="height: 24px;"/></a>
	  -->
    </div>

    <!-- (C) CALENDAR WRAPPER -->
    <div id="calWrap">
      <div id="calDays"></div>
      <div id="calBody"></div>
    </div>

    <!-- (D) EVENT FORM -->
    <dialog id="calForm"><form method="dialog">
      <div id="evtCX">X</div>
      <h2 class="evt100">CALENDAR EVENT</h2>
      <div class="evt50">
        <label>Start</label>
        <input id="evtStart" type="datetime-local" required disabled='disabled'>
      </div>
      <div class="evt50">
        <label>End</label>
        <input id="evtEnd" type="datetime-local" required disabled='disabled'>
      </div>
      <div class="evt50" style="display: none;">
        <label>Text Color</label>
        <input id="evtColor" type="color" value="#000000" required disabled='disabled'>
      </div>
      <div class="evt50" style="display: none;">
        <label>Background Color</label>
        <input id="evtBG" type="color" value="#ffdbdb" required disabled='disabled'>
      </div>
      <div class="evt100">
        <label>Event</label>
        <input id="evtTxt" type="text" required disabled='disabled'>
      </div>
      <div class="evt100">
        <input type="hidden" id="evtID">
        <input type="button" id="evtDel" value="Delete">
        <input type="submit" id="evtSave" value="Save">
      </div>
    </form></dialog>
  </body>
</html>