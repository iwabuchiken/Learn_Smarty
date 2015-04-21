<?php

require 'utils/utils.php';	//=>	woking	 
// require './../utils/utils.php';	//=>	no 
// require '../../utils/utils.php';	//=> no
// require 'utils/utils.php';

function test_sprintf() {
	
	$id = 11;
// 	$id = 1;
	
	$txt = sprintf("%02d", $id);
	
	printf("[%s : %d] txt=%s\n", 
					Utils::get_Dirname(__FILE__, CONS::$proj_Name), __LINE__, $txt);
	
	
	
	
}

function restore_FileName() {
	
	$dir_csv = "data";
	// 			$dir_csv = "../data";
		
	$dirlist = scandir($dir_csv);
		
	// 			var_dump($dirlist);
		
	// 			echo "<br>"; echo "<br>";
		
	$csv_files = array();
	
	$p = "/^\_tokens\_/";
		
	foreach ($dirlist as $name) {
	
		if (preg_match($p, $name) == 1) {
				
			array_push($csv_files, $name);
				
		};
	
	}
	
	print_r($csv_files);

	/*******************************
		rename
	*******************************/
	for ($i = 0; $i < count($csv_files); $i++) {
		
		$orig_name = implode(DIRECTORY_SEPARATOR, array($dir_csv, $csv_files[$i]));
		
		$new_name = implode(DIRECTORY_SEPARATOR, 
						array($dir_csv, substr($csv_files[$i], 1, strlen($csv_files[$i]))));
		
		$res = rename(
				$orig_name,
				$new_name);
		// 							implode(DIRECTORY_SEPARATOR, array($dir_csv, "_".$csv_files[0])));
		// 							implode(DIRECTORY_SEPARATOR, array($dir_csv, "*".$csv_files[0])));
		
	}
	
	printf("[%s : %d] done", 
					Utils::get_Dirname(__FILE__, CONS::$proj_Name), __LINE__);
	
	
	
}//restore_FileName

function do_job() {
	
	restore_FileName();
// 	test_sprintf();
	
}


do_job();
