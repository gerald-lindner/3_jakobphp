<html>
<?php $meeting=$_GET['meeting'];
$svall=$_GET['user'];
?>

<head>
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
	 	 $mquery = "SELECT * FROM $svall_new WHERE id=$_SESSION[countermax]";
	 	 $mresult = mysqli_query($dbc,$mquery);
		 $mrow = mysqli_fetch_assoc($mresult)
		 or die(mysql_error());
		 mysqli_close($dbc);
		 
	 }
	 	 elseif (isset($_GET['user'])){	//what happens if search button: svall POST, connect to db, start the counter&countermax and enter medical data(max number)
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
		 
	 }
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 elseif (isset($_POST['save'])){ //the save part
		 $svall=$_POST['svall'];
	 	 $svall_new=$svall."_diag";
		 $vorname = $_POST['vorname'];
		 $nachname = $_POST['nachname'];
		 $geburtsdatum	 = $_POST['geburtsdatum'];
		 $adresse = $_POST['adresse'];
		 $plz = $_POST['plz'];
		 $ort = $_POST['ort'];
		 $national = $_POST['national'];
		 $telefon= $_POST['telefon'];
		 $mail = $_POST['mail'];
		 $gewicht = $_POST['gewicht'];
		 $grosse = $_POST['grosse'];
		 $blutgruppe = $_POST['blutgruppe'];
		 $sonstiges = $_POST['sonstiges'];
		 $profilbild = $_FILES['profilbild']['name'];
		 $profilbild =$svall;
		 $target = GW_UPLOADPATH . $profilbild;
		 move_uploaded_file($_FILES['profilbild']['tmp_name'], $target);
		 //mdata
		 $diagnose1 = $_POST['diagnose1'];
		 $diagnose2 = $_POST['diagnose2'];
		 $diagnose3 = $_POST['diagnose3'];
		 $diagnose4 = $_POST['diagnose4'];
		 $notiz = $_POST['notiz'];
		 
	     
		 $dbc = mysqli_connect('sql311.byethost16.com','b16_17371122','yossarian1','b16_17371122_jakobdata');
    	 $query2 = "UPDATE db1 SET vorname='$vorname', nachname='$nachname', geburtsdatum='$geburtsdatum', plz='$plz', ort='$ort', national='$national', ".
    	 "adresse='$adresse', telefon='$telefon', mail='$mail', gewicht='$gewicht', grosse='$grosse', blutgruppe='$blutgruppe',  sonstiges='$sonstiges', ".
    	 "profilbild='$profilbild' WHERE svall='$svall'"
    	 or die('Fehler bei Verbindung zu SQL Server.1');
		 $result2 = mysqli_query($dbc,$query2)
		  or die('Fehler bei Verbindung zu SQL Server.2');
		 
		 $query = "SELECT * FROM db1 WHERE svall='$svall'";
		 $result = mysqli_query($dbc,$query)
		 or die('Fehler bei Verbindung zu SQL Server.3');
		 $row = mysqli_fetch_assoc($result)
		 or die('Fehler bei Verbindung zu SQL Server.4');
		 
		 //here the mdata enters
		 session_start();
		 $query3 = "UPDATE $svall_new SET diagnose1='$diagnose1', diagnose2='$diagnose2', diagnose3='$diagnose3' , diagnose4='$diagnose4', notiz='$notiz'  WHERE id=$_SESSION[counter]"
		 or die('Fehler bei Verbindung zu SQL Server.133');
		 $result3 = mysqli_query($dbc,$query3)
		 or die('Irgendwas');
		 //selectdata again
		 $mquery = "SELECT * FROM $svall_new WHERE id=$_SESSION[counter]";
	 	 $mresult = mysqli_query($dbc,$mquery);
		 $mrow = mysqli_fetch_assoc($mresult)
		 or die(mysql_error());
		 
	 }

	elseif (isset($_POST['vorige'])){ 
		 session_start();
		 if ($_SESSION["counter"]<=1){ //counter is same if 1
		 	$_SESSION["counter"]=$_SESSION["counter"];
		 }
		 else{ //counter gets minus 1
		 $_SESSION["counter"]=--$_SESSION["counter"];
		 }
		 $svall=$_POST['svall'];	
		 $dbc = mysqli_connect('sql311.byethost16.com','b16_17371122','yossarian1','b16_17371122_jakobdata')
    	 or die('Fehler bei Verbindung zu SQL Server.');
		 $query = "SELECT * FROM db1 WHERE svall='$svall'"
		 or die(mysql_error());
		 $result = mysqli_query($dbc,$query)
		 or die(mysql_error());
		 $row = mysqli_fetch_assoc($result);
		
		 //here the mdata enters
		 $svall_new=$svall."_diag";
	 	 $mquery = "SELECT * FROM $svall_new WHERE id=$_SESSION[counter]";
	 	 $mresult = mysqli_query($dbc,$mquery);
		 $mrow = mysqli_fetch_assoc($mresult)
		 or die(mysql_error());
		 mysqli_close($dbc);


		 
		 //$counter=$counter-1;
		 //$_SESSION["counter"]=$counter;
	}
	elseif (isset($_POST['nachste'])){
		 session_start(); //zählervariable, die raufgeht bis maximum von id
		 if ($_SESSION["counter"]>=$_SESSION["countermax"]){
		 	$_SESSION["counter"]=$_SESSION["counter"];
		 }
		 else{
		 	$_SESSION["counter"]=++$_SESSION["counter"];
		 }
		 $svall=$_POST['svall'];	
		 $dbc = mysqli_connect('sql311.byethost16.com','b16_17371122','yossarian1','b16_17371122_jakobdata')
    	 or die('Fehler bei Verbindung zu SQL Server.');
		 $query = "SELECT * FROM db1 WHERE svall='$svall'"
		 or die(mysql_error());
		 $result = mysqli_query($dbc,$query)
		 or die(mysql_error());
		 $row = mysqli_fetch_assoc($result);
		 //here the mdata enters
		 $svall_new=$svall."_diag";
	 	 $mquery = "SELECT * FROM $svall_new WHERE id=$_SESSION[counter]";
	 	 $mresult = mysqli_query($dbc,$mquery);
		 $mrow = mysqli_fetch_assoc($mresult)
		 or die(mysql_error());
	}
	elseif (isset($_POST['neu'])){ //when new ndiag
		 $svall=$_POST['svall'];

		 $dbc = mysqli_connect('sql311.byethost16.com','b16_17371122','yossarian1','b16_17371122_jakobdata')
    	 or die('Fehler bei Verbindung zu SQL Server.');
		 $query = "SELECT * FROM db1 WHERE svall='$svall'"
		 or die(mysql_error());
		 $result = mysqli_query($dbc,$query)
		 or die(mysql_error());
		 $row = mysqli_fetch_assoc($result);
		 
		 //here the mdata enters
		 session_start();	
		 $_SESSION["counter"]=$_SESSION["countermax"]+1;
		 $nsession=++$_SESSION["countermax"];//new sessions gets +1
		 $svall_new=$svall."_diag";
		 $nquery = "INSERT INTO $svall_new (id) VALUES ('$_SESSION[counter]')";
		 $nresult = mysqli_query($dbc,$nquery);
	 	 $mquery = "SELECT * FROM $svall_new WHERE id=$_SESSION[counter]";
	 	 $mresult = mysqli_query($dbc,$mquery);
		 $mrow = mysqli_fetch_assoc($mresult)
		 or die(mysql_error());
	}
	elseif (isset($_POST['create'])){ //new personal entry
		 $svall=$_POST['svall'];
	 	 $svall_new=$svall."_diag";
		 $vorname = $_POST['vorname'];
		 $nachname = $_POST['nachname'];
		 $geburtsdatum	 = $_POST['geburtsdatum'];
		 $adresse = $_POST['adresse'];
		 $plz = $_POST['plz'];
		 $ort = $_POST['ort'];
		 $national = $_POST['national'];
		 $telefon= $_POST['telefon'];
		 $mail = $_POST['mail'];
		 $gewicht = $_POST['gewicht'];
		 $grosse = $_POST['grosse'];
		 $blutgruppe = $_POST['blutgruppe'];
		 $sonstiges = $_POST['sonstiges'];
		 $profilbild = $_FILES['profilbild']['name'];
		 $profilbild =$svall;
		 $target = GW_UPLOADPATH . $profilbild;
		 move_uploaded_file($_FILES['profilbild']['tmp_name'], $target);
		 
		 $dbc = mysqli_connect('sql311.byethost16.com','b16_17371122','yossarian1','b16_17371122_jakobdata')
    	 or die('Fehler bei Verbindung zu SQL Server.');
		 $cquery = "INSERT INTO db1 (svall, vorname, nachname, geburtsdatum, adresse, plz, ort,
		 telefon, mail, gewicht, grosse, blutgruppe, sonstiges, profilbild, national) VALUES 
		 ('$svall', '$vorname','$nachname', '$geburtsdatum', '$adresse',  '$plz', '$ort',
		 '$telefon', '$mail', '$gewicht', '$grosse', '$blutgruppe', '$sonstiges','$profilbild', $national)";
		 $cresult= mysqli_query($dbc,$cquery)
		 or die('Erstellen Error 1');
		 $query = "SELECT * FROM db1 WHERE svall='$svall'"
		 or die('Erstellen Error 2');
		 $result = mysqli_query($dbc,$query)
		 or die('Such Error 1');
		 $row = mysqli_fetch_assoc($result);
		 
		 $cmquery = "CREATE TABLE $svall_new (id INT, diagnose1 TEXT, diagnose2 TEXT, diagnose3 TEXT, diagnose4 TEXT, notiz TEXT)" 
		 or die("Fehler bei Erstellung der Diagnose Tabelle");
		 $cmresult = mysqli_query($dbc,$cmquery)
		 or die("Fehler bei Erstellung der Diagnose Tabelle");
		 	 
		 //here the mdata enters
		 session_start();	
		 $_SESSION["counter"]=1;
		 $_SESSION["countermax"]=1;
		 $nquery = "INSERT INTO $svall_new (id) VALUES ('$_SESSION[counter]')";
		 $nresult = mysqli_query($dbc,$nquery);
	 	 $mquery = "SELECT * FROM $svall_new WHERE id=$_SESSION[counter]";
	 	 $mresult = mysqli_query($dbc,$mquery);
		 $mrow = mysqli_fetch_assoc($mresult)
		 or die(mysql_error());
	}
	?>	
<header id="header">
<div class=innertube3>
		<form id=suche1 method="POST" action="2_result_list.php"> 	
		<input type="submit" value="liste" name="Listenansicht" />
		</form> 
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



<nav id="left">
	<div class=innertube2>
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
<div>
</nav>

<nav id="right">
<div class="innertube2">
<h1><label for="notizen">Notizen</label><br /></h1>
<textarea cols="15" rows="25" type="text" name="notiz"><?php echo $mrow["notiz"];?></textarea><br />
</div>
</nav>
<footer id="footer">
		<input id="popUpYes" type="submit" value="Speichern" name="save" />
		
	</footer>

	<main>

		<div class="innertube">
		<h1><?php echo $_SESSION[counter].'. Termin';?> </h1>
		<p><label for="Diagnose 1" >Diagnose 1</label><br /></p>
		<textarea cols="100" rows="6" type="text" name="diagnose1"><?php echo $mrow["diagnose1"];?></textarea><br />
		<label for="Diagnose 2">Diagnose 2</label><br />
		<textarea cols="100" rows="6" type="text" name="diagnose2"><?php echo $mrow["diagnose2"];?></textarea><br />
		<label for="Diagnose 3">Diagnose 3</label><br />
		<textarea cols="100" rows="6" type="text" name="diagnose3"><?php echo $mrow["diagnose3"];?></textarea><br />
		<label for="Diagnose 4">Diagnose 4</label><br />
		<textarea cols="100" rows="6" type="text" name="diagnose4"><?php echo $mrow["diagnose4"];?></textarea><br />
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
    <input type="submit" value="vorige" name="vorige" />
    <input type="submit" value="nächste" name="nachste" />
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