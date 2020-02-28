<?php
    function MostraProfilo() {
           
        include_once 'util/connect.php';
        if(!isset($_SESSION['Username'])){
			header("Location: ./Accedi.php?User=NotLogged");
			exit();
		}
        $Username = $_SESSION['Username'];
        $query="SELECT * FROM utente WHERE Username= '$Username'";
        $result = mysqli_query($mysqli , $query);
        
        $row = mysqli_fetch_assoc($result);
		
        //Stampo Dati Utente    
        echo   '<h1>'. $_SESSION['Username'] .'</h1>';
		//Carico Immagine del profilo
        if($row['Image']=="") {
            echo '<img src="../css/Immagini/Profile.png" alt="Profile Avatar" class="box-image"/>';
        }
        else {
            echo '<img src="../css/Immagini/'.$row['Image'].'" alt="Profile Avatar" class="box-image"/>';
        }
		
        echo    '<h5><strong>'. $row['Nome'] .'&nbsp' .$row['Cognome']. '</strong></h5>
                <h5>'.$row['Email'].'</h5>
                <h5>Peso:&nbsp'.$row['Peso'].'Kg</h5>
                <h5>Altezza:&nbsp'.$row['Altezza'].'cm</h5>';
		
		$query="SELECT C.Nome
				FROM utentecorso UC INNER JOIN corsi C ON UC.IdCorso = C.Id
				WHERE UC.User = '$Username';";
        $result = mysqli_query($mysqli , $query);
		
		if(mysqli_num_rows($result) > 0) {
		 	//l'utente si è iscritto ad almeno un corso.
			echo '<h5><strong>ISCRIZIONI:</strong></h5>';
			while($row = mysqli_fetch_assoc($result)) {
                echo '<h5>'.$row["Nome"].'</h5>';
            }
		}
    }

?>