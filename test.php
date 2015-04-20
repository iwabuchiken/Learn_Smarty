<?php

require 'utils/utils.php';

function test_sprintf() {
	
	$id = 11;
// 	$id = 1;
	
	$txt = sprintf("%02d", $id);
	
	printf("[%s : %d] txt=%s\n", 
					Utils::get_Dirname(__FILE__, CONS::$proj_Name), __LINE__, $txt);
	
	
	
	
}


function do_job() {
	
	test_sprintf();
	
}


do_job();
