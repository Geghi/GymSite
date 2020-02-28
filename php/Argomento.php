<?php 
    session_start();
    
?>

<!DOCTYPE html>
<html lang="it">
	<head>
		<meta charset="utf-8"> 
		<meta name = "author" content = "Mantovani Giacomo">
		<link rel="shortcut icon" type="image/png" href="../css/Immagini/Logo.png"/>
		<link href="../css/main.css" rel="stylesheet" type="text/css">
        <link href="../css/forum.css" rel="stylesheet" type="text/css">
        <link href="../css/likeDislike.css" rel="stylesheet" type="text/css">
		<script src="../js/ajax/mostraStatsUtente.js"></script>
		<title>Calisthenics</title>	
    </head>
    <body>     
        <!-- Menu Navigazione -->
            <?php
                include 'util/connect.php';
                include_once "layout/menu.php";
                include_once "util/Functions.php";
        
                echo '<br><br>';
                $IdArgomento =  mysqli_real_escape_string($mysqli, $_GET['Id']);
                if(empty($IdArgomento)){
                    echo '<div class="Center><h2>Errore.</h2></div>';
                } else {
                    
                    echo '<form method="post" action="util/CreaPost.php?Id='.$IdArgomento.'">
                            <div class="Center">
                                <h2>Aggiungi un nuovo post</h2>
                            </div>
                            <div class="Center">
                                <textarea name="Contenuto" placeholder="Inserisci il contenuto del post"></textarea>
                            </div><br>
                            <div class="Center">
                                <input class="Pulsante" type="submit" value="Aggiungi Post"/>
                            </div>
                        </form><br>';
                }
                if( isset($_GET['IdPost'])){ 
					$IdPost = $_GET['IdPost'];
					if(isset($_GET['MiPiace'])) {
						$Like = $_GET['MiPiace'];
						AggiornaMiPiace($Like, 0, $IdPost);
					} else if(isset($_GET['NonMiPiace'])){
						$DisLike = $_GET['NonMiPiace'];
						AggiornaMiPiace(0, $Dislike, $IdPost);
					}
                }
                MostraPost();
           		echo "<br><br>";
				include_once "layout/footer.php";
			?>
		
  
	</body>
</html>
