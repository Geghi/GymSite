<?php
	
	//setSession: set $_SESSION 
	function setSession($username){
		$_SESSION['Username'] = $username;
	}

	//Controlla che l'utente sia loggato
	function isLogged(){		
		if(isset($_SESSION['Username']))
			return $_SESSION['Username'];
		else
			return false;
	}

?>