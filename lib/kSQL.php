<?
	class kSQL
	{
		private $db_host = MY_SQL_HOST;
		private $db_user = MY_SQL_UN;
		private $db_pass = MY_SQL_PW;
		private $db_name = MY_SQL_DB;
		private $con = false;
		private $result = array();
		private $db;
		
		function __construct($info = null) 
		{
			if(isset($info))
			{
				$this->db_host = $info['host'];
				$this->db_name = $info['name'];
				$this->db_user = $info['user'];
				$this->db_pass = $info['pass'];
			}
			if(!$this->con)
			{
				try
				{
					$this->db = new PDO("mysql:host=$this->db_host;dbname=$this->db_name", $this->db_user, $this->db_pass);
					$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
					$this->con = true;
					return true;
				}
				catch(PDOException $e)
				{
					echo $e->getMessage();
					return false;
				}
			}
		}

		public function tableExists($table)
		{
			$tablesInDb = $this->db->query('SHOW TABLES FROM '.$this->db_name.' LIKE "'.$table.'"')->fetch();
			if($tablesInDb) return true;
			else return false;
		}
	
		public function select($info)
		{
			if(!isset($info['rows'])) $info['rows'] = '*';
			$q = 'SELECT '.$info['rows'].' FROM '.$info['table'];
			if(isset($info['where'])) $q .= ' WHERE '.$info['where'];
			if(isset($info['order'])) $q .= ' ORDER BY '.$info['order'];
			if(isset($info['limit'])) $q .= ' LIMIT '.$info['limit'];
			$select = $this->db->query($q);
//			echo $q;
			$c = 0;
			while ($query = $select->fetch(PDO::FETCH_OBJ))
			{
				$return[$c] = $query;
				$c++;
			}
			if($c == 1) return $return[0];
			elseif(isset($return)) return $return;
			else return false;
		}


	
		public function counter($info)
		{
			if(!isset($info['rows'])) $info['rows'] = '*';
			$q = 'SELECT COUNT(*) FROM '.$info['table'];
			if(isset($info['where'])) $q .= ' WHERE '.$info['where'];
			$select = $this->db->query($q);
//			echo $q;
			$c = 0;
			$return = $select->fetch(PDO::FETCH_COLUMN);
			return $return;
		}
		
		public function selectfe($info)
		{
			if(!isset($info['rows'])) $info['rows'] = '*';
			$q = 'SELECT '.$info['rows'].' FROM '.$info['table'];
			if(isset($info['where'])) $q .= ' WHERE '.$info['where'];
			if(isset($info['order'])) $q .= ' ORDER BY '.$info['order'];
			if(isset($info['limit'])) $q .= ' LIMIT '.$info['limit'];
			$select = $this->db->query($q);
//			echo $q;
			$c = 0;
			while ($query = $select->fetch(PDO::FETCH_OBJ))
			{
				$return[$c] = $query;
				$c++;
			}
//			if($c == 1) return $return[0];
			if(isset($return)) return $return;
			else return false;
		}


		public function fmore()
		{
//			$query = $this->db->fetch();
//			if($query) return $query;
//			else return false;
		}

		public function alter($info)
			{
				if($this->tableExists($info['table']))
				{
					$alter = "ALTER TABLE " . $info['table'] . " " . $info['how'];
					$doit = $this->db->query($alter);
					if($doit) return true;
					else return false;
				}
				else return false;
			}
			
		public function insert($info)
		{
			if($this->tableExists($info['table']))
			{
				$insert = 'INSERT INTO '.$info['table'];
				if(isset($info['rows'])) $insert .= ' ('.$info['rows'].')';
				if(isset($info['values'])) $insert .= ' VALUES('.$info['values'].')';
				if(isset($info['where'])) $insert .= ' WHERE '.$info['where'];
//				echo $insert;
				$ins = $this->db->query($insert);
				if($ins) return true;
				else return false;
			}
			else return false;
		}

		public function update($info)
		{
			if($this->tableExists($info['table']))
			{
				$update = 'UPDATE '.$info['table'];
				if(isset($info['values'])) $update .= ' SET '.$info['values'];
				if(isset($info['where'])) $update .= ' WHERE '.$info['where'];
				$ins = $this->db->query($update);
				if($ins) return true;
				else return false;
			}
			else return false;
		}

		public function delete($info)
		{
			if($this->tableExists($info['table']))
			{
				if(isset($info['where'])) $delete = 'DELETE FROM '.$info['table'].' WHERE '.$info['where'];
				else $delete = 'DELETE '.$table;
				$del = $this->db->query($delete);
				if($del) return true;
				else	return false;
			}
			else	return false;
		}

		public function db_name() 
		{
			return $this->db_name;
		}
	}
?>
