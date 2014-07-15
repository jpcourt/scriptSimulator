<?php

	function access_file($path){
		//Récupère un contenu sur le réseau
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $path);
		curl_setopt($curl, CURLOPT_HEADER, 0);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_BINARYTRANSFER,1);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
		$rawdata = curl_exec($curl);

		if(curl_errno($curl)){
			echo "Erreur dans la lecture du fichier : ".date("Y-m-d")." ".date("H:i:s")." ".curl_error($curl)."\r\n";
			return false;
		}else{
			echo $rawdata."\r\n";
			return $rawdata;
		}
	}

	function read_file($filepath){
		//Lit un fichier présent en local
		$handle = fopen($filepath,'r');
		$data = fread($handle, filesize($filepath));
		fclose($handle);
		unset($handle);
		return $data;
	}

	function write_file($filepath, $data){
		//crée ou modifie un fichier ; le contenu du fichier devient le contenu en entrée $data 
		$handle = fopen($filepath,'w+');
		$res = fwrite($handle, $data);
		fclose($handle);
		unset($handle);
		//echo "Ecriture : ".$res."\r\n";
	}

	function append_file($filepath, $data){
		//ajoute à un fichier existant le contenu $data ; si le fichier n'existe pas, le crée
		$handle = fopen($filepath,'a+');
		$res = fwrite($handle, $data);
		fclose($handle);
		unset($handle);
		//echo "Ajout : ".$res."\r\n";
	}

	function list_files($dir){

		$result = array();

		if(is_dir($dir)){
			if($handle =opendir($dir)){
				while (($file = readdir($handle)) !== FALSE ){
					$result[] = $file;
				}
				closedir($handle);
			}
		}

		return $result;
	}

	function list_files_matching($pattern, $dir){
		
		$current_dir = getcwd();

		if($dir !== FALSE){
			chdir($dir);
		}

		$result = array();

		foreach (glob($pattern) as $filename) {
			$result[] = $filename;
		}
		
		chdir($current_dir);

		return $result;
	}

?>