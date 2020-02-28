<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="it">
	
	<head>         
		<title>Calisthenics</title>	
		<meta charset="utf-8"> 
		<meta name = "author" content = "Mantovani Giacomo">
		<link href="../css/main.css" rel="stylesheet" type="text/css">
		<link rel="shortcut icon" type="image/png" href="../css/Immagini/Logo.png">
	</head>
        
        <!-- Menu Navigazione -->
	<body>  
		
		<?php
			include "layout/menu.php";
		?>	

		<br><br><br><br>
		<div><h1>Benvenuti nel sito della palestra Calisthenics Livorno</h1></div>
		<br>
		<div><h3>all'interno del sito potrai conscere le attività ed i servizi offerti, </h3></div>
		<div><h3>confrontarti con gli altri utenti sul forum e tanto altro.</h3></div>
		<div><h3>Ti ringraziamo per averci visitato e buona navigazione!</h3></div>
		<br><br>
		
		<?php
            include_once "layout/footer.php";
		?>
		
	</body>
</html>

