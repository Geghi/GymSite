function PrenotaCorso(str){
	//creo oggetto xmlhttp
	var xmlhttp = new XMLHttpRequest();
    
    xmlhttp.open("GET", "./ajax/CoursePrenotation.php?Course="+str, true );
	//invio dati al php ed attesa di risposta
    xmlhttp.send();
	
	xmlhttp.onreadystatechange = function (){
		if(this.readyState == 4 && this.status == 200){
            var response = JSON.parse(this.responseText);
			
			//errori nell'esecuzione della query
			if(response == null){
				window.location="./INostriCorsi.php?Corso=erroreDatabase";
				return;
			}
			
			//utente non loggato
			if(response == -1){
				window.location="./Accedi.php?User=NotLogged";
				return;
			} 
			
			//errore GET corso
			if(response == -2){
				window.location="./INostriCorsi.php?Corso=errore";
				return;
			}
			
			
			elem = document.getElementById("Prenotazione");
			//elimino eventuali testi già presenti 
			if (elem.firstChild) {
				elem.removeChild(elem.childNodes[0]);
			}
			
			//max iscritti raggiunti
			if(response == -3){
				text = document.createTextNode("Il corso selezionato ha già raggiunto il massimo numero di iscrizioni, la invitiamo a riprovare al termine del corso. ");
				elem.appendChild(text);
				return;
			}
			
			//utente già iscritto
			if(response == -4){
				text = document.createTextNode("La sua iscrizione al corso di " + str + " è già stata effettuata.");
				elem.appendChild(text);
				return;
			}
			
			//Iscrizione effettuata
			if(response == 1){
				text = document.createTextNode("Iscrizione al corso di " + str + " avvenuta con successo.");
				elem.appendChild(text);
			}			
		}
	}
}
