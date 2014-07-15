<?php

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