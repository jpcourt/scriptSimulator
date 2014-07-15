<?php

	require_once 'file_lib.php';

	$script = $_GET['script'];

	echo read_file('data/'.$script);

?>