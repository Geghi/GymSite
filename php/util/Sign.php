<?php 
    session_start();

	if(isset($_POST['submit'])){
		include_once 'connect.php';
    	
		//salvo il file caricato nella cartella Immagini
		move_uploaded_file($_FILES['file']['tmp_name'],"../../css/Immagini/".$_FILES['file']['name']);

		$Username = mysqli_real_escape_string($mysqli, $_POST['Username']);
		$Password = mysqli_real_escape_string($mysqli, $_POST['Password']);
		$Nome = mysqli_real_escape_string($mysqli, $_POST['Nome']);
		$Cognome = mysqli_real_escape_string($mysqli, $_POST['Cognome']);
		$Email = mysqli_real_escape_string($mysqli, $_POST['Email']);
		$Peso = mysqli_real_escape_string($mysqli, $_POST['Peso']);
		$Altezza = mysqli_real_escape_string($mysqli, $_POST['Altezza']);
		
		//email check
		if (!empty($Email) && !filter_var($Email, FILTER_VALIDATE_EMAIL)) {
			header("Location: ../Registrazione.php?signup=invalidEmailFormat");
			exit();            
		}
		
		//l'username deve iniziare con una Lettera e non può contenere numeri o caratteri speciali
		if(!preg_match("/^[a-zA-Z]*$/", $Username)){
			header("Location: ../Registrazione.php?signup=invalidUsernameFormat");
			exit();

		} else {
			$query="SELECT * FROM utente WHERE Username = '$Username'";

			$result = mysqli_query($mysqli, $query);    
			$resultCheck = mysqli_num_rows($result);

			if($resultCheck>0){
				//Username già utilizzato
				header("Location: ../Registrazione.php?signup=usertaken");
				exit();
			} else {
				//password Hashing
				$hashedPwd = password_hash($Password, PASSWORD_DEFAULT);
				//inserisco i dati dell'utente nel database
				$query = "INSERT INTO utente (Username, Password, Nome, Cognome, Email, Peso, Altezza ) VALUES ('$Username', '$hashedPwd', '$Nome', '$Cognome', '$Email', '$Peso', '$Altezza');";

				mysqli_query($mysqli, $query);
				//inserisco l'immagine 
				$query = "UPDATE utente SET Image = '".$_FILES['file']['name']."' WHERE Username = '$Username';";

				mysqli_query($mysqli, $query);
				header("Location: ../Accedi.php?signup=success");
				exit();
			}
		}

	} else {
		header("Location: ../Registrazione.php?signup=error");
		exit();
	}


?>