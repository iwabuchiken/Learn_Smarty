<?php

// 	require('/libs/Smarty.class.php');	//=> works
// 	require('Smarty.class.php');	//=> "No such..."
	require('libs/Smarty.class.php');	//=> works
	
	$smarty = new Smarty();

	$smarty->setTemplateDir('libs/templates');
	$smarty->setCompileDir('libs/templates_c');
	$smarty->setCacheDir('libs/cache');
	$smarty->setConfigDir('libs/configs');
	
	/*******************************
		assigns
	*******************************/
// 	$smarty->assign('name', 'Ned');
	$smarty->assign('name', 'george smith');
	$smarty->assign('address', '45th & Harris');
	
	$smarty->display('index.tpl');
	
	echo "done";