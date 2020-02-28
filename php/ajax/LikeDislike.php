<?php
    session_start();
    include '../util/connect.php';
	
	$Username = $_SESSION['Username'];

	$MiPiace = null;
	$NonMiPiace = null;
    $Like =  mysqli_real_escape_string($mysqli, $_GET['Like']);
	$LikeDislike =  mysqli_real_escape_string($mysqli, $_GET['LikeDislike']);
    $IdPost =  mysqli_real_escape_string($mysqli, $_GET['IdPost']);
	if($LikeDislike == "Like"){
		$MiPiace = $Like;
		$NonMiPiace = 0;
	} else if($LikeDislike == "Dislike"){
		$MiPiace = 0;
		$NonMiPiace = $Like;
	}
	//controllo se è presente un record relativo all'utente e quel post
	$query = "SELECT 
					* 
			  FROM 
			  		utentepost 
			  WHERE 
			  		IdPost='$IdPost' AND User='$Username'";

	$result = mysqli_query($mysqli, $query);    
	$resultCheck = mysqli_num_rows($result);

	if($resultCheck < 1){
		//se non è presente lo creo. (l'user non ha mai messo like o dislike a quel post)
		$query = "INSERT INTO utentepost(IdPost, User, MiPiace, NonMiPiace) VALUES('$IdPost','$Username', '$MiPiace', '$NonMiPiace');";
		$result = mysqli_query($mysqli, $query);
		if(!$result){
			echo"Errore INSERT NonMiPiace";
		}
	} else {
		//setto il Like/Dislike
		$query = "UPDATE utentepost SET NonMiPiace = '$NonMiPiace', MiPiace = '$MiPiace' WHERE IdPost='$IdPost' AND User='$Username';";
		$result = mysqli_query($mysqli, $query);
	}
	

?>
