<?php

	require_once 'file_lib.php';

	$script = $_GET['script'];

	return read_file('data/'.$script);

?>