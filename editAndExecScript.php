<?php

	require_once 'file_lib.php';

	if(isset($_GET['script'])){
		$php_content = $_GET['script'];
	}else{
		$php_content = $argv[1];
	}

	$php_content = "<?php \n".$php_content."\n ?>";

	chmod('script.php', 0777);

	write_file('script.php', $php_content);

	//echo exec('php script.php');

?>