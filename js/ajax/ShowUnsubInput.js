//mostra il dropdown per la disiscrizione da un corso
function ShowUnsubInput(){
	elem = document.getElementById("Unsub");
	
	if(elem.firstElementChild){
		removeAll(elem);
		return;
	}
	
	select = document.createElement("select");
	select.setAttribute("onchange","Unsubscribe(this.value);");
	option = document.createElement("option");
	text = document.createTextNode("Seleziona un corso");
	
	appendNodes(option, select, text);
	elem.appendChild(select);
	
	createOption("Calisthenics");
	
	appendNodes(option, select, text);
	
	createOption("Stretching");
	
	appendNodes(option, select, text);
	
	createOption("Trx");
	
	appendNodes(option, select, text);
	
}

function appendNodes(option, select, text){
	option.appendChild(text);
	select.appendChild(option);	
}

function removeAll(elem){
	while(elem.firstChild){
		elem.removeChild(elem.firstChild);
	}
}

function createOption(str){
	option = document.createElement("option");
	text = document.createTextNode(str);
}

//disiscrizione da un corso
function Unsubscribe(str){
	//creo oggetto XMLhttp
    var xmlhttp = new XMLHttpRequest();
    
    xmlhttp.open("GET", "./ajax/Unsubscribe.php?Course="+ str, true );
	
    xmlhttp.send();

    xmlhttp.onreadystatechange = function (){
        if(this.readyState == 4 && this.status == 200){
			var response = JSON.parse(this.responseText);
			console.log(response);
			
			//errore 
			if(response == null){
				window.location="./INostriCorsi.php?Unsub=Errore";
				return;
			}
			
			//utente non loggato
			if(response == -1){
				window.location="./Accedi.php?User=NotLogged";
				return;
			}
			
			elem = document.getElementById("Prenotazione");
			//elimino eventuali testi già presenti 
			if (elem.firstChild) {
				elem.removeChild(elem.childNodes[0]);
			}
			
			if(response == 1){
				unsub = document.getElementById("Unsub");
				removeAll(unsub);
				text = document.createTextNode("Disiscrizione dal corso di "+str+" effettuata con successo. ");
				elem.appendChild(text);
				return;
			}
			
			if(response == -2){
				unsub = document.getElementById("Unsub");
				removeAll(unsub);
				text = document.createTextNode("Utente non iscritto al corso di " +str);
				elem.appendChild(text);
				return;
			}
		}
	}
}
		