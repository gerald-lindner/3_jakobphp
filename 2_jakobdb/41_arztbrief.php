<?php
session_destroy(); 
$svall=$_POST['svall_a1'];	
$inhalt1=$_POST['inhalt1'];	
$dbc = mysqli_connect('sql311.byethost16.com','b16_17371122','yossarian1','b16_17371122_jakobdata')
    	 or die('Fehler bei Verbindung zu SQL Server.');
$query = "SELECT * FROM db1 WHERE svall='$svall'"
		 or die('1');
		 $result = mysqli_query($dbc,$query)
		 or die('2');
		 $row = mysqli_fetch_assoc($result)
		 or die('3');
		 
		  $vorname = $row["vorname"];
		  $nachname = $row['nachname'];
		  $svnummer = $row['svnummer'];
		  $adresse = $row['adresse'];
		  $telefon = $row['telefon'];
		  $mail = $row['mail'];
		  $sonstiges = $row['sonstiges'];
$html = "
<h1><a name='top'></a>Arztbrief</h1>
<h2>Sehr geehrte Damen und Herren</h2>"
.$inhalt1."
<h3>An ".$inhalt1." ".$nachname."</h3>

";
include("mpdf57/mpdf.php");
$mpdf=new mPDF();
$mpdf->WriteHTML($html);
$mpdf->Output();
?>
