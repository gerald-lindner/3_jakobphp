<!DOCTYPE html>
<html>
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
	 if (isset($_POST['search'])){	//what happens if search button: svall POST, connect to db, start the counter&countermax and enter medical data(max number)
		 $svall=$_POST['svall'];	
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
	 	 $mquery = "SELECT * FROM $svall_new";
	 	 $mresult = mysqli_query($dbc,$mquery);
		 $mrow = mysqli_fetch_assoc($mresult)
		 or die(mysql_error());
		 mysqli_close($dbc);
	 }
	?>	
	
<div data-role="page" id="pageone">
  <div data-role="header">
  <h1><?php echo $row["vorname"].' '.$row["nachname"];?> </h1>
  </div>

  <div data-role="main" class="ui-content">
 
 		<table>
			<tr>
				<th> Termin </th>
				<th> Diagnose 1 </th>
				<th> Diagnose 2 </th>
				<th> Diagnose 3 </th>
			</tr>
		<div class="innertube">
			<?php 
			while ($mrow = mysqli_fetch_assoc($mresult)) {
			// Display the score data
			echo '<tr>';
			echo '<td>';
 			echo '<a href="7_mresult.php?meeting='.$mrow['id'].'&user='.$row['svall'].'">'.$mrow['id'].' Termin </a>';

			echo '</td>';
			echo '<td>';
			echo $mrow['diagnose2'];
			echo '</td>';
			echo '<td>';
			echo $mrow['id'];
			echo '</td>';
			echo '<td>';
			echo $mrow['id'];
			echo '</td>';
			}
			?>
		</table>
  </div>

  <div data-role="footer">
  <h1>Footer Text</h1>
  </div>
</div>

</body>
</html>

