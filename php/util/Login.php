<?php 

session_start();

if(isset($_POST['submit'])){
    
    include_once 'connect.php';
    
    $Username=mysqli_real_escape_string($mysqli, $_POST['Username']);
    $Password=mysqli_real_escape_string($mysqli, $_POST['Password']);
    

    $query="SELECT * FROM utente WHERE Username= '$Username'";
    $result = mysqli_query($mysqli, $query);    
    $resultCheck = mysqli_num_rows($result);
        
    if($resultCheck < 1){
        header("Location: ../Accedi.php?login=error");
        exit();
    } else {
        if($row = mysqli_fetch_assoc($result)){
            //Password De-hashing 
            $hashedPwdCheck = password_verify($Password, $row['Password']);
            
            if($hashedPwdCheck == false) {
                header("Location: ../Accedi.php?login=passworderror");
                exit();
                
            } else if($hashedPwdCheck == true){
                include_once 'Session.php';
                 //Log in the user here
                setSession($row['Username']);
               
                header("Location: ../Profilo.php?login=success");
                exit();
            }
        }
    }  
	
} else {
    header("Location: ../Accedi.php");
    exit();
}


?>