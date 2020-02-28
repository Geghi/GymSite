<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="it">
	<head>
		<title>Calisthenics</title>	
		<meta charset="utf-8"> 
		<meta name = "author" content = "Mantovani Giacomo">
		<link rel="shortcut icon" type="image/png" href="../css/Immagini/Logo.png">
		<link href="../css/main.css" rel="stylesheet" type="text/css">
		<link href="../css/DatiUtente.css" rel="stylesheet" type="text/css">
	</head>
	
    <body>
        <script src="../js/Check.js"></script>
        <script src="../js/CaricaImmagine.js"></script>
        
		<!-- Menu Navigazione -->
        <?php
			include "layout/menu.php";
		?>	
        <br><br>
        
        <!-- Inserimento Dati Utente -->
        <div class="box">
			<div><h1>Modifica Profilo</h1></div><br>
			<form method="post" action="./util/Modify.php" enctype="multipart/form-data">

				<h4 class="Dati">Email:</h4>
				<div class="Center">
					<input class="Dati" type="text" placeholder="Inserisci nuova email" name="Email"><br>
				</div>

				<h4 class="Dati">Peso:</h4>
				<div class="Center">
					<input id="Weight" class="Dati" type="text" placeholder="Inserisci nuovo peso in kg" name="Peso"><br>
				</div> 

				<h4 class="Dati">Altezza:</h4>
				<div class="Center">
					<input id="Height" class="Dati" type="number" placeholder="Inserisci nuova altezza in cm" name="Altezza">
				</div><br>       

				<br>
				<div class="Center">
					<div class="FileInput">
						<input id="ScegliFile" type="file" name="file" onchange="return CaricaImmagine();" />
						<span id="InputVal" class="InputValue">Seleziona nuova immagine</span>
					</div>
				</div>
				<br><br><br><br><br>   
				<div class="Center">
					<input class="Pulsante" type="submit" name="submit" value="conferma" onclick="return CheckHeightAndWeight();" />
				</div>

				<br>
				<div class="Center">
					<div id="messageDiv"></div>
				</div>
			</form>
		</div> 
        <br><br>
		
		<?php
            include_once "layout/footer.php";
		?>
		
    </body>
</html>

