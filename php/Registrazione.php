<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="it">
	<head>
		<meta charset="utf-8"> 
		<meta name = "author" content = "Mantovani Giacomo">
        <script src="../js/Check.js"></script>
        <script src="../js/CaricaImmagine.js"></script>
		<link rel="shortcut icon" type="image/png" href="../css/Immagini/Logo.png">
		<link href="../css/main.css" rel="stylesheet" type="text/css">
        <link href="../css/DatiUtente.css" rel="stylesheet" type="text/css">
		<title>Calisthenics</title>	
    </head>
    <body>
        
        <!-- Menu Navigazione -->
        
        <?php
			include "layout/menu.php";
		
			if(isset($_SESSION['Username'])){
				header("Location: ./Profilo.php?User=Logged");
				exit();
			}
		?>
        <br><br><br><br>
        
        <div><h1>Registrati</h1></div><br>
        
        <!-- Inserimento Dati Utente -->
		<form method="post" action="./util/Sign.php" enctype="multipart/form-data">
            
            <h4 class="Dati">Username:</h4>
            <div class="Center">
                <input class="Dati" type="text" placeholder="*Inserisci Username" name="Username" required><br>
            </div>  
            
            <h4 class="Dati">Password:</h4>
            <div class="Center">
                <input class="Dati" type="password" placeholder="*Inserisci una password" id="Password" name="Password" required>
            </div>           
            
            <h4 class="Dati">Conferma Password:</h4>
            <div class="Center">
                <input class="Dati" type="password" placeholder="*Conferma password" id="ConfermaPassword" name="ConfermaPassword" required><br>
            </div>
                    
            <h4 class="Dati">Nome:</h4>
            <div class="Center">
                <input class="Dati" type="text" placeholder="*Inserisci il tuo nome" name="Nome" required><br>
            </div>
            
            <h4 class="Dati">Cognome:</h4>
            <div class="Center">
                <input class="Dati" type="text" placeholder="*Inserisci il tuo cognome " name="Cognome" required><br>
            </div>
            
            <h4 class="Dati">Email:</h4>
            <div class="Center">
                <input class="Dati" type="text" placeholder="Inserisci la tua email" name="Email" ><br>
            </div>
            
            <h4 class="Dati">Peso:</h4>
            <div class="Center">
                <input id="Weight" class="Dati" type="number" placeholder="Inserisci nuovo peso in kg" name="Peso"><br>
            </div> 
            
            <h4 class="Dati">Altezza:</h4>
            <div class="Center">
                <input id="Height" class="Dati" type="number" placeholder="Inserisci nuova altezza in cm" name="Altezza">
            </div><br> 
            
            <div class="Center">
                <div class="FileInput">
					<span id="InputVal" class="InputValue">Seleziona Immagine</span>
                    <input id="ScegliFile" type="file" name="file" onchange="return CaricaImmagine();" />
                    
                </div>
            </div>
            <br><br><br><br><br><br>  
            <div class="Center">
                <input class="Pulsante" type="submit" name="submit" value="conferma" onclick="return CheckAll();" />
            </div>
            
            <br>
            <div class="Center">
                <div id="messageDiv"> </div>
            </div>
        </form>
        <div class="Center"><h4>Hai già un account?</h4></div>
        <div class ="Center"><a class="Dati" href="Accedi.php"><p>Fai click qui per Accedere</p></a></div>

		<?php
            include_once "layout/footer.php";
		?>
		
    </body>
</html>

