<?php 
    session_start();

	if(isset($_POST['submit'])){
		include_once 'connect.php';

		$moved = move_uploaded_file($_FILES['file']['tmp_name'],"../../css/Immagini/".$_FILES['file']['name']);

		$Email = mysqli_real_escape_string($mysqli, $_POST['Email']);
		$Peso = mysqli_real_escape_string($mysqli, $_POST['Peso']);
		$Altezza = mysqli_real_escape_string($mysqli, $_POST['Altezza']);



		$Username = $_SESSION['Username'];
		$query = "SELECT * FROM utente WHERE Username='$Username';";

		$result = mysqli_query($mysqli, $query);

		if($row = mysqli_fetch_assoc($result)){
			//I valori che non sono stati cambiato vengono salvato come quelli presenti attualmente nel database
			if(empty($Email))
				$Email = $row['Email'];

			if(empty($Peso))
				$Peso = $row['Peso'];

			if(empty($Altezza))
				$Altezza=$row['Altezza'];

			if(empty($_FILES['file']['name'])) 
				$_FILES['file']['name']=$row['Image'];               
		}

		if (!empty($Email) && !filter_var($Email, FILTER_VALIDATE_EMAIL)) {
			header("Location: ../ModificaProfilo.php?modify=invalidEmailFormat");
			exit();            
		}   

		//Aggiorno i valori
		$query = "UPDATE utente SET Email='$Email', Peso='$Peso', Altezza='$Altezza' WHERE Username='$Username';";

		mysqli_query($mysqli, $query);

		$query = "UPDATE utente SET Image = '".$_FILES['file']['name']."' WHERE Username = '$Username';";

		mysqli_query($mysqli, $query);

		header("Location: ../Profilo.php?modify=success");
		exit();



	} else {
		header("Location: ../ModificaProfilo.php?modify=error");
		exit();
	}


?>