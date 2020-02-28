<?php
    
    include '../util/connect.php';

	session_start();

	if(!isset($_SESSION['Username'])) {
		echo json_encode(-1);
		return;
	}

	if(!isset($_GET['Course'])){
		echo json_encode(null);
		return;
	}
	
	$Username = $_SESSION['Username'];
    $Corso =  mysqli_real_escape_string($mysqli, $_GET['Course']);
	
	//ottengo l'id del corso
	$query = "SELECT 
                    Id
              FROM 
                    corsi
              WHERE 
                    Nome='$Corso';";

	$result = mysqli_query($mysqli, $query);

	if(!$result) {
		echo json_encode(null);
		return;
	}
	
	$row = mysqli_fetch_assoc($result);
	$Id = $row['Id'];

	//controllo che l'utente sia già iscritto al corso
	$query = "SELECT 
                    COUNT(*) AS Iscritto
              FROM 
                    utentecorso
              WHERE 
                    User='$Username' AND IdCorso='$Id' ;";

	$result = mysqli_query($mysqli, $query);

	if(!$result) {
		echo json_encode(null);
		return;
	}
	
	$row = mysqli_fetch_assoc($result);
	$Iscritto = $row['Iscritto'];

	if($Iscritto == 0){
		echo json_encode(-2);
		return;
	}


	//elimino iscrizione dell'utente
    $query = "DELETE FROM utentecorso WHERE User = '$Username' AND IdCorso = '$Id';";
                
    $result = mysqli_query($mysqli, $query);
	
	if(!$result) {
		echo json_encode(null);
		return;
	}
	
	echo json_encode(1);
	

?>
