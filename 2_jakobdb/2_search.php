<html>
<script type="text/javascript">
<!--
if (screen.width <= 699) {
document.location = "5_msearch.php";
}
//-->
</script>



<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">


    <head>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Test Seite Jakob</title>
	<style>
	.center {
    margin: auto;
    width: 90%;
    padding: 10px;
    text-align: center;
}
input[type=text] {
    width: 230px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    background-color: white;
    background-image: url('searchicon.png');
    background-position: 10px 10px;
    background-repeat: no-repeat;
    padding: 12px 20px 12px 40px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
    text-align: center
}

input[type=text]:focus {
    width: 75%;
}	
	
		main{
			position: fixed;
			top: 50%; /* Set this to the height of the header */
			left: 50%; 
			overflow: auto; 
			background: #fff;
			 margin-top:-50px; /* this is half the height of your div*/  
  margin-left:-100px; /*this is half of width of your div*/
		}
			
	
	
	
#mitte {
    -webkit-align-self: center; /* Safari 7.0+ */
    align-self: center;
}
input[type=button], input[type=submit], input[type=reset] {
    background-color: #4CAF50;
    border: none;
    color: white;
        border-radius: 4px;
    padding: 16px 32px;
    text-decoration: none;
    margin: 4px 2px;
    cursor: pointer;
        -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
}	

input[type="submit"]:hover {
    background-color: #f44336;
    color: white;
}
	
	</style>
	</head>
	
<body>		
	<main>
		<div class=center>
			Bitte geben sie SV Nummer oder Nachnamen ein
			<form id="daten1" method="post" action="2_result_list.php"> <input type="text" name="svall" placeholder="Suche">  </p>
			<input type="submit" value="Suche" name="search" />
			</form> 
		</div>
	</main>
</body>
	
</html>