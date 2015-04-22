<?php 

// 	require '../utils/Task_SaveTokens.php';

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
	
	function smarty_Setup($smarty) {

		$smarty->setCaching(true);

		/*
		 * "../libs"	=> "../" needed
		 * 					to use templates dir under ".../Smarty/libs/templates"
		 */
// 		$smarty->setTemplateDir('../libs/templates');
// 		$smarty->setCompileDir('../libs/templates_c');
// 		$smarty->setCacheDir('../libs/cache');
// 		$smarty->setConfigDir('../libs/configs');
		
		$smarty->setTemplateDir('libs/templates');
		$smarty->setCompileDir('libs/templates_c');
		$smarty->setCacheDir('libs/cache');
		$smarty->setConfigDir('libs/configs');

		/*******************************
			cache: clear
		*******************************/
		$smarty->clearAllCache();
		
	}

	function get_Tpl_Name() {

		@$tpl_name = $_REQUEST['tpl'];
		// 	@$tpl_name = $_SERVER['tpl'];
		
		// 	echo "tpl=$tpl_name";
		
		if ($tpl_name == null) {
		
			$tpl_name = "parent";
			// 		$tpl_name = "parent.tpl";
		
		}//if ($tpl_name == null)
		
		return $tpl_name;
		
	}

	function 
	execute_View($smarty, $tpl_name) {

		printf("[%s : %d] tpl_name => %s", 
						Utils::get_Dirname(__FILE__, CONS::$proj_Name), __LINE__, $tpl_name);
		
		
		echo "<br>"; echo "<br>";
		
// 		$smarty->display("/$tpl_name");	//=> 
// 		$smarty->display("../templates/$tpl_name");	//=> w
// 		$smarty->display("../templates/D-1/$tpl_name.tpl");	//=> w
// 		$smarty->display("../libs/templates/$tpl_name");	//=> no
// 		$smarty->display("templates/D-1/$tpl_name.tpl");	//=> no
// 		$smarty->display("D-1/$tpl_name.tpl");	//=> n/w
		
		$p = "/([^\/]+)(?=\.tpl$)/i";
// 		$p = "/\/([a-zA-Z_0-9.]+?)\.tpl/";
// 		$p = "/\/(.+)\.tpl/";
		
		preg_match($p, $tpl_name, $matches);
		
		var_dump($matches);
		
		echo "<br>"; echo "<br>";
		
		printf("[%s : %d] matches => %d", 
						Utils::get_Dirname(__FILE__, CONS::$proj_Name), __LINE__, count($matches));
		
		echo "<br>"; echo "<br>";
		
		if (count($matches) > 0) {
			
			$tpl_name_edited = $matches[1];
			
		} else {
			
			$tpl_name_edited = $tpl_name;
			
		}

		printf("[%s : %d] \$tpl_name_edited => %s", 
						Utils::get_Dirname(__FILE__, CONS::$proj_Name), __LINE__, $tpl_name_edited);
		
		echo "<br>"; echo "<br>";
		
		/*******************************
			clear: cache
		*******************************/
		//REF clear cache http://stackoverflow.com/questions/5395377/how-to-clear-smartys-cache answered Mar 22 '11 at 17:31
// 		$smarty->clearAllCache();
// 		$smarty->clear_all_cache();	//=> Smarty: Call of unknown method 'clear_all_cache'.
		
		$tpl_name_edited .= "???";
		
// 		$smarty->assign('tpl_name', "abc???");	//=> n/w
// 		$smarty->assign('tpl_name', $tpl_name_edited." !!!");	//=> n/w
		$smarty->assign('tpl_name', $tpl_name_edited);		//=> w
// 		$smarty->assign('tpl_name', "$tpl_name_edited");	//=> w
		
		$smarty->assign('title', $tpl_name_edited);
		
		$smarty->assign('path_css', "/Smarty/main/libs/templates/rsc/css/main.css");
		
		
		/*******************************
			disp
		*******************************/
		$smarty->display("../templates/$tpl_name");	//=> w
		
		echo "<hr>";
		echo "<br>";
		echo "done (".__FILE__.")";
		
	}//execute_View($smarty, $tpl_name)

	function execute_DB($smarty) {

		/*******************************
			get: rows
		*******************************/
		$rows = DB::findAll_Tokens($smarty);
		
		if ($rows == null) {
			
			printf("[%s : %d] rows => null", __FILE__, __LINE__);
			
			echo "<br>";
			echo "<br>";

			return ;
			
		}
		
		printf("[%s : %d] rows => %d", __FILE__, __LINE__, count($rows));
		echo "<br>";
		echo "<br>";
		
		/*******************************
			get: tokens
		*******************************/
		$tokens = Utils::conv_Rows_2_Tokens($smarty, $rows);
		
		/*******************************
			view
		*******************************/
		echo "<table border='1'>";
		
			for ($i = 0; $i < 10; $i++) {

				echo "<tr>";
					
					$t = $tokens[$i];

					echo "<td>";
						echo $t->get_form();
					echo "</td>";
					
					echo "<td>";
						echo $t->get_hin();
					echo "</td>";
					
// 					echo "<br>";
// 					echo "<br>";
				
				echo "</tr>";
				
			}
		
		echo "</table>";
		
		echo "<br>";
		echo "<br>";
		
		
		
	}
	
	function 
	execute_DB_Create_LocalDB($smarty) {

		/*******************************
			open
		*******************************/
		$fname = "../data/tokens.csv";
		
		$f = fopen($fname, "r");
		
		if ($f == false) {
			
			printf("[%s : %d] csv => false", 
					Utils::get_Dirname(__FILE__, CONS::$proj_Name), __LINE__);
			
			echo "<br>";
			echo "<br>";
			
			return ;
			
		} else {
			
			printf("[%s : %d] csv => opened: %s", 
					Utils::get_Dirname(__FILE__, CONS::$proj_Name), __LINE__, $fname);

			echo "<br>"; echo "<br>";
			
		}

		/*******************************
			read: csv
		*******************************/
		$count = 0;
		$len = -1;
		
		$data = fgetcsv($f, 500, ",");		// first line => header
		$data = fgetcsv($f, 500, ",");		// 	
		
		$content = "";
		
		$tokens = array();
		
		//REF fgets http://www.tizag.com/phpT/fileread.php
		while ($data) {

			$t = Utils::conv_Row_2_Token($smarty, $data);
			
			array_push($tokens, $t);
			
			$data = fgetcsv($f, 500, ",");
			
		}//while (condition)		
		
		printf("[%s : %d] read csv => done", 
						Utils::get_Dirname(__FILE__, CONS::$proj_Name), __LINE__);
		
		echo "<br>"; echo "<br>";

		printf("[%s : %d] tokens = %d", 
						Utils::get_Dirname(__FILE__, CONS::$proj_Name), __LINE__, count($tokens));

		echo "<br>"; echo "<br>";
		
		/*******************************
			close
		*******************************/
		fclose($f);
		
// 		/*******************************
// 			save: tokens
// 		*******************************/
// 		$res = DB::save_Tokens($smarty, $tokens);
		
// 		/*******************************
// 			result
// 		*******************************/
// 		printf("[%s : %d] save tokens => %d", 
// 						Utils::get_Dirname(__FILE__, CONS::$proj_Name), __LINE__, $res);
		
		echo "<br>"; echo "<br>";
		
	}//execute_DB_Create_LocalDB
	
	function 
	do_Job_D_3_V_1_0() {

// 		/*******************************
// 		 server
// 		*******************************/
// 		@$server_Name = $_SERVER['SERVER_NAME'];
		
// 		if ($server_Name == null) {
		
// 			printf("[%s : %d] servr name => null",
// 			Utils::get_Dirname(__FILE__, CONS::$proj_Name), __LINE__);
				
// 			echo "<br>"; echo "<br>";
				
// 			do_Job_D_2_V_2_0();
				
// 			return ;
		
// 		} else if ($server_Name != CONS::$server_Local) {
		
// 			printf("[%s : %d] server is => $server_Name",
// 			Utils::get_Dirname(__FILE__, CONS::$proj_Name), __LINE__);
		
// 			echo "<br>"; echo "<br>";
				
// 		}
			
		/*******************************
			setup: smarty
		*******************************/
		$smarty = new Smarty();
		
		smarty_Setup($smarty);
		
		//debug
		printf("[%s : %d] %s",
		Utils::get_Dirname(__FILE__, CONS::$proj_Name),
		// 				Utils::get_Dirname(__FILE__, "Smarty"),
		__LINE__, Utils::get_CurrentTime());
		
		echo "<br>"; echo "<br>";

		/*******************************
			tokens: of a category
		*******************************/
		$start = time();

		$cat_id = 15;

		printf("[%s : %d] cat_id => %d", 
						Utils::get_Dirname(__FILE__, CONS::$proj_Name), __LINE__, $cat_id);
		
		
		echo "<br>"; echo "<br>";
		
		
		
		$tokens = DB::findAll_Tokens_from_CatID($smarty, $cat_id);
		
		$end = time();
		
		
		printf("[%s : %d] time => %s", 
						Utils::get_Dirname(__FILE__, CONS::$proj_Name), 
						__LINE__, date('H:i:s', $end - $start - (9*60*60)));
		
		echo "<br>"; echo "<br>";
		
		printf("[%s : %d] tokens => %d", 
						Utils::get_Dirname(__FILE__, CONS::$proj_Name), __LINE__, count($tokens));
		
		echo "<br>"; echo "<br>";
		
// 		var_dump($tokens[10]);
		
		echo "<br>"; echo "<br>";
		
		
		/*******************************
		 tpl name
		*******************************/
		$tpl_name = get_Tpl_Name();
		
		/*******************************
		 assigns
		*******************************/
		if (!$smarty->isCached($tpl_name)) {
		
			echo "not cached => $tpl_name.tpl";

			echo "<br>"; echo "<br>";
			
// 			smarty_Assign($smarty, $tpl_name);
		
		} else {
		
			echo "$tpl_name.tpl => cached";

			echo "<br>"; echo "<br>";
			
		}
		
		/*******************************
		view
		*******************************/
// 		$smarty->setTemplateDir('libs/templates/D-1');
		
// 		$tpl_name = "D-3/parent.tpl";	//	 
// 		$tpl_name = "D-3/index_table.tpl";	//	n/w 
// 		$tpl_name = "index/$tpl_name.tpl";		//	n/w 
// 		$tpl_name = "D-1/index/$tpl_name.tpl";		//	n/w 
// 		$tpl_name = "D-1/$tpl_name.tpl";		// w
// 		$tpl_name = "D-3/$tpl_name.tpl";		// w
// 		$tpl_name = "D-3\\index\\index_table.tpl";	// n/w
		$tpl_name = "D-3/index/index_table.tpl";	// w
// 		$tpl_name = "D-3/index/index_table.tpl";	// n/w
// 		$tpl_name = "D-3/index/index_table.tpl";	// n/w
// 		../templates/$tpl_name
// 		$smarty->display("../templates/D-1/$tpl_name.tpl");	//=> w

		execute_View($smarty, $tpl_name);
		
	}//do_Job_D_3_V_1_0

?>

<?php

	require('../libs/Smarty.class.php');	//=> works
// 	require('libs/Smarty.class.php');	//=> works

	require '../utils/utils.php';
	require '../utils/DB.php';
// 	require 'utils/utils.php';
// 	require 'utils/DB.php';
	
	do_Job_D_3_V_1_0();
