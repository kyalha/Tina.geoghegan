window.onload = function() {
	function getMenuSelected (){
		var url = window.location.href;
		var page= url.slice(url.lastIndexOf('/')+1, url.length-4);

	}
		function selectPasswordOption(){
			document.getElementById('main').innerHTML =
			"<form class='changePassword'>\
				<label for='oldPassword'>Old password</label>\
				<input type='password' name='oldPassword' value='********'><br>\
				<label for='newPassword'>New password</label>\
				<input type='password' name='newPassword' value='********'><br>\
				<label for='confirmNew'>Confirm new password</label>\
				<input type='password' name='confirmNew' value='********'><br>\
				<button type='button'>Change password </button>\
			</form>";
		}

	function selectGalleryOption() {
		document.getElementById('main').innerHTML =
		"<div id='drop_zone'>Drop files here</div>\
	<output id='list'></output>\
		<form action='/file-upload'\
	      class='dropzone'\
	      id='my-awesome-dropzone'\
				method='post' enctype='multipart/form-data'>\
				<div class='fallback'>\
		    <input name='file' type='file' multiple />\
		  	</div>\
				</form>\
				</div>";
	}
	function handleFileSelect(evt) {
		evt.stopPropagation();
		evt.preventDefault();

		var files = evt.dataTransfer.files;
		var output = [];
		for (var i = 0, f; f = files[i]; i++) {
			output.push('<li><strong>', escape(f.name), '</strong> (', f.type || 'n/a', ') - ',
									f.size, ' bytes, last modified: ',
									f.lastModifiedDate ? f.lastModifiedDate.toLocaleDateString() : 'n/a',
									'</li>');
									var reader = new FileReader();

						      // Closure to capture the file information.
						      reader.onload = (function(theFile) {
						        return function(e) {
						          // Render thumbnail.
						          var span = document.createElement('span');
						          span.innerHTML = ['<img class="thumb" src="', e.target.result,
						                            '" title="', escape(theFile.name), '"/>'].join('');
						          document.getElementById('list').insertBefore(span, null);
						        };
						      })(f);

						      // Read in the image file as a data URL.
						      reader.readAsDataURL(f);
		}
		document.getElementById('list').innerHTML = '<ul>' + output.join('') + '</ul>';
	}

	function handleDragOver(evt) {
		evt.stopPropagation();
		evt.preventDefault();
		evt.dataTransfer.dropEffect = 'copy'; // Explicitly show this is a copy.
	}
	var dropZone = document.getElementById('drop_zone');
	dropZone.addEventListener('dragover', handleDragOver, false);
	dropZone.addEventListener('drop', handleFileSelect, false);

	document.getElementById('files').addEventListener('change', handleFileSelect, false);
}
