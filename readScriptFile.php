<?php

	require_once 'file_lib.php';

	$script = $_GET['script'];

	echo str_replace(array("<?php \n", "\n ?>"), "", read_file('data/'.$script));

?>