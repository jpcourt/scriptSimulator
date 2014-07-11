function computeScript(){
	var scriptText = document.getElementById('scriptOutput').value;
	var phpContent = '<?php'+scriptText+'?>';

	var xhr = new XMLHttpRequest();
	xhr.open('GET', 'editAndExecScript.php?script='+phpContent);
	xhr.onreadystatechange = function(aEvt) {
		if (xhr.readyState == 4) {
			if (xhr.status == 200) {
				document.getElementById('scriptInput').value = xhr.responseText;
			}
		}
	}
	xhr.send();
}