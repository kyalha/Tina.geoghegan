var selectedFiles = '';
		function getMenuSelected (){
			var url = window.location.href;
			var page= url.slice(url.lastIndexOf('/')+1, url.length-4);
		}
		function isEmpty(str) {
			    return (!str || 0 === str.length);
			}
		function selectPasswordOption(){
			document.getElementById('contentPortfolio').style.display = 'none';
			document.getElementById('contentExhibition').style.display = 'none';
			document.getElementById('contentBiography').style.display = 'none';
		}

	function selectPortfolioOption() {
		document.getElementById('contentPortfolio').style.display = 'inline';
		document.getElementById('contentExhibition').style.display = 'none';
		document.getElementById('contentBiography').style.display = 'none';
	}

	function selectExhibitionOption() {
		document.getElementById('contentPortfolio').style.display = 'none';
		document.getElementById('contentExhibition').style.display = 'inline';
		document.getElementById('contentBiography').style.display = 'none';
	}
	function selectBiographyOption() {
		document.getElementById('contentPortfolio').style.display = 'none';
		document.getElementById('contentExhibition').style.display = 'none';
		document.getElementById('contentBiography').style.display = 'inline';
	}
	function displayfileInfo(){
			document.getElementById('addingFileInfo').style.display = 'inline';
	}

	function checkAll() {
	  var checkboxes = document.getElementsByName('checkFile');
		for (var i = 0; i < checkboxes.length; i++) {
			checkboxes[i].checked  = true;
		}
	}
	function uncheckAll() {
	  var checkboxes = document.getElementsByName('checkFile');
		for (var i = 0; i < checkboxes.length; i++) {
			checkboxes[i].checked  = false;
		}
	}

function addContentSave(){
	document.getElementById('contentAddFolder').style.display = 'inline';
	document.getElementById('contentUpdateFolder').style.display = 'none';
}

function addContentUpdate(){
	document.getElementById('contentUpdateFolder').style.display = 'inline';
	document.getElementById('contentAddFolder').style.display = 'none';
}

	function deleteFolder(){
		if(document.getElementById("selectDirectory").value != "Choose a folder"){
			var selectorDir = document.getElementById("selectDirectory");
			var folderSelected = selectorDir.options[selectorDir.selectedIndex].value;
			var xhttp = new XMLHttpRequest();
			var data = "selectDirectory="+folderSelected+"&toDelete=true";
			xhttp.open("POST", "/Tina.geoghegan/controller.php", true);
			xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		  xhttp.send(data);
		}
			else {
				alert("Choose a folder");
			}
			location.reload(true);
	}
	function saveFolder(){
			var xhttp = new XMLHttpRequest();
			var data = "folderNameToSave="+document.getElementById('folderNameToSave').value;
			xhttp.open("POST", "/Tina.geoghegan/controller.php", true);
			xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		  xhttp.send(data);
			location.reload(true);
	}
	function updateFolder(){
		if(document.getElementById("selectDirectory").value != "Choose a folder"){
			var xhttp = new XMLHttpRequest();
			var selectorDir = document.getElementById("selectDirectory");
			var folderSelected = selectorDir.options[selectorDir.selectedIndex].value;
			var data = "newFolderToUpdate="+document.getElementById('newFolderToUpdate').value+ "&selectDirectory="+folderSelected;
			xhttp.open("POST", "/Tina.geoghegan/controller.php", true);
			xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xhttp.send(data);
		}else {
			alert("Choose a folder");
		}
		location.reload(true);
	}

	function updateExhibition(){
		var xhttp = new XMLHttpRequest();
		var newText = CKEDITOR.instances.exhibitionID.getData();
		var data = "exhibitionID="+encodeURIComponent(newText);
		xhttp.open("POST", "/Tina.geoghegan/controller.php", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send(data);
		alert("Content of exhibition has been updated.");
		location.reload(true);
	}

	function updateBiography(){
		var xhttp = new XMLHttpRequest();
		var newText = CKEDITOR.instances.biographyID.getData();
		var data = "biographyID="+encodeURIComponent(newText);
		xhttp.open("POST", "/Tina.geoghegan/controller.php", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		alert(data);
		xhttp.send(data);
		alert("Content of biography has been updated.");
		location.reload(true);
	}

	function displayImages() {
		 var j;
		 var i;
		 var selectorDir = document.getElementById("selectDirectory");
		var folderSelected = selectorDir.options[selectorDir.selectedIndex].value;
		for (i = 0; i < selectorDir.length; i++) {
			var allDivs= document.getElementsByTagName("div");
			for (var j = 0; j < allDivs.length; j++) {
					if(allDivs[j].id == "details"){
						if(allDivs[j].className == folderSelected){
							allDivs[j].style.display = 'inline';
						}else {
							allDivs[j].style.display = 'none';
						}
					}
				}
				if (selectorDir.options[i].id == 'optionToRemove' ){
		     selectorDir.remove(i);
		  	}
		}
}

function saveFiles(){
	if(document.getElementById("selectDirectory").value != "Choose a folder"){
		var xhttp = new XMLHttpRequest();
		var selectorDir = document.getElementById("selectDirectory");
		var folderSelected = selectorDir.options[selectorDir.selectedIndex].value;
		var id = document.getElementById("fileToUpload").value;
		var file = document.getElementById("fileToUpload");
		var title = document.getElementById("title").value;
		var description = document.getElementById("fileDescription").value;
		if(!isEmpty(id) && !isEmpty(title)){
			var data = "insertFiles=true&selectorDir="+folderSelected+"&id="+id+"&title="+title+"&fileDescription="+description;
			xhttp.open("POST", "/Tina.geoghegan/controller.php?" + data, true);
			var formData = new FormData();
			formData.append('name', file.files[0]);
			xhttp.send(formData);
			alert("Your file has been added");
		}else {
			alert("Select a file and add a title!");
		}
	}else {
		alert("Choose a folder");
	}
	location.reload(true);
}

function removeFiles(){
	var selectorDir = document.getElementById("selectDirectory");
	var folderSelected = selectorDir.options[selectorDir.selectedIndex].value;
	var xhttp = new XMLHttpRequest();
	var inputs = document.getElementsByTagName("input");
	var checked = []; //will contain all checked checkboxes
			for (var i = 0; i < inputs.length; i++) {
			  if (inputs[i].type == "checkbox" && inputs[i].id == folderSelected) {
			    if (inputs[i].checked) {
			      checked.push(inputs[i]);
			    }
			  }
			}
		if(checked.length != 0){
			var titleImage='';
			var filePath='';
			var data= "removeFiles=true";
			for (var i = 0; i < checked.length; i++) {
				titleImage = checked[i].value;
				filePath= checked[i].src;
				filePath= filePath.substring(filePath.lastIndexOf('/')+1,filePath.length);
				 data += "&filePath"+i+"="+filePath+"&titleImage"+i+"="+titleImage;
			}
				data += "&countID="+checked.length;
				xhttp.open("POST", "/Tina.geoghegan/controller.php?" + data, true);
				xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xhttp.send(data);
		}else {
			alert("Choose at least one file to delete.")
		}
		location.reload(true);
}
function saveInfoFile(){
	  var array_contentFile =  document.getElementsByName("contentFile");
		var xhttp = new XMLHttpRequest();
		var id = 0;
		var data = "updateFileInfo=true";
		for (var i = 0; i < array_contentFile.length; i++) {
			var array_titles = array_contentFile[i].getElementsByTagName("input")[1];
			var array_descriptions = array_contentFile[i].getElementsByTagName("input")[2];
		 	id = array_contentFile[i].getElementsByTagName('img')[0].id;
				var newName = array_titles.value;
				var oldName = array_titles.placeholder;
				if(!isEmpty(newName)){
				  data += "&updateName=true&newName="+newName+"&oldName="+oldName+"&id="+id;
				}
				var newDescription = array_descriptions.value;
				var oldDescription = array_descriptions.placeholder;
				if(!isEmpty(newDescription)){
					data += "&updateDescription=true&newDescription="+newDescription+"&oldDescription="+oldDescription+"&id="+id;;
				}

		}
		alert("Informations of the file has been changed.")
		xhttp.open("POST", "/Tina.geoghegan/controller.php?" + data, true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send(data);
		location.reload(true);
}

function connectAdmin() {
	if(document.getElementById("loginName").value != "" && document.getElementById("loginPwd").value != ""){
		var loginName = document.getElementById("loginName").value;
		var loginPwd = document.getElementById("loginPwd").value;
		var xhttp = new XMLHttpRequest();
		var data = "loginName="+loginName+"&loginPwd="+loginPwd;

		xhttp.open("POST", "/Tina.geoghegan/login.php", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send(data);
			alert(data);
	}
}
