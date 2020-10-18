<?php
	$sqlCon = false;
	GLOBAL $sqlCon;

	global $sqlCon;
	// check if already connected
	if (!isset($sqlCon) OR $sqlCon == false):
		if (isset(clConfig['sql']['engine'])):
			switch (clConfig['sql']['engine']) {
				//------------------------------------------------------------------
				//  CONNECT TO MYSQL
				//------------------------------------------------------------------
				case 'mysqli':
					$sqlCon = @mysqli_connect(
									clConfig['sql']['config']['host'],
									clConfig['sql']['config']['user'],
									clConfig['sql']['config']['pass'],
									clConfig['sql']['config']['name'],
									clConfig['sql']['config']['port']
								);
					if (!mysqli_connect_errno()):
						if (isset(clConfig['sql']['config']['characters'])):
							$charset = clConfig['sql']['config']['characters'];
							if ($charset != '' AND $charset != null AND $charset != false):
								$characters = mysqli_query($sqlCon,"SET character_set_results = '" . $charset . "', character_set_client = '" . $charset . "', character_set_connection = '" . $charset . "', character_set_database = '" . $charset . "', character_set_server = '" . $charset . "'");
								mysqli_query($sqlCon, "set names '" . $charset . "'");
							endif;
						endif;
					else:
						die('Database connection error');
					endif;
					break;
				//------------------------------------------------------------------
				//  CONNECT TO POSTGRESQL
				//------------------------------------------------------------------
				case 'postgresql':
					$sqlCon = pg_pconnect(
										"host=" . clConfig['sql']['config']['host'] .
										  " port=" . clConfig['sql']['config']['port'] .
										  " dbname=" . clConfig['sql']['config']['name'] .
										  " user=" . clConfig['sql']['config']['user'] .
										  " password=" . clConfig['sql']['config']['pass']
									  );
					if (!$sqlCon):
						die('Database connection error');
					endif;
					break;
				//------------------------------------------------------------------
				//  UNKNOWN ENGINE
				//------------------------------------------------------------------
				default:
				die('Unknown SQL engine  {' .  clConfig['sql']['config']['type'] . '}');
			}
		else:
			die('Unknown SQL engine');
		endif;

	endif;



	class sql {





		public static function columns($table)
		{
			$table = clConfig['sql']['config']['prefix'] . '_' . $table;
			$result = sql::query("SHOW COLUMNS FROM `" . sql::str($table) . "`");
			$output = array();
			while($row = sql::fetch($result)) :
				array_push($output,$row['Field']);
			endwhile;
			return $output;
		}





//		public static function disconnect(){
//			global $sqlCon;
//			if (isset($sqlCon) AND !empty($sqlCon)):
//				mysqli_close($sqlCon);
//				unset($sqlCon);
//			endif;
//			runtime::success('Database disconnected');
//		}


		public static function get($param, $singleShort = true){
			// $param = array(
			//     'table' => 'scan',
			//     'columns' => array('id', 'ip', 'datetime'),
			//     'where' => '' id="1"
			//     'limit' => 10
			//      'order' => 'id',
		    //      'sort' => 'asc'
			// );
			if (!isset($param['table'])):
				end();
			endif;
			$table = $param['table'] ;
			$param['table'] = clConfig['sql']['config']['prefix'] . '_' . $param['table'];

			if (!isset($param['limit'])):
				$param['limit'] = 9999999999;
			endif;

			if (!isset($param['offset'])):
				$param['offset'] = 0;
			endif;


			if (!isset($param['order'])):
				$param['order'] = 'id';
			endif;
			if (!isset($param['sort'])):
				$param['sort'] = 'asc';
			endif;


			if (isset($param['columns']) AND is_array($param['columns'])):
				$columns = '`id`, ';
				foreach ($param['columns'] as $column):
					$columns .= '`' . $column . '`,';
				endforeach;
			else:
				$param['columns'] = sql::columns($table);
				$columns = '*';
			endif;

			$columns = rtrim($columns, ',');


			$where = '';
			if (isset($param['where'])):
				$where = 'WHERE ' . $param['where'];
			endif;


			$query = "SELECT " . $columns . " FROM `" . $param['table'] . "` " .  $where . " ORDER BY " . $param['order'] . " " . $param['sort'] . " LIMIT " . $param['limit'] . ' OFFSET ' .  $param['offset'];
		//	echo $query . '<br />';
			$result = sql::query($query);

			$output = array();
			$lastId = 0;
			while($row = sql::fetch($result)) :
				$lastId = $row['id'];
				foreach ($param['columns'] as $column):
					if (isset($param['limit']) AND $param['limit'] == 1):
						if ($singleShort == true):
								$output[$column] = $row[$column];
							else:
								$output[$row['id']][$column] = $row[$column];
						endif;
					else:
						$output[$row['id']][$column] = $row[$column];
					endif;
				endforeach;
			endwhile;

			return $output;

		}



		public static function fetch($results)
		{
			global $sqlCon;
			$type = clConfig['sql']['engine'];

			switch ($type) {
				case 'mysqli':
					return mysqli_fetch_array($results);
				case 'pg':
					return pg_fetch_array($results);
			}
		}











		public static function str($string)
		{


			global $sqlCon;
			$type = clConfig['sql']['engine'];

			switch ($type) {
				case 'mysqli':
					if ($string != null AND !is_numeric($string) AND $string != ''):
						$return = mysqli_escape_string($sqlCon, $string);
						return $return;
					else:
						return $string;
					endif;
					break;
				case 'pg':
					if ($string != null AND !is_numeric($string)):
						return pg_escape_string($sqlCon, $string);
					else:
						return $string;
					endif;
					break;
			}
		}


		public static function query($query)
		{

			global $sqlCon;
			$type = clConfig['sql']['engine'];

			switch ($type) {
				case 'mysqli':
					return mysqli_query($sqlCon, $query);
				case 'pg':
					return pg_query($sqlCon, $query);
			}

		}



		public static function insert($table, $columns)
		{
			global $sqlCon;

			$table = clConfig['sql']['config']['prefix'] . '_' . $table;
			$type = clConfig['sql']['engine'];

			switch ($type) {
				case 'mysqli':
					$keys    = '';
					$values  = '';
					foreach ($columns as $key => $value):
						$keys .= '`' . $key . '`,';
						$values .= "'" . addslashes($value) . "',";
					endforeach;
					$keys    = trim($keys,",");
					$values  = trim($values,",");

					$query = "INSERT INTO `" . $table . "` (" . $keys . ") VALUES (" . $values . ")";
					//echo $query . '<br>';
					$result = sql::query($query);
					break;
				case 'pg':
					break;
			}
		}
//		public static function delete($table, $id) // single id or array ex. array(1,35,65)
//		{
//			global $sqlCon;
//			$type = CONFIG['database']['type'];
//			$table = CONFIG['database']['prefix'] . '_' . $table;
//			switch ($type) {
//				case 'mysqli':
//					if (is_array($id) AND !empty($id)):
//				        foreach($id as $key => $value):
//							$query = 'DELETE FROM `' . $table . '` WHERE id = ' . sql::str($value);
//							//echo $query;
//							sql::query($query);
//				    	endforeach;
//						return true;
//					else:
//						sql::query('DELETE FROM `' . $table . '` WHERE id = ' . sql::str($id));
//						return true;
//					endif;
//					break;
//				case 'pg':
//					return pg_last_oid($sqlCon);
//					//return true;
//			}
//			return false;
//		}


//		public static function insert_id()
//		{
//			global $sqlCon;


//			$type = CONFIG['database']['type'];

//			switch ($type) {
//				case 'mysqli':
//					return mysqli_insert_id($sqlCon);
//				case 'pg':
//					return pg_last_oid($sqlCon);
//			}
//		}

//		public static function max_id($table)
//		{
//			global $sqlCon;

//			$table = CONFIG['database']['prefix'] . '_' . $table;
//			$type = CONFIG['database']['type'];

//			switch ($type) {
//				case 'mysqli':
//						$result =  sql::query("SELECT id FROM " . $table . " ORDER BY id DESC LIMIT 1");
//						while($row = sql::fetch($result)):
//							return $row['id'];
//						endwhile;
//					break;
//				case 'pg':
//					break;
//			}

//		}


//		public static function listId($table, $stringSeparator = false) // false == array
//		{
//			global $sqlCon;
//			$return = array();
//			$table = CONFIG['database']['prefix'] . '_' . $table;
//			$type = CONFIG['database']['type'];

//			switch ($type) {
//				case 'mysqli':
//						$result =  sql::query("SELECT id FROM `" . $table . "` ORDER BY id ASC");
//						while($row = sql::fetch($result)):
//							array_push($return,$row['id']);
//						endwhile;
//						if ($stringSeparator == false):
//							return $return;
//						else:
//							$returnString = '';
//							foreach($return as $value):
//								$returnString .= $value . $stringSeparator;
//							endforeach;
//							$returnString = trim($returnString,$stringSeparator);
//							return $returnString;
//						endif;
//					break;
//				case 'pg':
//					break;
//			}

//		}


//		public static function counter($query)
//		{
//			global $sqlCon;
//			//echo $query;
//			$result =  sql::query($query);
//		//	echo $query;
//			$type = CONFIG['database']['type'];

//			switch ($type) {
//				case 'mysqli':
//					$num_rows = mysqli_num_rows($result);
//					if ($num_rows > 0)
//					{
//						return $num_rows ;
//					} else{
//						return 0;
//					}
//					break;
//				case 'pg':
//					$num_rows = pg_num_rows($result);
//					if ($num_rows > 0)
//					{
//						return $num_rows ;
//					} else{
//						return 0;
//					}
//					break;
//			}
//		}



			public static function update($table, $where, $array)
			{


				global $sqlCon;


				$table = clConfig['sql']['config']['prefix'] . '_' . $table;
				$type = clConfig['sql']['engine'];

				switch ($type) {
					case 'mysqli':
						$output  = '';
						foreach ($array as $key => $value):
							$output .= "`" . $key . '`=';
							$output .= '"' . $value . '",';
						endforeach;
						$output    = trim($output,",");
						$query = "UPDATE `" . $table . "` ";
						$query .= "SET " . $output . " ";
						$query .= "WHERE " . $where;
						//echo $query;
						sql::query($query);
						break;
					case 'pg':
						break;
				}

				global $db;
			}

//			/*@funciton
//			######################################################
//			    @title          Core CONFIGuration file
//			    @tags           core,CONFIGuration
//			    @version        1.0
//			*/
//		public static function row($table, $column = '*',  $id)
//		{
//			global $sqlCon;
//			$type = CONFIG['database']['type'];
//			$table = CONFIG['database']['prefix'] . '_' . $table;
//			/* Column */
//			if ($column == '*'):
//			    switch ($type) {
//			        case 'mysqli':
//			            $query = "SELECT * FROM `" . $table . "` WHERE id='" . $id . "' LIMIT 1";
//			            $result = sql::query($query);
//			            $return = array();
//			            while($row = sql::fetch($result)):
//							foreach (sql::columns($table) as $value) {
//								$return[$value] = $row[$value];
//							}
//			            endwhile;
//			            return $return;
//			        case 'pg':
//			            break;
//			    }
//			endif;
//			/* Column */
//			if (strpos($column, ",") !== false):
//				$columns = explode(",",$column);
//			    $columns = array_filter($columns);
//			    $columns = array_unique($columns);
//			    $select = '';
//			    foreach ($columns as $value) {
//			        $select .= '`' . $value . '`,';
//			    }
//			    $select = trim($select,",");
//			    switch ($type) {
//					// mysql
//			        case 'mysqli':
//			            $query = "SELECT " . $select . " FROM `" . $table . "` WHERE id='" . $id . "' LIMIT 1";
//			            $result = sql::query($query);
//			            $return = array();
//			            while($row = sql::fetch($result)):
//							foreach ($columns as $value) {
//								$return[$value] = $row[$value];
//							}
//			            endwhile;
//			            return $return;
//					// pg
//			        case 'pg':
//			            break;
//			    }
//			endif;
//			/* Columns array */
//			if ($table != null AND $id != null):
//				switch ($type) {
//					// sql
//					case 'mysqli':
//						$query = "SELECT `" . $column . "` FROM `" . $table . "` WHERE id='" . $id . "' LIMIT 1";
//						//echo $query . '<br>';
//						$result = sql::query($query);
//						while($row = sql::fetch($result)):
//							if ($row[$column] != null):
//								return preg_replace('/\s&nbsp;\s/i', ' ', $row[$column]);
//							else:
//								return null;
//							endif;
//						endwhile;
//						break;
//					case 'pg':
//						// pg
//						break;
//				}
//			else:
//				return null;
//			endif;
//			return false;
//		}

//		public static function where($table, $column, $where)
//		{
//			$table = CONFIG['database']['prefix'] . '_' . $table;
//			if ($table != null AND $where != null AND $column != null)
//			{
//			global $sqlCon;


//				$result = sql::query("SELECT " . $column . " FROM `" . $table . "`  WHERE " . $where . " LIMIT 1");



//				while($row = sql::fetch($result))
//				{
//					if ($row[$column] != null)
//					{
//						return $row[$column];
//					} else
//					{
//					 return null;
//					}
//				}
//			}else
//			{
//			return null;
//			}
//		}






	}
//	sql::connect();
?>
