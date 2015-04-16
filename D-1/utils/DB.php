<?php

	class DB {
		
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
		
	}