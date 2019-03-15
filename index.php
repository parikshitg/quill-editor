<!DOCTYPE html>
<html>
<head>
	<title>Quill Editor</title>
	
	<link rel="stylesheet" href="quill/quill.snow.css">
	<script src="quill/quill.js"></script>
</head>
<body>
	<form action="/" method="post">
		<label for="about">Quill Editor : </label>
		<input name="about" type="hidden">
		<div id="editor">
		</div>
		<script>
			var toolbaroptions=[
				['bold', 'italic', 'underline','strike'],
				['blockquote', 'code-block'],
				[{'header': [1,2,3,4,5,6,false]}],
				[{'list': 'ordered'}, {'list': 'bullet'}],
				[{'script': 'sub'}, {'script': 'super'}],
				[{'indent': '-1'}, {'indent': '+1'}],
				['link','image','video','formula'],
				[{'color': [] }, {'background': [] }, {'align': [] }],
			];

			var editor = new Quill('#editor', {
				modules:{
					toolbar: toolbaroptions 
				},
		    	theme: 'snow'
		  	});

			var form = document.querySelector('form');
			form.onsubmit = function() {
				var about = document.querySelector('input[name=about]');
				about.value = editor.root.innerHTML;
				return true;
			}; 	
		</script>
		<br>
		<button type="submit" name="submit" onclick="display()">Submit</button>
	</form>

	<?php
		if(isset($_POST['submit'])) {
			$editor = $_POST['about'];
			echo "\nAboutme : ". $editor;
		}
	?> 

</body>
</html>