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
            <link href="../css/DatiUtente.css" rel="stylesheet" type="text/css">
            <link rel="shortcut icon" type="image/png" href="../css/Immagini/Logo.png">	
		</head>
        
    <body>
        <!-- Menu Navigazione -->
        <?php
			include "layout/menu.php";
            include "util/connect.php";
        
            if(isset($_SESSION['Username'])){
                header("Location: Profilo.php?login=UserIsLogged");
                exit();
             }      
		?>
        <br><br><br><br>
         <!-- Inserimento Dati Utente -->

        <div><h1>Accedi</h1></div><br>
        <form method="post" action="./util/Login.php">
            
            <h4 class="Dati">Username:</h4>
            <div class="Center">
                <input class="Dati" type="text" placeholder="Inserisci Username" name="Username" required><br>
            </div>
            <h4 class="Dati">Password:</h4>     
            <div class="Center">
                <input class="Dati" type="password" placeholder="Inserisci Password" name="Password" required><br>
            </div>
            <br>
            <div class="Center">
                <input class="Pulsante" type="submit" name="submit" value="conferma"><br>
            </div>
            
        </form>
        <br>
        <div class="Center"><h4>Non hai un account?</h4></div>
        <div class="Center">
            <a class="Dati" href="Registrazione.php"><p>Fai click qui per Registrarti</p></a>
        </div>
		
		<?php
            include_once "layout/footer.php";
		?>
		
	</body>
</html>