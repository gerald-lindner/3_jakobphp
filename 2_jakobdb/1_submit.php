<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Test Seite Jakob</title>
		<style type="text/css">
		
		body {
			margin: 0;
			padding: 0;
			overflow: hidden;
			height: 100%; 
			max-height: 100%; 
			font-family:Sans-serif;
			line-height: 1.5em;
		}

		main {
			position: fixed;
			top: 50px; /* Set this to the height of the header */
			bottom: 50px; /* Set this to the height of the footer */
			left: 200px; 
			right: 200px;
			overflow: auto; 
			background: #fff;
		}
				
		#header {
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 50px; 
			overflow: hidden; /* Disables scrollbars on the header frame. To enable scrollbars, change "hidden" to "scroll" */
			background: #BCCE98;
		}

		#footer {
			position: absolute;
			left: 0;
			bottom: 0;
			width: 100%;
			height: 50px; 
			overflow: hidden; /* Disables scrollbars on the footer frame. To enable scrollbars, change "hidden" to "scroll" */
			background: #BCCE98;
		}
				
		#left {
			position: absolute; 
			top: 50px; /* Set this to the height of the header */
			bottom: 50px; /* Set this to the height of the footer */
			left: 0; 
			width: 200px;
			overflow: auto; /* Scrollbars will appear on this frame only when there's enough content to require scrolling. To disable scrollbars, change to "hidden", or use "scroll" to enable permanent scrollbars */
			background: #DAE9BC; 		
		}

		#right {
			position: absolute; 
			top: 50px; /* Set this to the height of the header */
			bottom: 50px; /* Set this to the height of the footer */
			right: 0; 
			width: 200px;
			overflow: auto; /* Scrollbars will appear on this frame only when there's enough content to require scrolling. To disable scrollbars, change to "hidden", or use "scroll" to enable permanent scrollbars */
			background: #F7FDEB; 		
		}
				
		.innertube {
			margin: 15px; /* Provides padding for the content */
		}
		
		p {
			color: #555;
		}

		nav ul {
			list-style-type: none;
			margin: 0;
			padding: 0;
		}
		
		nav ul a {
			color: darkgreen;
			text-decoration: none;
		}
				
		/*IE6 fix*/
		* html body{
			padding: 50px 200px 50px 200px; /* Set the first value to the height of the header, the second value to the width of the right column, third value to the height of the footer, and last value to the width of the left column */
		}
		
		* html main{ 
			height: 100%; 
			width: 100%; 
		}

		</style>
		

	
	</head>
	
	<body>	
		<?php
		  $vorname = $_POST['vorname'];
		  $nachname = $_POST['nachname'];
		  $svnummer = $_POST['svnummer'];
		  $adresse = $_POST['adresse'];
		  $telefon = $_POST['telefon'];
		  $mail = $_POST['mail'];
		  $sonstiges = $_POST['sonstiges'];
		 
		 $dbc = mysqli_connect('sql311.byethost16.com','b16_17371122','yossarian1','b16_17371122_jakobdata')
    	 or die('Fehler bei Verbindung zu SQL Server.');
		
		 $query = "INSERT INTO db1 (vorname, nachname, svnummer, adresse, telefon, mail, sonstiges) VALUES ('$vorname','$nachname', '$svnummer', '$adresse', '$telefon', '$mail', '$sonstiges')";
		 $result = mysqli_query($dbc,$query)
		 or die('Fehler bei Verbindung zu Datenbank. Verbindung zu Server besteht.');
		?>	
		<header id="header">
			<div class="innertube">
				<p>Anlegen von Patienten-Daten</p>
			</div>
		</header>
				
		<main>
			<div class="innertube">
				
				<h1>Medizinische Daten</h1>
				<p></p>
				
			</div>
		</main>

		<nav id="left">
			<div class="innertube">
				<h1>Erstdaten</h1>
				<ul> 
					<li><form method="post">  <!--input stuff-->
							<label for="vorname">Vorname</label>
	    					<input type="text" id="vorname" name="Nachname" /><br />
							<label for="nachname">Nachname</label>
	    					<input type="text" id="nachname" name="vorname" /><br />
	    					<label for="svnummer">SV Nummer</label>
	    					<input type="text" id="svnummer" name="SV Nummer" /><br />
	    					<label for="adresse">Adresse</label>
	    					<input type="text" id="adresse" name="Adresse" /><br />
	    					<label for="telefon">Telefon</label>
	    					<input type="text" id="telefon" name="Telefon" /><br />
	    					<label for="mail">Mail</label>
	    					<input type="text" id="mail" name="Mail" /><br />
	    					<label for="sonstiges">Sonstiges</label>
	    					<textarea rows="6" type="text" id="sonstiges" name="Sonstiges" ></textarea>
	    					
						</form>
						
						
					</li>

				</ul>
				<h1>Bild</h1>
				<ul><form method="POST" action="uploadFile" enctype="multipart/form-data">
					<strong>Hochladen</strong> 
					<input type="file" name="file" />
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
				<p> Gespeichert </p>
			</div>
		</footer>	
			
	</body>
</html>