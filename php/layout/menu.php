<div id="main" class="nav-container">
	<ul>
		<li><img class="Logo" src="../css/Immagini/Logo1.png" alt="Logo"></li>
		<li class="nav-li"><a href="index.php">Home</a></li>
		<li class="nav-li"><a href="Forum.php">Forum</a></li>
		<li class="nav-li"><a href="Contattaci.php">Contattaci</a></li>
		<li class="nav-li"><a href="INostriCorsi.php">Corsi</a></li>
		 <?php 
			if(isset($_SESSION['Username'])) {
				echo '<li class="nav-li"><a href="Profilo.php">Profilo</a></li>';
			}
			else {
				echo '<li class="nav-li"><a href="Accedi.php">Accedi</a></li>';
			}
		?>
	</ul>
</div>

<div class="Immagine"> 
	<img class="Squat" src="../css/Immagini/squat.png" alt="Squat">
	<div class="TestoImmagine">CALISTHENICS LIVORNO</div>
</div>



