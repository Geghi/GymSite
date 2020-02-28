<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="it">
    <head>          
        <meta charset="utf-8"> 
		<meta name = "author" content = "Mantovani Giacomo">
		<script src="https://use.fontawesome.com/d1341f9b7a.js"></script>
		<link href="../css/main.css" rel="stylesheet" type="text/css">
        <link href="../css/profileBox.css" rel="stylesheet" type="text/css">
        
		<title>Calisthenics</title>	
        <link rel="shortcut icon" type="image/png" href="../css/Immagini/Logo.png">
	</head>
    <body>
        <!-- Menu Navigazione -->
        <?php
			include "layout/menu.php";
		?>	
        <br>
        
        <div class="box">
            <?php 
                include 'layout/ShowProfile.php';
                MostraProfilo();
            ?>
            
            <div class="Center">
				<button class="Pulsante" onclick="window.location.href='ModificaProfilo.php'"><span>Modifica</span></button><br>
            </div><br><br>
			
            <form method="post" action="./util/Logout.php">
                <div class="Center">
                    <input class="Pulsante" type="submit" name="submit" value="Esci"><br>
                </div>  
            </form>
                        
        </div>
        
    	<br><br>
		
		<?php
            include_once "layout/footer.php";
		?>
		
    </body>
</html>

