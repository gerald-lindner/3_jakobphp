<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Test Seite Jakob</title>
	<link rel="stylesheet" type="text/css" href="stylesheet1.css">
</head>	
<body>		
	<?php
		$svall=$_POST['svall_print'];	
		$dbc = mysqli_connect('sql311.byethost16.com','b16_17371122','yossarian1','b16_17371122_jakobdata')
    	 or die('Fehler bei Verbindung zu SQL Server.');
		 $query = "SELECT * FROM db1 WHERE svall='$svall'"
		 or die(mysql_error());
		 $result = mysqli_query($dbc,$query)
		 or die(mysql_error());
		 $row = mysqli_fetch_assoc($result)
		 or die(mysql_error());
	?>
<header id="header">
	<div class="innertube">
	<p>	
		<form id=suche1 method="POST" action="2_result.php"> 
			<span style="float:left;">
		<input type="text" name="svall" value="<?php echo $row["svall"];?>"/>  
		<input type="submit" value="Suche" name="search" /></span>
				</form> </div>
			<form id=suche1 method="POST" action="4_print.php"> 
				<span style="float:right;">
					<input type="submit" value="Drucken" name="print" /></span>
					<input type="hidden" name="svall_print" value="<?php echo $row["svall"];?>"/>  
				</form>
	<form id=suche1 method="POST" action="3_create.php"> 
		<span style="float:right;">
		<input type="submit" value="Neuen Eintrag erstellen" name="search" />
		</span> 
		</form> 
	</p>
</header>



<nav id="left">
<h1>Daten</h1>

<form name=daten1 method="POST" action="41_arztbrief.php">  <!--input stuff-->
		<p>
		<label for="vorname">Vorname</label><br />
		<input type="text" id="vorname_a1" name="vorname_a1" value="<?php echo $row["vorname"];?>" disabled/><br />
		<label for="nachname">Nachname</label><br />
		<input type="text" id="nachname" name="nachname" value="<?php echo $row["nachname"];?>" disabled/><br />
		<label for="svnummer">SV Nummer</label><br />
		<input type="text" id="svnummer" name="svnummer" value="<?php echo $row["svnummer"];?>"  disabled/><br />
		<label for="adresse">Adresse</label><br />
		<input type="text" id="adresse" name="adresse" value="<?php echo $row["adresse"];?>" disabled/><br />
		<label for="telefon">Telefon</label><br />
		<input type="text" id="telefon" name="telefon" value="<?php echo $row["telefon"];?>"  disabled/><br />
		<label for="mail" />Mail</label> <br />
		<input type="text" id="mail" name="mail" value="<?php echo $row["mail"];?>"  disabled/><br />
		<label for="sonstiges">Sonstiges</label>
		<textarea rows="6" type="text" id="sonstiges" name="sonstiges" disabled></textarea>
				<!--here the hidden section starts-->
		<input type="hidden" name="svall_a1" value="<?php echo $row["svall"];?>"/><br />

<input type="submit" value="Arztbrief erzeugen" />
</nav>

<nav id="right">
<div class="innertube">
<h1><label for="notizen">Notizen</label><br /></h1>
<textarea cols="15" rows="25" type="text" name="notiz" disabled><?php echo $mrow["notiz"];?></textarea><br />
</div>
</nav>


	<main>
		<h1><label for="inhalt">Inhalt</label><br /></h1>
<textarea cols="65" rows="35" type="text" id="inhalt1" name="inhalt1"></textarea><br />
<input type="submit" value="Arztbrief erzeugen" />
</form>
 
 	</main>


	</ul>
</div>
</nav>	



</body>
</html>
<?php //onsubmit="return confirm('Are you sure you want to submit?');" http://stackoverflow.com/questions/3632530/html-form-submit-button-confirmation-dialog
?>