function computeScript(){
	var phpContent = document.getElementById('scriptInput').value;
	var scriptName = document.getElementById('scriptName').value;

	console.log('Script saisi :\n'+phpContent);

	var xhr = new XMLHttpRequest();
	xhr.open('POST', 'editAndExecScript.php?script='+scriptName);
	xhr.onreadystatechange = function(aEvt) {
		if (xhr.readyState == 4) {
			if (xhr.status == 200) {
				var xhr2 = new XMLHttpRequest();
				xhr2.open('GET', 'data/'+scriptName+'.php');
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

function displayScripts(){
	var xhr = new XMLHttpRequest();
	xhr.open('GET', 'getScriptList.php');
	xhr.onreadystatechange = function(aEvt) {
		if (xhr.readyState == 4) {
			if (xhr.status == 200) {
				var scriptList = JSON.parse(xhr.response);
				var buttonList = "";
				scriptList.foreach(function(script){
					buttonList += '<button type="button" class="btn btn-primary" onclick="setCurrentScript('+'"'+script.replace('.php', '')+'"'+')">'+script+'</button>';
				});
				document.getElementById('scriptList').innerHTML = buttonList;
			}
		}
	}
	xhr.send();

}

function setCurrentScript(scriptName){
	document.getElementById('scriptName').value = scriptName.replace('.php', '');
	var xhr = new XMLHttpRequest();
	xhr.open('GET', 'readScriptFile.php?script='+scriptName);
	xhr.onreadystatechange = function(aEvt) {
		if (xhr.readyState == 4) {
			if (xhr.status == 200) {
				document.getElementById('scriptInput').value = xhr.response.replace("<?php \r\n", '').replace("\r\n ?>", '');
			}
		}
	}
	xhr.open();

}