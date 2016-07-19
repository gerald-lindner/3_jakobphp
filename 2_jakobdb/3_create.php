<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Test Seite Jakob</title>
	<link rel="stylesheet" type="text/css" href="stylesheet1.css">
</head>	
<body>		

<header id="header">
	<div class="innertube">
	<p>	
		<form method="POST" action="0_start.html"> <input type="submit" value="Startseite" name="create" /></form>
	</p>
	</div>
</header>



<nav id="left">
<h1>Daten</h1>

<form enctype="multipart/form-data" name=daten1 method="POST" action="2_result.php">  <!--input stuff-->
		<p>
		<label for="vorname">SV Nummer</label><br />
		<input type="text" id="svall" name="svall"/><br />
		<label for="vorname">Vorname</label><br />
		<input type="text" id="vorname" name="vorname" value="" /><br />
		<label for="nachname">Nachname</label><br />
		<input type="text" id="nachname" name="nachname" value="" /><br />
		<label for="svnummer">Geburtsdatum</label><br />
		<input type="text" id="geburtsdatum" name="geburtsdatum" value=""  /><br />
		<label for="adresse">Adresse</label><br />
		<input type="text" id="adresse" name="adresse" value="" /><br />	
		<label for="telefon">PLZ</label><br />
		<input type="text" id="plz" name="plz" value="" /><br />
		<label for="telefon">Ort</label><br />
		<input type="text" id="ort" name="ort" value=""  /><br />
		<label for="mail" />Nationalität</label> <br />
		<input type="text" id="national" name="national" value=""  /><br />	
		<label for="mail" />Telefon</label> <br />
		<input type="text" id="telefon" name="telefon" value=""  /><br />
		<label for="mail" />Mail</label> <br />
		<input type="text" id="mail" name="mail" value=""  /><br />
		
		<label for="mail" />Gewicht</label> <br />
		<input type="text" id="gewicht" name="gewicht" value=""  /><br />
		<label for="mail" />Größe</label> <br />
		<input type="text" id="grosse" name="grosse" value=""  /><br />
		<label for="mail" />Blutgruppe</label> <br />
		<input type="text" id="blutgruppe" name="blutgruppe" value=""  /><br />

		
		<label for="sonstiges">Sonstiges</label>
		<textarea rows="6" type="text" id="sonstiges" name="sonstiges" ></textarea>
		<input type="file" id="profilbild" name="profilbild" />

</nav>

<nav id="right">
<div class="innertube">

</div>
</nav>
<footer id="footer">
		<input type="submit" value="Speichern" name="create" />
</form>		
	</footer>

	<main>
		<div class=innertube
		<h1>Neuen Personeneintrag erstellen</h1>
<p> Bitte erst Daten eingeben und speichern</p>
</div>
 	</main>





</body>
</html>