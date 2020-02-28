<?php
    
    include '../util/connect.php';

	session_start();

	if(!isset($_SESSION['Username'])) {
		echo json_encode(-1);
		return;
	}
	
   	if(!isset($_GET['Course'])){
		echo json_encode(-2);
		return;
	}
	
	$Username = $_SESSION['Username'];
    $Corso =  mysqli_real_escape_string($mysqli, $_GET['Course']);
            
    //Seleziono il corso scelto dall'utente
    $query = "SELECT 
                    Id, Nome, PostiDisponibili
              FROM 
                    corsi
              WHERE 
                    Nome='$Corso';";
                
    $result = mysqli_query($mysqli, $query);
	
	if(!$result) {
		echo json_encode(null);
		return;
	}
	if(mysqli_num_rows($result) == 0) {
		echo json_encode(null);
		return;
	} 

	$row = mysqli_fetch_assoc($result);

	$Id = $row['Id'];
	$PostiDisponibili = $row['PostiDisponibili'];
	
	//controllo le iscrizioni dell'utente
	$query = "SELECT 
                    User
              FROM 
                    utentecorso
              WHERE 
                    User='$Username' AND IdCorso = '$Id' ;";

	$result = mysqli_query($mysqli, $query);
	
	if(!$result) {
		echo json_encode(null);
		return;
	}

	//Se l'utente è già iscritto al corso 
	if(mysqli_num_rows($result) > 0) {
		echo json_encode(-4);
		return;
	} 
	
	$query = "SELECT 
                    COUNT(*) as TotIscritti
              FROM 
                    utentecorso
              WHERE 
                    IdCorso='$Id' ;";

	$result = mysqli_query($mysqli, $query);
	
	if(!$result) {
		echo json_encode(null);
		return;
	}
	
	$row = mysqli_fetch_assoc($result);
	$TotIscritti = $row['TotIscritti'];
	
	if( ($PostiDisponibili - $TotIscritti) <= 0 ){
		echo json_encode(-3);
		return;
	}
	
	$query = "INSERT INTO utentecorso(User, IdCorso) VALUES('$Username','$Id');";

	$result = mysqli_query($mysqli, $query);
	if(!$result) {
		echo json_encode(5);
		return;
	}

	echo json_encode(1);
	

?>
