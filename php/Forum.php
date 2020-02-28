<?php 
    session_start();
    
?>

<!DOCTYPE html>
<html lang="it">
		<head>
			<meta charset="utf-8"> 
			<meta name = "author" content = "Mantovani Giacomo">
			<link rel="shortcut icon" type="image/png" href="../css/Immagini/Logo.png"/>
            <script src="../js/ajax/mostraArgomenti.js"></script>
			<link href="../css/main.css" rel="stylesheet" type="text/css">
            <link href="../css/forum.css" rel="stylesheet" type="text/css">
            <link href="../css/dropdownMenu.css" rel="stylesheet" type="text/css">
            
			<title>Calisthenics</title>	
		</head>
       <body>            
           
        <!-- Menu Navigazione -->
        <?php
			include_once "layout/menu.php";
            include_once "util/Functions.php";
		?>	
			     
        <br><br><br>
        <div><h1>Forum</h1></div>
           
        <?php
			include_once "layout/menuForum.php";
        ?>
            
        <div class="Center">  
            <div class="dropdown">        
                <?php
                    MostraCategorie();
                ?>                        
            </div>
        </div><br><br><br><br>
		<div class='Center'>
			<div id="Argomenti"></div>
		</div>
        <div class="Tabella">
            <table>
                <tbody id="TabellaArgomenti"> 
                </tbody>
            </table>
        </div> 
		<br /><br /><br />
		   
		<?php
            include_once "layout/footer.php";
		?>	
		   
	</body>
</html>
