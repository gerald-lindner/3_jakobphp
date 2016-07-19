<html>
<head>
<!-- for table thingy -->
<style>
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color: #4CAF50;
    color: white;
}
</style>
<!-- link to w3schools -->
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>







	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Test Seite Jakob</title>
	<link rel="stylesheet" type="text/css" href="stylesheet1.css">
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
 <div data-role="panel" id="myPanel">

<h1>Daten</h1>

<form enctype="multipart/form-data" name=daten1 method="POST" action="2_result.php">  <!--input stuff-->
		<p>
		<label for="vorname">Vorname</label><br />
		<input type="text" id="vorname" name="vorname" value="<?php echo $row["vorname"];?>" /><br />
		<label for="nachname">Nachname</label><br />
		<input type="text" id="nachname" name="nachname" value="<?php echo $row["nachname"];?>" /><br />
		<label for="svnummer">Geburtsdatum</label><br />
		<input type="text" id="geburtsdatum" name="geburtsdatum" value="<?php echo $row["geburtsdatum"];?>"  /><br />
		<label for="adresse">Adresse</label><br />
		<input type="text" id="adresse" name="adresse" value="<?php echo $row["adresse"];?>" /><br />	
		<label for="telefon">PLZ</label><br />
		<input type="text" id="plz" name="plz" value="<?php echo $row["plz"];?>" /><br />
		<label for="telefon">Ort</label><br />
		<input type="text" id="ort" name="ort" value="<?php echo $row["ort"];?>"  /><br />
		<label for="mail" />Nationalität</label> <br />
		<input type="text" id="national" name="national" value="<?php echo $row["national"];?>"  /><br />	
		<label for="mail" />Telefon</label> <br />
		<input type="text" id="telefon" name="telefon" value="<?php echo $row["telefon"];?>"  /><br />
		<label for="mail" />Mail</label> <br />
		<input type="text" id="mail" name="mail" value="<?php echo $row["mail"];?>"  /><br />
		
		<label for="mail" />Gewicht</label> <br />
		<input type="text" id="gewicht" name="gewicht" value="<?php echo $row["gewicht"];?>"  /><br />
		<label for="mail" />Größe</label> <br />
		<input type="text" id="grosse" name="grosse" value="<?php echo $row["grosse"];?>"  /><br />
		<label for="mail" />Blutgruppe</label> <br />
		<input type="text" id="blutgruppe" name="blutgruppe" value="<?php echo $row["blutgruppe"];?>"  /><br />

		
		<label for="sonstiges">Sonstiges</label>
		<textarea rows="6" type="text" id="sonstiges" name="sonstiges" ></textarea>
				<!--here the hidden section starts-->
		<input type="hidden" name="svall" value="<?php echo $row["svall"];?>" /><br />
		<input type="file" id="profilbild" name="profilbild" />
		<img src="
		<?php
		$profilbild = $row["profilbild"];
		$target = GW_UPLOADPATH.$profilbild;
		echo $target;
		?>" alt="MISSING JPG" width="92" height="92">
</div></div>



  <div data-role="main" class="ui-content">
    <p>Click on the button below to open the Panel.</p>
    <a href="#myPanel" class="ui-btn ui-btn-inline ui-corner-all ui-shadow">Open Panel</a>
  </div>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
<header id="header">
<div class=innertube3>
		<form id=suche1 method="POST" action="2_result_list.php"> 	
			<span style="float:left;">
		<input class=floated type="text" name="svall" value="<?php echo $row["svall"];?>"/>  
		<form id=suche1 method="POST" action="2_result.php">
		<input class=floated type="submit" value="Suche" name="search" />
		</span>
</form> 
		<form id=suche1 method="POST" action="4_print.php"> 
			<span style="float:right;">
		<input class=floated2 type="submit" value="Drucken" name="print" />
		<input class=floated2 type="hidden" name="svall_print" value="<?php echo $row["svall"];?>" /><br />
		</span>
		</form>
		<form id=suche1 method="POST" action="3_create.php"> 
			<span style="float:right;">
		<input type="submit" value="Neuen Eintrag erstellen" name="search" />
		</span>
		</div>
		</form> 
</header>





<footer id="footer">
		<input id="popUpYes" type="submit" value="Speichern" name="save" />
		
	</footer>

	<main>
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
 			echo '<a href="2_result.php?meeting='.$mrow['id'].'&user='.$row['svall'].'">'.$mrow['id'].' Termin </a>';

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




		</p>
 
</form>
	
   <?php
	//echo $mrow["id"];
	//echo "Max";
	
	echo $_SESSION["counter"]." von "; 
	echo $_SESSION["countermax"];
	echo $target;
	echo $svall_print;
	//echo $nsession;
	//echo $cmquery; 
	//echo $counterquery;
	if (isset($_POST['save'])) {
	echo "Du kommst vom speichern";
	echo $vorname1;
	}
	elseif(isset($_POST['search'])) {
		echo "Du kommst vom suchen";
	}
	echo $temp;
	echo $diagnose1;
?> 
<form id=nachste method="POST" action="2_result.php">
   <input type="hidden" name="svall" value="<?php echo $row["svall"];?>">
    <input type="hidden" name="svall" value="<?php echo $row["svall"];?>" /><br />
    <input type="submit" value="neu" name="neu" />
</form>
  </div>

 	</main>


</div>
</nav>
</p>
</li>
</ul>
	<h1>Bild</h1>
	<ul>
		<form method="POST" action="uploadFile" enctype="multipart/form-data"><p>
		<strong>Hochladen</strong> 
		<input type="file" name="file" /></p>
		</form>
	</ul>
</div>
</nav>	



</body>
</html>
<?php //onsubmit="return confirm('Are you sure you want to submit?');" http://stackoverflow.com/questions/3632530/html-form-submit-button-confirmation-dialog
//http://jsfiddle.net/xwrvxser/1/
?>