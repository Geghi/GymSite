<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="it">
	<head>
		<meta charset="utf-8"> 
		<meta name = "author" content = "Mantovani Giacomo">
		<link rel="shortcut icon" type="image/png" href="../css/Immagini/Logo.png">
		<link href="../css/main.css" rel="stylesheet" type="text/css">
		<link href="../css/Corsi.css" rel="stylesheet" type="text/css">
		<link href="../css/dropdownMenu.css" rel="stylesheet" type="text/css">
		<script src="../js/ajax/PrenotaCorso.js"></script>
		<script src="../js/ajax/ShowUnsubInput.js"></script>
		<title>Calisthenics</title>	
	</head>
    <body>    
		<!-- Menu Navigazione -->

		<?php
			include "layout/menu.php";
		?>

		<!-- Elenco dei corsi disponibili -->
		<br><br><br><br>

		<div><h1 class="Corsi">I Nostri Corsi</h1></div>
		<div><h2 class="Corsi">Prenota uno dei corsi con un click qua sotto</h2></div>
		<div><h3>L'iscrizione è relativa alla prossima occorrenza del corso</h3></div>

		<div class="PulsanteDiv">
			<a class="Pulsante" onclick='PrenotaCorso("Stretching")'><span>Stretching</span></a>
			<a class="Pulsante" onclick='PrenotaCorso("Calisthenics")'><span>Calisthenics</span></a>
			<a class="Pulsante" onclick='PrenotaCorso("Trx")'><span>Trx</span></a>
		</div>
		
		<br>
		
		<div class="Center">
			<h4 id="Prenotazione"></h4>
		</div>
		
		<br><br><br><br><br><br><br>
		
		<div class="Center">
			<a class="Pulsante" onclick='ShowUnsubInput()'><span>Disiscriviti</span></a>
		</div>
		
		<!-- menu a tendina per disiscrizione --> 
		<div class="Center">
			<div id="Unsub" class="dropdown">
			</div>
		</div>
		
		<br><br><br>
		<!-- Descrizione corso Stretching --> 
		<hr>
		<br>
		<div id="Stretching"><h1>Stretching</h1></div>
		<div class="Center">
			<img src="../css/Immagini/Stretching.jpg" alt="Stretching" class="immagini">
		</div>
		<div class="MenuCorsi">
			<div><h3>è una ginnastica di mantenimento basata su esercizi a corpo libero.</h3></div>
			<div><h4>Il programma si basa su un allungamento muscolare e tonificazione finalizzati al miglioramento della funzionalità dell’apparato muscolo-scheletrico, sotto l’aspetto della mobilità articolare, elasticità e coordinazione dei movimenti.</h4></div>
			<div><h3>Orari:</h3></div>
			<div><h4>Lunedì 17:30 - 18:30</h4></div>
			<div><h4 class="orari"> Giovedì 16:00 - 17:00 </h4></div>
			<div><h4 class="orari"> Venerdì 19:00 - 20:00 </h4></div>
		</div>

		<!-- Descrizione corso Calisthenics --> 
		<hr>
		<br>
		<div id="Calisthenics"><h1>Calisthenics</h1></div>
		<div class="Center">
			<img src="../css/Immagini/Calisthenics.png" alt="Calisthenics" class="immagini">
		</div>
		<div class="MenuCorsi">
			<div><h3>è un insieme di esercizi fisici a corpo libero finalizzati a potenziare il fisico contrastando la sola forza peso del proprio corpo.</h3></div>
			<div><h4>I nostri programmi di allenamento si basano su un insieme di esercizi che seguono una progressione di difficoltà graduale che puoi eseguire anche se non hai nessuna esperienza in questa disciplina.</h4></div>
			<div><h3>Orari:</h3></div>
			<div><h4>Lunedì 15:30 - 16:30</h4></div>
			<div><h4 class="orari"> Mercoledì 17:00 - 18:00 </h4></div>
			<div><h4 class="orari"> Venerdì 15:00 - 16:00 </h4></div>
			  
		</div>

		<!-- Descrizione corso Trx -->     
		<hr>
		<br>
		<div id="Trx"><h1>Trx</h1></div>
		<div class="Center">
			<img src="../css/Immagini/Trx.png" alt="Trx" class="immagini">
		</div>
		<div class="MenuCorsi">
			<div><h3>è un tipo di allenamento che rientra nelle discipline di training funzionale.</h3></div>
			<div><h4>Viene sfruttato il peso del corpo per acquisire forza, elasticità ed equilibrio. <br> Un allenamento efficace per ogni parte del corpo. Vengono, infatti, sollecitati tutti i muscoli del corpo e ciò comporta un rassodamento generale e la possibilità, se praticato con costanza, di perdere peso</h4></div>
			<div><h3>Orari:</h3></div>
			<div><h4>Lunedì 18:30 - 19:30</h4></div>
			<div><h4 class="orari"> Martedì 16:00 - 17:00 </h4></div>
			<div><h4 class="orari"> Giovedì 10:00 - 11:00 </h4></div>
		</div>
		<div class="Bottom"><a href="#"> <h5 class="BackToTop">Back to top</h5></a></div>
		
		<?php
            include_once "layout/footer.php";
		?>
		
	</body>
</html>
