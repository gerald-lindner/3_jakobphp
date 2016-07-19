<!DOCTYPE html>
<html>
<?php $meeting=$_GET['meeting'];?>

		<head>
  <!-- Include meta tag to ensure proper rendering and touch zooming -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Include jQuery Mobile stylesheets -->
  <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
  <!-- Include the jQuery library -->
  <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
  <!-- Include the jQuery Mobile library -->
  <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
</head>
<body>

	<?php
	define('GW_UPLOADPATH', 'bilder/');
//what happens if search button: svall POST, connect to db, start the counter&countermax and enter medical data(max number)
		 $svall=$_GET['user'];	
	 	 $svall_new=$svall."_diag"; //this is my "path of the diag table"
		 $dbc = mysqli_connect('sql311.byethost16.com','b16_17371122','yossarian1','b16_17371122_jakobdata')
    	 or die('Fehler bei Verbindung zu SQL Server.');
		 $query = "SELECT * FROM db1 WHERE svall='$svall'"
		 or die(mysql_error());
		 $result = mysqli_query($dbc,$query)
		 or die(mysql_error());
		 $row = mysqli_fetch_assoc($result)
		 or die(mysql_error());
		 //get counter
		 $counterselect="SELECT MAX(id) AS maxcounter FROM $svall_new";
		 $counterquery= mysqli_query($dbc,$counterselect)
		 or die('Geht net 1');
		 $cresult = mysqli_fetch_array($counterquery)
		 or die('Geht net 2');
		 $counter=$cresult['maxcounter'];
		 session_start();
		 $_SESSION["counter"]=$counter;
		 $_SESSION["countermax"]=$counter;
		 //here the mdata enters
	 	 $mquery = "SELECT * FROM $svall_new WHERE id=$meeting";
	 	 $mresult = mysqli_query($dbc,$mquery);
		 $mrow = mysqli_fetch_assoc($mresult)
		 or die(mysql_error());
		 mysqli_close($dbc);

	?>	
	
<div data-role="page" id="pageone">
  <div data-role="header">
  <h1><?php echo $row["vorname"].' '.$row["nachname"];?> </h1>
  </div>

  <div data-role="main" class="ui-content">
 
		<h1><?php echo $rqde.'. Termin';?> </h1>
		<p><label for="Diagnose 1" >Diagnose 1</label><br /></p>
		<textarea cols="100" rows="6" type="text" name="diagnose1"><?php echo $mrow["diagnose1"];?></textarea><br />
		<label for="Diagnose 2">Diagnose 2</label><br />
		<textarea cols="100" rows="6" type="text" name="diagnose2"><?php echo $mrow["diagnose2"];?></textarea><br />
		<label for="Diagnose 3">Diagnose 3</label><br />
		<textarea cols="100" rows="6" type="text" name="diagnose3"><?php echo $mrow["diagnose3"];?></textarea><br />
		<label for="Diagnose 4">Diagnose 4</label><br />
		<textarea cols="100" rows="6" type="text" name="diagnose4"><?php echo $mrow["diagnose4"];?></textarea><br />
		</p>

  </div>

  <div data-role="footer">
  <h1>Footer Text</h1>
  </div>
</div>

</body>
</html>

