<?php

	require '../models/Token.php';
	
	class DB {

		public static $db_Local_PDO = "sqlite:dogsDb_PDO.sqlite";
		
		public static $db_Remote_Name = "mysql018.phy.lolipop.lan";
		public static $db_Remote_Uname = "LAA0278957";
		public static $db_Remote_Pword = "g2zsbynjrbsj2cj";
		public static $db_Remote_DBName = "LAA0278957-cakenr5";
// 		public static $db_Remote_PDO = "mysql:host=";
// 		public static $db_Remote_PDO = "mysql:host=$db_Remote_Name;dbname=$db_Remote_DBName";

		public static $dbType_SQLite = "sqlite";
		public static $dbType_MySQL = "mysql";
		
		
		
		//********************************************
// 		Functions
		//********************************************
		
		public static function
		setup_DB($smarty) {
			
			@$server_Name = $_SERVER['SERVER_NAME'];
			
			if ($server_Name == null) {
			
				$db_Type = "sqlite";
				
				$db_Name = "sqlite:dogsDb_PDO.sqlite";
				
				$db = new PDO($db_Name);
			
			} else if ($server_Name == 'localhost') {
			
				$db_Type = "sqlite";
				
				$db_Name = "sqlite:dogsDb_PDO.sqlite";
				
				$db = new PDO($db_Name);
				
			} else {//if ()
				
				$db_Type = "mysql";
				
				$hostname = "mysql018.phy.lolipop.lan";
				
				$db_Name = "mysql:host=$hostname;dbname=LAA0278957-cakenr5";
// 				$db_Name = "mysql:host=$hostname;dbname=mysql";
				
				$username = "LAA0278957";
				
				$password = "g2zsbynjrbsj2cj";
				
// 				"mysql:host=$hostname;dbname=mysql", $username, $password
				
				$db = new PDO($db_Name, $username, $password);
				
			}//if ()
			
			echo "PDO => created: ".$db_Name." (db type = $db_Type)";
			
			echo "<br>";
			echo "<br>";
			
			try {
			
				if ($db_Type == "sqlite") {
				
					$db = null;
					
					//REF http://stackoverflow.com/questions/17997722/sqlite3-query-to-list-all-tables-in-database-only-shows-one-table answered Aug 1 '13 at 15:10
					$db = new SQLite3("dogsDb_PDO.sqlite");
					
// 					$sql = ".tables";
					$tablesquery = $db->query("SELECT name FROM sqlite_master WHERE type='table';");
				
					var_dump($tablesquery);
					
					echo "<br>";
					echo "<br>";
					
					while ($table = $tablesquery->fetchArray(SQLITE3_ASSOC)) {
						echo $table['name'] . '<br />';
					}
					
					$db = null;
					
				} else {
				
					$sql = "show tables";

					$res = $db->query($sql, PDO::FETCH_NUM);
// 					$res = $db->query($sql);
	
					echo "sql => $sql";
					echo "<br>";
					echo "<br>";
	
					var_dump(get_class($res));
					var_dump($res);
				
					echo "<br>";
					echo "<br>";

// 					$index = 1;
					
					//REF http://stackoverflow.com/questions/1451720/equivalent-of-mysql-list-tables-in-php-pdo answered Jan 29 '14 at 12:32
					while($row = $res->fetch()){
// 					while($row=$alltables->fetch()){
					
						echo $row[0].'<br/>';
						
					}
					
				}//if ($db_Type == "sqlite")
				
// 				$res = $db->query($sql);
				
// 				echo "sql => $sql";
// 				echo "<br>";
// 				echo "<br>";
				
// 				var_dump(get_class($res));
// 				var_dump($res);
				
				
// 				//REF if not exists http://stackoverflow.com/questions/1601151/how-do-i-check-in-sqlite-whether-a-table-exists answered Mar 5 '11 at 17:36
// 				$db->exec("CREATE TABLE IF NOT EXISTS"
// 						." Dogs "
// 						."(Id INTEGER PRIMARY KEY, Breed TEXT, Name TEXT, Age INTEGER)");
				
// 				$result = $db->query('SELECT * FROM Dogs');
			
// 				$result = $db->query('SELECT * FROM Dogs');

// 				$smarty->assign('result', $result);

				/*******************************
					db: close
				*******************************/
				$db = null;
			
			} catch (Exception $e) {
			
				print $e->getMessage();
			
			}//try
			
		}//setup_DB
		
		public static function
		get_DB_Type() {

			@$server_Name = $_SERVER['SERVER_NAME'];
				
			if ($server_Name == null) {
					
				return DB::$dbType_SQLite;
					
			} else if ($server_Name == 'localhost') {

				return DB::$dbType_SQLite;
			
			} else {//if ()
			
				return DB::$dbType_MySQL;			
				
			}//if ()
				
		}//get_DB_Type
		
		public static function
		get_DB($dbType) {

			/*******************************
				dispatch
			*******************************/
			if ($dbType == null || $dbType == DB::$dbType_SQLite) {		//	SQLite
	
				$db = new PDO(DB::$db_Local_PDO);
	
			} else {//if ()		// remote => MySQL
	
				$db_Remote_PDO = "mysql:host="
								.DB::$db_Remote_Name.";dbname="
								.DB::$db_Remote_DBName;
// 				$db_Remote_PDO = "mysql:host=$db_Remote_Name;dbname=$db_Remote_DBName";

				printf("[%s : %d] PDO=%s", Utils::get_Dirname(__FILE__, "Smarty"), __LINE__, $db_Remote_PDO);
// 				printf("[%s : %d] PDO=%s", __FILE__, __LINE__, $db_Remote_PDO);
				
				echo "<br>";
				echo "<br>";
				
// 				$db = null;

				//REF encoding http://stackoverflow.com/questions/4475548/pdo-mysql-and-broken-utf-8-encoding answered Aug 11 '11 at 17:53
				$db = new PDO(
							$db_Remote_PDO, 
							DB::$db_Remote_Uname, 
							DB::$db_Remote_Pword,
							array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
				);
	
			}//if ()
		
			/*******************************
				return
			*******************************/
			return $db;
			
		}//get_DB
		
		/*******************************
			@return
			Array of fetched rows
		*******************************/
		public static function
		findAll_Tokens($smarty) {
			
			/*******************************
				get: db
			*******************************/
			$dbType = DB::get_DB_Type();
			
			$db = DB::get_DB($dbType);

			/*******************************
				validate
			*******************************/
			if ($db == null) {
				
				printf("[%s : %d] db => null: type=%s", __FILE__, __LINE__, $dbType);
				
				echo "<br>";
				echo "<br>";
				
				return null;
				
			}

			/*******************************
				get: tokens
			*******************************/
			if ($dbType == DB::$dbType_MySQL) {
			
				$rows = array();
				
				$sql = "SELECT * FROM tokens WHERE history_id = 1545;";
// 				$sql = "SELECT * FROM tokens WHERE id < 10;";
				
				$res = $db->query($sql);
				
				while($row = $res->fetch()){
					// 					while($row=$alltables->fetch()){
						
// 					var_dump(array_values($row));
// 					var_dump(array_keys($row));
// 					var_dump($row);
					
// 					echo "<br>";
					
					
					
// 					echo $row[0].",".$row[1].",".$row[2].","
// // 							.mb_convert_encoding($row[3], "UTF-8")
// 							.$row[3]
// 							.'<br/>';
				
					array_push($rows, $row);
					
				}

				printf("[%s : %d] rows => %d", __FILE__, __LINE__, count($rows));
				
				echo "<br>";
				echo "<br>";
				
				
			
			} else {
			
				printf("[%s : %d] sqlite. no op", __FILE__, __LINE__);
				
				echo "<br>";
				echo "<br>";
				
				
				
			}//if ($dbType == DB::$dbType_MySQL)
			
			/*******************************
				db: close
			*******************************/
			$db = null;

			/*******************************
				return
			*******************************/
			return $rows;
			
		}//findAll_Tokens($smarty)

		/*******************************
			@return
			-1	=> db --> null
		*******************************/
		public static function
		save_Tokens($smarty, $tokens) {
			
			/*******************************
			 get: db
			*******************************/
			$dbType = DB::get_DB_Type();
				
			$db = DB::get_DB($dbType);
			
			/*******************************
			 validate
			*******************************/
			if ($db == null) {
			
				printf("[%s : %d] db => null: type=%s", __FILE__, __LINE__, $dbType);
			
				echo "<br>";
				echo "<br>";
			
				return -1;
			
			}

			/*******************************
			 save: tokens
			*******************************/
// 			if ($dbType == DB::$dbType_MySQL) {
					
// 				$rows = array();
			
// 				$sql = "SELECT * FROM tokens WHERE history_id = 1545;";
// 				// 				$sql = "SELECT * FROM tokens WHERE id < 10;";
			
// 				$res = $db->query($sql);
			
// 				while($row = $res->fetch()){
// 					// 					while($row=$alltables->fetch()){
			
// 					// 					var_dump(array_values($row));
// 					// 					var_dump(array_keys($row));
// 					// 					var_dump($row);
						
// 					// 					echo "<br>";
						
						
						
// 					// 					echo $row[0].",".$row[1].",".$row[2].","
// 					// // 							.mb_convert_encoding($row[3], "UTF-8")
// 					// 							.$row[3]
// 					// 							.'<br/>';
			
// 					array_push($rows, $row);
						
// 				}
			
// 				printf("[%s : %d] rows => %d", __FILE__, __LINE__, count($rows));
			
// 				echo "<br>";
// 				echo "<br>";
			
			
					
// 			} else {
					
// 				printf("[%s : %d] sqlite. no op", __FILE__, __LINE__);
			
// 				echo "<br>";
// 				echo "<br>";
			
			
			
// 			}//if ($dbType == DB::$dbType_MySQL)
					
			/*******************************
			 db: close
			*******************************/
			$db = null;

			/*******************************
				return
			*******************************/
			return -1;
				
		}//save_Tokens($smarty, $tokens)
		
	}//class DB