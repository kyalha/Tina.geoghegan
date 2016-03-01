var selectedFile = '';
		function getMenuSelected (){
			var url = window.location.href;
			var page= url.slice(url.lastIndexOf('/')+1, url.length-4);

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

	function displayFileInfo() {
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
		var selectorDir = document.getElementById("selectDirectory");
		var folderSelected = selectorDir.options[selectorDir.selectedIndex].value;
		//alert('Are you sure that you want to delete this folder '+ folderSelected +' and all the images contained within?');
		var xhttp = new XMLHttpRequest();
		var data = "selectDirectory="+folderSelected+"&toDelete=true";
		xhttp.open("POST", "/Tina.geoghegan/controller.php", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.onreadystatechange = function() {
			if (xhttp.readyState == 4 && xhttp.status == 200) {
			}
		};
	  xhttp.send(data);
	}
	function saveFolder(){
		var xhttp = new XMLHttpRequest();
		var data = "folderNameToSave="+document.getElementById('folderNameToSave').value;
		xhttp.open("POST", "/Tina.geoghegan/controller.php", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.onreadystatechange = function() {
			if (xhttp.readyState == 4 && xhttp.status == 200) {
			}
		};
	  xhttp.send(data);
	}
	function updateFolder(){
		var xhttp = new XMLHttpRequest();
		var selectorDir = document.getElementById("selectDirectory");
		var folderSelected = selectorDir.options[selectorDir.selectedIndex].value;
		var data = "newFolderToUpdate="+document.getElementById('newFolderToUpdate').value+ "&selectDirectory="+folderSelected;
		xhttp.open("POST", "/Tina.geoghegan/controller.php", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.onreadystatechange = function() {
			if (xhttp.readyState == 4 && xhttp.status == 200) {
			}
		};
		xhttp.send(data);
	}

	function updateExhibition(){
		var xhttp = new XMLHttpRequest();
		var newText = document.getElementById("exhibitionID");
		var data = "exhibitionID="+newText;
		xhttp.open("POST", "/Tina.geoghegan/controller.php", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.onreadystatechange = function() {
			if (xhttp.readyState == 4 && xhttp.status == 200) {
			}
		};
		xhttp.send(data);
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
		}
	}
function saveFiles(){
	var xhttp = new XMLHttpRequest();
	var selectorDir = document.getElementById("selectDirectory");
	var folderSelected = selectorDir.options[selectorDir.selectedIndex].value;
	var fileName = document.getElementById("fileName").value;
	var description = document.getElementById("fileDescription").value;
	var id = document.getElementById("fileToUpload").value;
	var file = document.getElementById("fileToUpload");
	var data = "insertFiles=true&selectorDir="+folderSelected+"&fileName="+fileName+"&description="+description+"&id="+id;

	xhttp.open("POST", "/Tina.geoghegan/controller.php?"+data, true);
	//xhttp.setRequestHeader("Content-type", "multipart/form-data");

	var formData = new FormData();
	formData.append(fileName, file.files[0],fileName);
	xhttp.send(formData);
	xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4 && xhttp.status == 200) {
		 alert(xhttp.statusText);
		}
	};


}

function updateExhibition(){
	var content = CKEDITOR.instances.exhibitionID.getData();
	var data = "exhibitionID="+content;
	var xhttp = new XMLHttpRequest();
	xhttp.open("POST", "/Tina.geoghegan/controller.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4 && xhttp.status == 200) {
		}
	};
	alert(data);
	xhttp.send(data);

}
function updateBiography(){
	var content = CKEDITOR.instances.biographyID.getData();
	var data = "biographyID="+content;
	var xhttp = new XMLHttpRequest();
	xhttp.open("POST", "/Tina.geoghegan/controller.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4 && xhttp.status == 200) {
		 console.log("updateBiography");
		}
	};
	xhttp.send(data);
}

/*
var i = 0;
var path = new Array();
// LIST OF IMAGES
path[0] = "image_1.gif";
path[1] = "image_2.gif";
path[2] = "image_3.gif";

function swapImage()
{
   document.slide.src = path[i];
   if(i < path.length - 1) i++; else i = 0;
   setTimeout("swapImage()",3000);
}
window.onload=swapImage;
*/