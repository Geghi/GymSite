function PwdCheck() {
    var Pwd = document.getElementById("Password").value;
    var PwdVerify = document.getElementById("ConfermaPassword").value;
	var stop = true;
	

    if (Pwd.length < 5) {
        text = document.createTextNode("*La password è troppo corta, usa almeno 5 caratteri");
		node = document.createElement("p");
		node.setAttribute("id", "message");
		node.appendChild(text);
		Message.appendChild(node);
        stop = false;
    }
	
    if (Pwd !== PwdVerify) {
		node = document.createElement("p");
		node.setAttribute("id", "message");
		text = document.createTextNode("*Le password non sono uguali");
		node.appendChild(text);
        Message.appendChild(node);
        stop = false;
    }
	
    return stop;  
}

function HeightCheck() {
    var Height = document.getElementById("Height").value;
    if(Height) {
        if(Height <=0 || Height > 265){
			node = document.createElement("p");
			node.setAttribute("id", "message");
			text = document.createTextNode("*Altezza non valida");
			node.appendChild(text);
			Message.appendChild(node);
            return false;
        }
    }
    return true;
}

function WeightCheck() {
    var Weight = document.getElementById("Weight").value;
    if(Weight) {
        if(Weight <=10 || Weight > 700){
			node = document.createElement("p");
			node.setAttribute("id", "message");
			text = document.createTextNode("*Peso non valido");
			node.appendChild(text);
			Message.appendChild(node);
            return false;
        }
    }
    return true;
}

function CheckHeightAndWeight() {
	Message = document.getElementById("messageDiv");
	while(Message.hasChildNodes())
			Message.removeChild(Message.firstChild);
	var stop = true;
	if(!HeightCheck())
        stop = false; 
    if(!WeightCheck())
        stop = false;
	return stop;
}

function CheckAll() {
	Message = document.getElementById("messageDiv");
	while(Message.hasChildNodes())
			Message.removeChild(Message.firstChild);
	var stop = true;
    if(!HeightCheck())
        stop = false; 
    if(!WeightCheck())
        stop = false;
    if(!PwdCheck())
        stop = false;
    return stop;   
}