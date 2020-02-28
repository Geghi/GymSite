<?php
	

    //Elenca le varie categorie disponibili nel menu a tendina
    function MostraCategorie() {
    
        include_once 'connect.php';
        
        $query="SELECT * FROM categoria;";
        $result = mysqli_query($mysqli, $query);    
        $resultCheck = mysqli_num_rows($result);
        
        if($resultCheck < 1){
            header("Location: ../Forum.php?Categoria=error");
            exit();
        } 
        else {  
            echo "<select onchange='mostraArgomenti(this.value);'>";  //passo alla funzione la categoria scelta (this.value)
            echo "<option>Scegli una categoria</option>";
            
            while($row = $result->fetch_assoc()) {
                echo "<option>".$row["Nome"]."</option>";
            }
            echo "</select>";
        }
    }
    

    //mostra i vari post relativi ad un argomento
    function MostraPost() {
        
        include 'connect.php';

        if(isset($_GET['Id'])){
            $Id =  mysqli_real_escape_string($mysqli, $_GET['Id']);
            
            //seleziona i post relativi all'argomento con id = $Id
            $query = "  SELECT 
                            P.Id, P.Contenuto, P.Data
                        FROM 
                            post P INNER JOIN argomento A ON P.IdArgomento=A.Id
                        WHERE
                            A.Id='$Id';";

            $result = mysqli_query($mysqli, $query);

            if(!$result) {
                echo '<div class="Center"><h2>Errore argomento, riprova piu tardi.<h2></div>' . mysql_error();
				exit();
            } 

            echo '<div class="Center"><h2>Posts :</h2></div>';

            if(mysqli_num_rows($result) == 0) {
                echo '<div class="Center"><h4>Non ci sono post relativi a questo argomento.</h4></div>';
                return;
            } 
            //preparo la tabella
            echo '<div class="Tabella">
                    <table>
                        <tr>                                
                            <th>Post</th>
                            <th>Data</th>
                            <th>MiPiace</th>
                        </tr>'; 

            while($row = $result->fetch_assoc()) {               
                InserisciPostNellaTabella($row, $Id);
            }
            echo '</table></div>';
                
        } else {
            header("Location: Forum.php?Argomento=error");
            exit();
        }
    }


    function InserisciPostNellaTabella($row, $Id) {
        global $mysqli;
        echo '<tr>';
            echo '<td>';
                echo '<h3 class="Post">' .$row['Contenuto']. '</h3>';
            echo '</td>';
            echo '<td>';
                echo $row['Data'];
            echo '</td>';
        $IdPost = $row['Id'];
                                
        //conta il numero di mipiace relativi ad un post.
        $NumLike = "SELECT 
                        COUNT(MiPiace) AS NumeroLike
                    FROM 
                        utentepost
                    WHERE 
                        MiPiace = 1 AND IdPost = '$IdPost';";
        
        $resultLike = mysqli_query($mysqli, $NumLike);
        if(!$resultLike) {
            echo '<div class="Center"><h2>Errore<h2></div>'.mysql_error();
			exit();
        } 
        
        //$Like['NumeroLike'] è il numero di like relativi al post IdPost    
        $Like = $resultLike->fetch_assoc();
                    
        //conta il numero di NON mi piace relativi ad un post.
        $NumDislike = "SELECT 
                                COUNT(MiPiace) AS NumeroDislike
                        FROM 
                                utentepost
                        WHERE 
                                NonMiPiace = 1 AND IdPost = '$IdPost';";
        
        $resultDislike = mysqli_query($mysqli, $NumDislike);
        if(!$resultDislike) {
            echo '<div class="Center"><h2>Errore<h2></div>'.mysql_error();
			exit();
        } 
        
        //$Dislike['NumeroDislike'] è il numero di dislike relativi al post IdPost 
        $Dislike = $resultDislike->fetch_assoc();                
                    
        //se l'utente non è loggato mostra solo il numero di mipiace e non mi piace ma non posso cliccari
        if(!isset($_SESSION['Username'])){
            echo '<td>';
			echo '<div class="LikeDiv">';
            echo '<div class="LikeDislike Like0"></div>';
            ShowLikeNumber($Like, $IdPost);
            echo '<div class="LikeDislike Dislike0"></div>';
            ShowDislikeNumber($Dislike, $IdPost);
			echo '</div>';
               
        }
        else{
            $Username = $_SESSION['Username'];
            //Controllo se l'utente ha messo MiPiace o Non mipiace ad un post
            $UserLike = "SELECT 
                                MiPiace , NonMiPiace
                        FROM 
                                utentepost
                        WHERE 
                                IdPost = '$IdPost' AND User='$Username' AND (MiPiace is not null OR NonMiPiace is not null);";

            $resultUserLike = mysqli_query($mysqli, $UserLike);
            if(!$resultUserLike) {
                echo '<div class="Center"><h2>Errore<h2></div>'.mysql_error();
            } 
            echo '<td>';
			echo '<div class="LikeDiv">';
            if(mysqli_num_rows($resultUserLike) == 0) {
                //l'utente non ha messo mipiace o non mipiace a quel post
                ShowLikeArrow($IdPost, 0 );
                ShowLikeNumber($Like, $IdPost);
                ShowDislikeArrow($IdPost, 0);
                ShowDislikeNumber($Dislike, $IdPost);
				echo '</div>';
			} else {
				$UserLike = $resultUserLike->fetch_assoc(); 
				
				ShowLikeArrow($IdPost, $UserLike['MiPiace']);
				ShowLikeNumber($Like, $IdPost);
   				ShowDislikeArrow( $IdPost, $UserLike['NonMiPiace']);
				ShowDislikeNumber($Dislike, $IdPost);
				
				echo '</div>';
				echo '</td>';
				echo '</tr>';
			}
        }
    }

    //mostra il numero di Mi Piace
	function ShowLikeNumber($Like, $IdPost){
        if($Like['NumeroLike'] == null){
            echo '<div id="LikeNumber'.$IdPost.'">0</div>';
        } else {
            echo '<div id="LikeNumber'.$IdPost.'">'.$Like['NumeroLike'].'</div>';
        }
    }
    
    //mostra il numero di NON Mi Piace
    function ShowDislikeNumber($Dislike, $IdPost){
        if($Dislike['NumeroDislike'] == null){
           echo '<div id="DislikeNumber'.$IdPost.'">0</div>';
        } else {
             echo '<div id="DislikeNumber'.$IdPost.'">'.$Dislike['NumeroDislike'].'</div>';
        }
    }     
	
	//mostra l'icona del Non mi piace 
    function ShowDislikeArrow($IdPost, $NonMiPiace){
		$LikeDislike = "Dislike";
        echo '<div id="Dislike'.$IdPost.'" style="cursor: pointer;" class="LikeDislike Dislike'.$NonMiPiace.'" onClick="return mostraStatsUtenteDislike('.$NonMiPiace.', '.$IdPost.', \'' . $LikeDislike . '\');"></div>';
    }
        
    //mostra immagine del mi piace 
    function ShowLikeArrow($IdPost, $MiPiace){
		$LikeDislike = "Like";
        echo '<div id="Like'.$IdPost.'" style="cursor: pointer;" class="LikeDislike Like'.$MiPiace.'" onClick="return mostraStatsUtenteDislike('.$MiPiace.', '.$IdPost.', \'' . $LikeDislike . '\');"></div>';
		
    }
    
	function Inverti($Number){
		if($Number == 0){
			return 1;
		} else if ($Number == 1){
			return 0;
		} else 
			return null;
	}
    
    //Aggiorna il numero di mipiace/nonmipiace del post
    function AggiornaMiPiace($Like, $Dislike, $IdPost){
        global $mysqli;
        include_once 'connect.php';    

        $Username = $_SESSION['Username'];
        
        //controllo se è presente un record relativo all'utente e quel post
        $query = "SELECT * FROM utentepost WHERE IdPost='$IdPost' AND User='$Username'";
        $result = mysqli_query($mysqli, $query);    
        $resultCheck = mysqli_num_rows($result);

        if($resultCheck < 1){
            //se non è presente lo creo.
            $query = "INSERT INTO utentepost(IdPost, User, MiPiace, NonMiPiace) VALUES('$IdPost','$Username', $Like, $Dislike)";
            $result = mysqli_query($mysqli, $query);
            if(!$result){
                echo"ERRORE INSERT MiPiace";
            }
        }
        else{
            //setto il MiPiace
            $query = "UPDATE utentepost SET MiPiace = $Like , NonMiPiace = $Dislike WHERE IdPost='$IdPost' AND User='$Username'";
            $result = mysqli_query($mysqli, $query);
            if(!$result){
                echo"Errore aggiornamento MiPiace";
            }
        }
    }


	
	//controlla che l'utente attuale sia un Admin
	function AdminCheck(){
		include 'connect.php';
		
		$Username = $_SESSION['Username'];
		$query = "SELECT Admin 
				  FROM utente U
				  WHERE U.Username='$Username' AND U.Admin=1 ;";

		$result = mysqli_query($mysqli, $query);
		$row = $result->fetch_assoc(); 
		
		//controllo che l'utente attuale sia un admin
		if($row['Admin'] != 1)
		{
			header("Location: Forum.php?Error=PrivilegiInsufficienti");
			exit();
		}
	}


    //Funzione che crea una nuova categoria 
    function CreaCategoria() {
        include 'connect.php';
		
		if(!$_SESSION['Username'])
		{
			header("Location: ./Forum.php?Utente=NotLogged");
			exit();
		}

        if($_SERVER['REQUEST_METHOD'] != 'POST')
        {
            echo '<form method="post">
                    <h4 class="Dati">Nome:</h4>
                    <div class="Center">
                        <input class="Dati" type="text" placeholder="Nome Categoria" name="Nome"><br>
                    </div>
                    <h4 class="Dati">Descrizione:</h4>
                    <div class="Center">
                        <textarea class="Dati" placeholder="Descrizione" name="Descrizione"></textarea><br>
                    </div><br>
                    <div class="Center">
                        <input class="Pulsante" type="submit" value="Aggiungi" />
                    </div>
                    </form>';
			
        } else {
            $Nome = mysqli_real_escape_string($mysqli, $_POST['Nome']);
            $Descrizione = mysqli_real_escape_string($mysqli, $_POST['Descrizione']);
            if(empty($Nome)){
                header("Location: Forum.php?NomeCategoria=Vuoto");
                exit();
            }
			
			//controllo che l'utente abbia i privilegi per creare una categoria
			AdminCheck();		

            $query = "INSERT INTO categoria(Nome, Descrizione) 
                    VALUES( '$Nome', '$Descrizione');";

            $result = mysqli_query($mysqli, $query);
            if(!$result)
            {
                echo '<div class="Center"><h2>Errore</h2></div>' . mysql_error();
            }
            else
            {
                echo '<div class="Center"><h2>Nuova categoria aggiunta con successo</h2></div>';
            }
        }
    }

	


    //Funzione che crea un argomento in una categoria
    function CreaArgomento() {
 
        include_once 'connect.php';
		
        if(!$_SESSION['Username'])
		{
			header("Location: ./Forum.php?Utente=NotLogged");
					exit();
		} else {
            if($_SERVER['REQUEST_METHOD'] != 'POST') {

                echo '<form method="post">
                            <h4 class="Dati">Categoria:</h4>
                            <div class="Center">
                                <input class="Dati" type="text" placeholder="Nome Categoria" name="Categoria"><br>
                            </div>
                            <h4 class="Dati">Argomento:</h4>
                            <div class="Center">
                                <textarea class="Dati" placeholder="Nome Argomento" name="Argomento"></textarea><br>
                            </div><br>
                            <div class="Center">
                                <input class="Pulsante" type="submit" value="Aggiungi" />
                            </div>
                            </form>';
            } else {
                $Categoria = mysqli_real_escape_string($mysqli, $_POST['Categoria']);
                $Argomento = mysqli_real_escape_string($mysqli, $_POST['Argomento']);
                if(empty($Argomento)){
                    header("Location: Forum.php?NomeArgomento=Vuoto");
                    exit();
                }
				
                $query="SELECT DISTINCT Id
                        FROM 
                            categoria 
                        WHERE 
                            Nome = '$Categoria';";
                $result = mysqli_query($mysqli, $query);
                if(!$result) {
                    echo '<div class="Center"><h2>Errore</h2></div>' . mysql_error();
					exit();
                }   
                    
                if(mysqli_num_rows($result) == 0) {
                    echo '<div class="Center"><h2><br>Categoria Non Esistente<br><br><br><br></h2></div>' .mysql_error();
					exit();
					
                } else {
                    $row = $result->fetch_assoc();
                    $IdCategoria = $row['Id'];
                }
                
                $query = "INSERT INTO argomento (IdCategoria, Data, Argomento, User) 
                            VALUES( '$IdCategoria', NOW(), '$Argomento', '1' );";

                $result = mysqli_query($mysqli, $query);
                if(!$result)
                {
                    echo '<div class="Center"><h2>Errore</h2></div>' . mysql_error();
					exit();
                } else {
                    echo '<div class="Center"><h2>Nuovo Argomento aggiunto con successo</h2></div>';
                }
            }   
        }
    }


    //Funzione che crea un post in un argomento
    function CreaPost() {
        
        include 'connect.php';
        if($_SERVER['REQUEST_METHOD'] != 'POST') {        
            header("Location: ../Forum.php?CreaPost=Errore");
            exit();
        }
        else {
            //controllo che l'utente sia loggato.
            if(!$_SESSION['Username']){
                header("Location: ../Forum.php?Utente=NotLogged");
                exit();
				
            } else {
                $Username = $_SESSION['Username'];
                $Id = mysqli_real_escape_string($mysqli, $_GET['Id']);
                $Contenuto = mysqli_real_escape_string($mysqli, $_POST['Contenuto']);
                
                if(empty($Contenuto)){
                    header("Location: ../Argomento.php?Id=$Id?CreaPost=Errore");
                    exit();
                }
                $query = "INSERT INTO post(Contenuto, Data, IdArgomento, User) VALUES ('$Contenuto', NOW(), '$Id', '$Username')";
                $result = mysqli_query($mysqli, $query);
                if(!$result)
                {
                	header("Location: ../Forum.php?CreaPost=ErroreCreazione");
            		exit();
                }
                else
                {
                    header("Location: ../Argomento.php?Id=$Id");
                    exit();
                }
            }
        }
    }

?>
