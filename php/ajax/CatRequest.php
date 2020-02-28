<?php
    
    include '../util/connect.php';
  
	if(!isset($_GET['Cat'])){
		echo json_encode(1);
		return;
	}

    $Categoria =  mysqli_real_escape_string($mysqli, $_GET['Cat']);
        
    //Seleziono gli argomenti relativi a quella categoria
    $query = "SELECT 
                    A.Id, A.Argomento, A.Data
              FROM 
                    argomento A INNER JOIN categoria C ON C.Id = A.IdCategoria
              WHERE 
                    C.Nome='$Categoria'
              ORDER 
                    BY A.Data DESC;";
                
    $result = mysqli_query($mysqli, $query);
	
	if(!$result) {
		echo json_encode(null);
		return;
	}
	if(mysqli_num_rows($result) == 0) {
		echo json_encode(null);
	} else {
		$Argomento = [];
		while($row = mysqli_fetch_assoc($result)) {
			$Argomento[] = $row;
		}
		echo json_encode($Argomento);
	}

?>
