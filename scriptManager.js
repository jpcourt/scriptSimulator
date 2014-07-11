function computeScript(){
	var scriptText = document.getElementById('scriptInput').value;
	var phpContent = '<?php \n'+scriptText+'\n ?>';

	console.log('Script saisi :\n'+phpContent);

	var xhr = new XMLHttpRequest();
	xhr.open('GET', 'editAndExecScript.php?script='+phpContent);
	xhr.onreadystatechange = function(aEvt) {
		if (xhr.readyState == 4) {
			if (xhr.status == 200) {
				document.getElementById('scriptOutput').value = xhr.responseText;
			}
		}
	}
	xhr.send();
}