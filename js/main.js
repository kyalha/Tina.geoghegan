
	function getMenuSelected (){
		var url = window.location.href;
		var page= url.slice(url.lastIndexOf('/')+1, url.length-4);

	}

		function selectPasswordOption(){
			document.getElementById('contentPortfolio').style.display = 'none';
			document.getElementById('changePassword').style.display = 'inline';
			document.getElementById('contentExhibition').style.display = 'none';
			document.getElementById('contentBiography').style.display = 'none';
		}

	function selectPortfolioOption() {
		document.getElementById('changePassword').style.display = 'none';
		document.getElementById('contentPortfolio').style.display = 'inline';
		document.getElementById('contentExhibition').style.display = 'none';
		document.getElementById('contentBiography').style.display = 'none';
	}

	function selectExhibitionOption() {
		document.getElementById('changePassword').style.display = 'none';
		document.getElementById('contentPortfolio').style.display = 'none';
		document.getElementById('contentExhibition').style.display = 'inline';
		document.getElementById('contentBiography').style.display = 'none';
	}
	function selectBiographyOption() {
		document.getElementById('changePassword').style.display = 'none';
		document.getElementById('contentPortfolio').style.display = 'none';
		document.getElementById('contentExhibition').style.display = 'none';
		document.getElementById('contentBiography').style.display = 'inline';
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
		alert('Are you sure that you want to delete this folder '+ folderSelected +' and all the images contained within?');
	}
	function saveFolder(){
		var xhttp = new XMLHttpRequest();
		var data = "folderName="+document.getElementById('folderNameToSave').value;
		xhttp.open("POST", "http://localhost/Tina.geoghegan/controller.php", true);
		xhttp.onreadystatechange = function() {
			if (xhttp.readyState == 4 && xhttp.status == 200) {
			 console.log("finish");
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

	function handleFileSelect(evt) {
		evt.stopPropagation();
		evt.preventDefault();
		var files = evt.dataTransfer.files; // FileList object.
		// files is a FileList of File objects. List some properties.
		var output = [];
		for (var i = 0, f; f = files[i]; i++) {
			output.push('<li><strong>', escape(f.name), '</strong> (', f.type || 'n/a', ') - ',
									f.size, ' bytes, last modified: ',
									f.lastModifiedDate ? f.lastModifiedDate.toLocaleDateString() : 'n/a',
									'</li>');
		}
		document.getElementById('list').innerHTML = '<ul>' + output.join('') + '</ul>';
	}

	function handleDragOver(evt) {
		evt.stopPropagation();
		evt.preventDefault();
		evt.dataTransfer.dropEffect = 'copy'; // Explicitly show this is a copy.
	}

document.addEventListener('DOMContentLoaded',function(){
	var dropZone = document.getElementById('drop_zone');
	dropZone.addEventListener('dragover', handleDragOver, false);
	dropZone.addEventListener('drop', handleFileSelect, false);

},false);

function saveHTMLContent(){

}
