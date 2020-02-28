//mostra i like / dislike messi sui post dall'utente

function mostraStatsUtenteDislike(Like, IdPost, LikeDislike) {
	var classAttribute = document.getElementById( LikeDislike + IdPost).getAttribute("class");
	
	//l'ultimo carattere di class indica se il like/dislike attuale è 1 o 0
	var currentLike = parseInt(classAttribute.charAt(classAttribute.length-1));
	
	//l'utente ha cambiato mipiace/non mi piace piu volte allo stesso post senza ricaricare la pagina
	if(currentLike != Like){
		Like = currentLike;
	}
	
	var Complemento = Inverti(Like);

	var xmlhttp = new XMLHttpRequest();
	var url = './ajax/LikeDislike.php?Like=' + Complemento + '&IdPost=' + IdPost +'&LikeDislike=' + LikeDislike;

	xmlhttp.open("POST", url , true);
	xmlhttp.send();

	xmlhttp.onreadystatechange = function (){
		if(this.readyState == 4 && this.status == 200){
			
			LikeDislikeItem = document.getElementById(LikeDislike + IdPost);
			LikeDislikeItem.setAttribute("class", "LikeDislike "+ LikeDislike + Complemento);
			
			var LikeNumber = document.getElementById(LikeDislike + "Number" + IdPost);
			
			if(Like == 0){
				UpdateNumber(LikeNumber, 1);
				
			} else if(Like == 1){
				UpdateNumber(LikeNumber, -1);
			}
			
			LikeDislike = InvertiLikeDislike(LikeDislike);
			var classAttribute = document.getElementById(LikeDislike + IdPost).getAttribute("class");
			var currentLike = parseInt(classAttribute.charAt(classAttribute.length-1));
			
			//se l'utente ha messo like (o dislike) al post e sceglie di mettere dislike (o like)
			//diminuisco automaticamente il numero di like (o dislike)
			if(currentLike == 1){
				LikeDislikeItem = document.getElementById(LikeDislike + IdPost);
				LikeDislikeItem.setAttribute("class", "LikeDislike "+ LikeDislike + 0);
				var LikeNumber = document.getElementById(LikeDislike + "Number" + IdPost);
				UpdateNumber(LikeNumber, -1);
			}
		}	
	}
}

//aumenta o diminuisce di 1 il numero totale di like/dislike di un post
function UpdateNumber(elem, addSub){
	var value = parseInt(elem.textContent);	
	value += addSub;
	temp = document.createTextNode(value.toString());
	elem.removeChild(elem.firstChild);
	elem.appendChild(temp);
}

//cambia variabile da "like" a "diskile" o viceversa 
function InvertiLikeDislike(LikeDislike){
	if(LikeDislike == "Like"){
		return "Dislike";
	} else if(LikeDislike == "Dislike"){
		return "Like";
	}
	return null;
}

//inverte un intero da 0 a 1 o viceversa
function Inverti(Number){
	if(Number == 1){
		return 0;
	} else if (Number == 0){
		return 1;
	} else {
		return null;
	}
}
    


