function mostraArgomenti(str) {
	//creo oggetto XMLhttp
    var xmlhttp = new XMLHttpRequest();
    
    xmlhttp.open("GET", "./ajax/CatRequest.php?Cat="+ str, true );
	//send data to php and wait for response.
    xmlhttp.send();

    xmlhttp.onreadystatechange = function (){
        if(this.readyState == 4 && this.status == 200){
            var Argomento = JSON.parse(this.responseText);

			if(Argomento == 1){
				window.location="./Forum.php?Categoria=Errore";
				return;
			}
			
			elem = document.getElementById("Argomenti");
			table = document.getElementById("TabellaArgomenti");
			
			//elimina eventuali tabelle già aperte.
			AzzeraTabella(table);
			
  			if(Argomento == null){
				//se elem ha un figlio --> il testo è già presente e non devo aggiornare
				if (!elem.firstChild) {
					h4 = document.createElement("h4");
					newContent = document.createTextNode("Non ci sono argomenti in questa categoria.");
					h4.appendChild(newContent);
					elem.appendChild(h4);
				}
				
			} else {
				//creo header della tabella 				
				if(!table.lastElementChild){
					tr = document.createElement("tr");
					//Argomento
					th = document.createElement("th");
					text = document.createTextNode("Argomento");
					th.appendChild(text);
					tr.appendChild(th);
					//Data Creazione
					th = document.createElement("th");
					text = document.createTextNode("Data Creazione");
					
					th.appendChild(text);
					tr.appendChild(th);
					table.appendChild(tr);
				}
				
				for(var i = 0; i < Argomento.length; i++){
					var Id = Argomento[i].Id;
					var Arg = Argomento[i].Argomento;
					var Data = Argomento[i].Data;
					
					//creo elementi per l'argomento
					tr = document.createElement("tr");
					td = document.createElement("td");
					a = document.createElement("a");
					a.setAttribute("class", "TableContent");
					a.setAttribute("href", "Argomento.php?Id="+Id);
					text = document.createTextNode(Arg);
					
					a.appendChild(text);
					td.appendChild(a);
					tr.appendChild(td);
					
					//creo elementi per la data
					td = document.createElement("td");
					text = document.createTextNode(Data);
					td.appendChild(text);
					tr.appendChild(td);
					table.appendChild(tr);

				}
				//elmino l'eventuale testo "non ci sono argomenti"
				while (elem.firstChild) {
					elem.removeChild(elem.childNodes[0]);
				}
			}
        }
    } 	
}

function AzzeraTabella(elem){
	var child = elem.lastElementChild;
	while(child){
		elem.removeChild(child);
		child = elem.lastElementChild;
	}
}
