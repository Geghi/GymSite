
function CaricaImmagine() {

    var Input = document.getElementById('ScegliFile').value;
	NomeFile = document.getElementById('InputVal');
    if(Input){
        var filename = Input.replace(/^.*[\\\/]/, '');
		temp = document.createTextNode(filename);
    }
    else
		temp = document.createTextNode("Seleziona Immagine");
	NomeFile.removeChild(NomeFile.firstChild);
	NomeFile.appendChild(temp);
}
