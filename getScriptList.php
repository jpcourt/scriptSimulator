<?php

	require_once 'dir_lib.php';

	$file_list = array();

	$file_list = list_files_matching('*.php',FALSE);

	echo json_encode($file_list);

?>