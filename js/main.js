	
	var url = window.location.href;
	var page= url.slice(url.lastIndexOf("/")+1, url.length-4);
	document.getElementById(page).className += " menuSelected";
	