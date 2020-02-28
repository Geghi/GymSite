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
			<title>Calisthenics</title>	
		</head>
       <body> 
   
        <!-- Menu Navigazione -->
        
        <?php
            include_once "layout/menu.php";
            include_once "util/Functions.php";
		?>	
			     
        <br><br>
        <div><h1>Forum</h1></div>
           
        <?php
            include_once "layout/menuForum.php";
            CreaArgomento();
       		echo "<br><br>";
            include_once "layout/footer.php";
		?>
           

	</body>
</html>
