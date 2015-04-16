<?php

// 	require('/libs/Smarty.class.php');	//=> works
// 	require('Smarty.class.php');	//=> "No such..."
	require('libs/Smarty.class.php');	//=> works

	require 'utils/utils.php';
	
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
	try {
		
		$db = new PDO('sqlite:dogsDb_PDO.sqlite');
// 		$db = new PDO('sqlite:file:///D-1/dogsDb_PDO.sqlite');	//=> no
// 		$db = new PDO('sqlite://D-1/dogsDb_PDO.sqlite');	//=> n/w
// 		$db = new PDO('sqlite:D-1/dogsDb_PDO.sqlite');
// 		$db = new PDO('sqlite:dogsDb_PDO.sqlite');
		
		//REF if not exists http://stackoverflow.com/questions/1601151/how-do-i-check-in-sqlite-whether-a-table-exists answered Mar 5 '11 at 17:36
		$db->exec("CREATE TABLE IF NOT EXISTS"
					." Dogs "
					."(Id INTEGER PRIMARY KEY, Breed TEXT, Name TEXT, Age INTEGER)");

// 		$db->exec("INSERT INTO Dogs (Breed, Name, Age) VALUES ('Labrador', 'Tank', 2);".
// 				"INSERT INTO Dogs (Breed, Name, Age) VALUES ('Husky', 'Glacier', 7); " .
// 				"INSERT INTO Dogs (Breed, Name, Age) VALUES ('Golden-Doodle', 'Ellie', 4);");
		
		$result = $db->query('SELECT * FROM Dogs');
		
		echo count($result);

// 		print_r($result);
// 		echo $result;

		echo "<br>";
		echo "<br>";
		
		print "<table border=1>";
		
		print "<tr><td>Id</td><td>Breed</td><td>Name</td><td>Age</td></tr>";
		
		$result = $db->query('SELECT * FROM Dogs');
		
		foreach($result as $row)
			
			{
				
				print "<tr><td>".$row['Id']."</td>";
				
				print "<td>".$row['Breed']."</td>";
				
				print "<td>".$row['Name']."</td>";
				
				print "<td>".$row['Age']."</td></tr>";
				
			}
		
		print "</table>";
		
		$db = null;

	} catch (Exception $e) {
		
		print $e->getMessage();
		
	}
	
	
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
		
	// 	$smarty->assign('name', 'Ned');
		$smarty->assign('name', 'george smith');
		$smarty->assign('address', '45th & Harris');
		$smarty->assign('title', 'YEEEEEES');
		
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
		
	} else {
		
		echo "$tpl_name.tpl => cached";
		
	}	
	
// 	@$tpl_name = $_REQUEST['tpl'];
// // 	@$tpl_name = $_SERVER['tpl'];
	
// // 	echo "tpl=$tpl_name";
	
// 	if ($tpl_name == null) {
	
// 		$tpl_name = "parent";
// // 		$tpl_name = "parent.tpl";
	
// 	}//if ($tpl_name == null)
	
	$smarty->display("D-1/$tpl_name.tpl");
	
	$smarty->assign('tpl_name', "D-1/$tpl_name.tpl");
	
// 	$smarty->display('D-1/parent.tpl');
// 	$smarty->display('D-1/index.tpl');
// 	$smarty->display('index.tpl');
	
	echo "<hr>";
	echo "<br>";
	echo "done (".__FILE__.")";