<html>
<script type="text/javascript">
<!--
if (screen.width <= 699) {
document.location = "5_msearch.php";
}
//-->
</script>






    <head>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Test Seite Jakob</title>
		   	<link rel="stylesheet" type="text/css" href="stylesheet1.css">
	</head>
	
	<body>		
	<?php
	session_start(); 						
	$_SESSION['nachname'] = $_POST['nachname'] ?>
		<header id="header">
			<div class="innertube2">
				<p><form id="daten1" method="post" action="2_result_list.php"> <input type="text" id="svall" name="svall" />  <input type="submit" value="Suche" name="search" /></form> </p>
		</div>
		</header>
				
		<main>
			<div class="innertube">
				
				<h1>Medizinische Daten</h1>
				<p>Test</p>
				
			</div>
		</main>

		<nav id="left">
			<div class="innertube">
				<h1>Erstdaten</h1>
				<ul> 
					<li><p><form id="daten1" method="post" action="1_submit.php">  <!--input stuff-->
							<p><label for="vorname">Vorname</label>
	    					<input type="text" id="vorname" name="vorname" /><br />
							<label for="nachname">Nachname</label>
	    					<input type="text" id="nachname" name="nachname" /><br />
	    					<label for="svnummer">SV Nummer</label>
	    					<input type="text" id="svnummer" name="svnummer" /><br />
	    					<label for="adresse">Adresse</label>
	    					<input type="text" id="adresse" name="adresse" /><br />
	    					<label for="telefon">Telefon</label>
	    					<input type="text" id="telefon" name="telefon" /><br />
	    					<label for="mail">Mail</label>
	    					<input type="text" id="mail" name="mail" /><br />
	    					<label for="sonstiges">Sonstiges</label></p>
	    					<textarea rows="6" type="text" id="sonstiges" name="sonstiges" ></textarea>
	    		</form>
			
					</li>

				</ul>
				
				<h1>Bild</h1>
				<ul><form method="POST" action="uploadFile" enctype="multipart/form-data"><p>
					<strong>Hochladen</strong> 
					<input type="file" name="file" /></p>
					</form>
				</ul>

			</div>
		</nav>	
		<div id="right">
			<div class="innertube">
				<p></p>
			</div>
		</div>
		
		<footer id="footer">
			<div class="innertube">
				 <form method="post"><p>
					 <input form="daten1" type="submit" value="Speichern" name="submit" /></p>
				</form> 
			</div>
		</footer>	
			
	</body>
	
</html>