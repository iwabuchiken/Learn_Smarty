<?php 

function
smarty_Assign($smarty, $tpl_name) {

	$values = array(
				
			'name'		=> 'george smith',
			'address'	=> '45th & Harris',
			'title'		=> 'YEEEEEES',
			'tpl_name'	=> $tpl_name,
	
	);
	
	//REF http://stackoverflow.com/questions/3406726/echo-key-and-value-of-an-array-without-and-with-loop answered Aug 4 '10 at 14:53
	foreach ($values as $key => $val) {
	
		$smarty->assign($key, $val);
			
	}//foreach ($values as $key => $val)

	//REF http://www.smarty.net/crash_course
	$smarty->assign('id', array(1,2,3,4,5));
	$smarty->assign('names', array('bob','jim','joe','jerry','fred'));
	
	//REF
	$smarty->assign('users', array(
				
			array('name' => 'Ranin', 'phone' => '851-0709'),
			array('name' => 'Bionix', 'phone' => '936-2424'),
			array('name' => 'Geolight', 'phone' => '787-5310'),
			array('name' => 'Vivahome', 'phone' => '186-9423'),
			array('name' => 'Xxx-string', 'phone' => '743-5533'),
			array('name' => 'Sil Fax', 'phone' => '707-1217'),
			array('name' => 'Tristip', 'phone' => '045-4660'),
			array('name' => 'Indigotom', 'phone' => '477-9912'),
			array('name' => 'Zer-Dom', 'phone' => '662-1066'),
			array('name' => 'Statlab', 'phone' => '649-9669'),
			array('name' => 'Dongtouch', 'phone' => '151-8126'),
			array('name' => 'Zoom-Sing', 'phone' => '035-9587'),
			array('name' => 'Plus Hatsoft', 'phone' => '593-5603'),
			array('name' => 'Touchis', 'phone' => '421-1919'),
			array('name' => 'Ozerlax', 'phone' => '600-8364'),
			array('name' => 'Saosoft', 'phone' => '003-5907'),
				
	));
	
	$val = array();
	
	$val['Token']['id'] = 12;
	
	$smarty->assign('val', $val);
	// 		$smarty->assign("val", val);
	
}//smarty_Assign($smarty, $tpl_name)

?>

<?php

	require('libs/Smarty.class.php');	//=> works

	require 'utils/utils.php';
	require 'utils/DB.php';
	
	$smarty = new Smarty();

	$smarty->setCaching(true);
	
	$smarty->setTemplateDir('libs/templates');
	$smarty->setCompileDir('libs/templates_c');
	$smarty->setCacheDir('libs/cache');
	$smarty->setConfigDir('libs/configs');

	//debug
	echo Utils::get_CurrentTime();
	
	echo "<br>";
	echo "<br>";
	
	/*******************************
		db
	*******************************/
	DB::setup_DB($smarty);
	
	/*******************************
		tpl name
	*******************************/
	@$tpl_name = $_REQUEST['tpl'];
	// 	@$tpl_name = $_SERVER['tpl'];
	
	// 	echo "tpl=$tpl_name";
	
	if ($tpl_name == null) {
	
		$tpl_name = "parent";
		// 		$tpl_name = "parent.tpl";
	
	}//if ($tpl_name == null)
	
	/*******************************
		assigns
	*******************************/
	if (!$smarty->isCached($tpl_name)) {

		echo "not cached => $tpl_name.tpl";

		smarty_Assign($smarty, $tpl_name);
		
	} else {
		
		echo "$tpl_name.tpl => cached";
		
	}	
	
	$smarty->display("D-1/$tpl_name.tpl");
	
	$smarty->assign('tpl_name', "D-1/$tpl_name.tpl");
	
	echo "<hr>";
	echo "<br>";
	echo "done (".__FILE__.")";
	
	
	