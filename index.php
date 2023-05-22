<?php
require_once  "config.php";
require_once  "session.php";

$profile = $_SESSION["profile"];

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Programmazione Smart Working</title>
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

    <style>
	.mode-calendar {}
	.mode-password { display: none; }
    </style>
    <!-- SERVICE WORKER -->
    <script>
    //if ("serviceWorker" in navigator) {
    //  navigator.serviceWorker.register("5-worker.js");
    //}
    </script>
  
    <script src="jquery.js"></script>    
    
    <!-- JS + CSS -->
    <script src="4b-calendar.js"></script>
	
	<script src="pasqua.js"></script>
	<?php 
	if (in_array("admin", $profile["roles"])) {
	?>	
	<link rel="stylesheet" href="autocomplete.css">
    <script src="autocomplete.js"></script>
	<?php 
	}
	?>
    <script>

		function do_export() {
			location.href = '6c-export.php?year=' + $('#calYear').val() 
					+ '&month=' + $('#calMonth').val();						
		}

		window.profile = <?php echo json_encode($profile); ?>;			

		$( document ).ready(function() {
			
			if (document.getElementById('myInput')) {
				document.getElementById('myInput').onchange = function() {				
					var check = document.getElementById('myInput').value.toLowerCase();			
					$('.calRowEvt').each(function(o, div) { 		
						if (check.trim().lenght == 0) {
							div.style.display = 'block';
							return;
						}					
						if (div.innerHTML.toLowerCase().indexOf(check) >= 0) {
							div.style.display = 'block';
						}
						else {
							div.style.display = 'none';
						}
					});					
				}
			}
			
		});

	function popupCalendar() {		
		$('.mode-calendar').show()
		$('.mode-password').hide()
		cal.show();
	}

	function popupPassword() {		
		$('#psw0').val('');
		$('#psw1').val('');
		$('#psw2').val('');
		$('.mode-calendar').hide()
		$('.mode-password').show()
		cal.show();
	}
		  
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

	  <?php 
	  if (in_array("admin", $profile["roles"])) {
	  ?>	  
	  <div>
		<img src="icon-512.png" onclick="do_export()" style="cursor: pointer; height: 32px; padding-right: 30px;" title="Esporta in file Excel" alt="report"></img>
	  </div>	
	  <div class="autocomplete">
		<input autocomplete="off" class="autocomplete" id="myInput" type="text" name="myCountry" placeholder="filtra risultati ...">
	  </div>	  
	  <?php 
	  }
	  ?>	
		  
      <span style="color: white; font-weight: bolder; opacity: .5; font-size: 6mm; font-style: normal; margin-top: 2px;"><?php echo $profile["organization"]; ?> &nbsp; </span>
      <span style="color: white; font-weight: bolder; padding-top: 4px;"><?php echo $profile["name"] . " " . $profile["surname"]; ?></span>
<!--
      <span style="color: <?php echo $profile["default_color"]; ?>; margin-left: 7px; font-size: 8mm; margin-bottom: 3px;">&#9679;</span>
-->
      <div style="height: 24px; cursor: pointer; margin-left: 8px; margin-top: 2px;" onclick="popupPassword()" title="cambia password">
        <?php include "profile.svg.php"; ?>
      </div>

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
    <dialog id="calForm">
    <form method="dialog" class="mode-calendar">
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
	</form>
<form method="dialog" class="mode-password" autocomplete="off">
      <div id="evtCX2">X</div>
      <h2 class="evt100">CAMBIO PASSWORD</h2>
      <div class="evt100">
        <label>Vecchia password</label>
        <input id="psw0" placeholder="vecchia password ..." type="password" autocomplete="off" required >
      </div>
      <div class="evt100">
        <label>Nuova password</label>
        <input id="psw1" placeholder="nuova password ..." type="password" autocomplete="off" required >
      </div>
      <div class="evt100">
        <label>Ripeti password</label>
        <input id="psw2" placeholder="ripeti nuov password ..." type="password" autocomplete="off" required >
      </div>
      <div class="evt100">
        <input type="submit" value="Aggiorna password">
      </div>
</form>
    </dialog>
  </body>
</html>
