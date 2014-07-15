<?php

	require_once 'file_lib.php';

	$file_list = array();

	$file_list = list_files_matching('*.php','data/');

	echo json_encode($file_list);

?>