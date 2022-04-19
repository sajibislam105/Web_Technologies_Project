function validate_search(pForm)
 { 	 	
 	let errh = document.getElementById("errh"); 
	const s = pForm.s.value;

	if (s == "") 
	{ 
		errh.innerHTML = "Empty!"; return false;
	} 

 	const actionUrl = pForm.action; 
 	const actionM = pForm.method;
 
	let xhttp = new XMLHttpRequest();
	xhttp.onload = function() 
	{ 
		document.getElementById("hint").innerHTML = this.responseText;
	}
	xhttp.open(actionM, actionUrl + "?q=" + s);
	xhttp.send();

}