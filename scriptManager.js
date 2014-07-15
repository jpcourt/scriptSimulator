function computeScript(){
	var phpContent = document.getElementById('scriptInput').value;
	//var phpContent = '<?php \n'+scriptText+'\n ?>';

	console.log('Script saisi :\n'+phpContent);

	var xhr = new XMLHttpRequest();
	xhr.open('POST', 'editAndExecScript.php?script=testScript');
	xhr.onreadystatechange = function(aEvt) {
		if (xhr.readyState == 4) {
			if (xhr.status == 200) {
				var xhr2 = new XMLHttpRequest();
				xhr2.open('GET', 'script.php');
				xhr2.onreadystatechange = function(aEvt) {
					if (xhr.readyState == 4) {
						if (xhr.status == 200) {
							document.getElementById('scriptOutput').value = xhr2.responseText;
							console.log('Résultat obtenu : '+xhr2.responseText);
						}
					}
				}
				xhr2.send();
			}
		}
	}
	xhr.send(phpContent);
}