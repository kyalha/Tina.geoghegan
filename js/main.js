
	function getMenuSelected (){
		var url = window.location.href;
		var page= url.slice(url.lastIndexOf('/')+1, url.length-4);

	}

		function selectPasswordOption(){
			document.getElementById('changePassword').style.display = 'inline';
			document.getElementById('handleFile').style.display = 'none';
		}

	function selectGalleryOption() {
		document.getElementById('changePassword').style.display = 'none';
		document.getElementById('handleFile').style.display = 'inline';
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

document.addEventListener('DOMLoaded',function(){
	var dropZone = document.getElementById('drop_zone');
	dropZone.addEventListener('dragover', handleDragOver, false);
	dropZone.addEventListener('drop', handleFileSelect, false);

},false);
