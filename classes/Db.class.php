<?php
class Db{
		private $_numRow;
		public $dbh= null;
		
		public function __construct()
		{
			$driver="mysql:host=". HOST."; dbname=". DB_NAME;
			try
			{
				$this->dbh = new PDO($driver, DB_USER, DB_PASS);
				$this->dbh->query("set names 'utf8' ");
				
			}	
			catch(PDOException $e)
			{
				echo "Err:". $e->getMessage();	exit();
			}
		}
		
		public function __destruct()
		{
			$this->dbh= null;
		}
	
		public function getRowCount()
		{
			return $this->_numRow;	
		}
		
		private function query($sql, $arr = array(), $mode = PDO::FETCH_ASSOC)
		{
			$stm = $this->dbh->prepare($sql);
			if (!$stm->execute( $arr)) 
				{
					echo "Sql lỗi."; //exit;	
				}
			$this->_numRow = $stm->rowCount();
			return $stm->fetchAll($mode);
			
		}
	
		public function exeQuery($sql,  $arr = array(), $mode = PDO::FETCH_ASSOC)
		{
			return $this->query($sql, $arr, $mode);	
		}
	
		public function exeNoneQuery($sql,  $arr = array(), $mode = PDO::FETCH_ASSOC)
		{
			$this->query($sql, $arr, $mode);	
			return $this->getRowCount();
		}
		
		public function countItems($sql, $arr= array())
		{
			$data = $this->exeQuery($sql, $arr, PDO::FETCH_BOTH);
			return $data[0][0];
		}
		public function sql_debug($sql_string, array $params = null) {
			if (!empty($params)) {
			$indexed = $params == array_values($params);
			foreach($params as $k=>$v) {
			if (is_object($v)) {
			if ($v instanceof \DateTime) $v = $v->format('Y-m-d H:i:s');
			else continue;
			}
			elseif (is_string($v)) $v="'$v'";
			elseif ($v === null) $v='NULL';
			elseif (is_array($v)) $v = implode(',', $v);
			
			if ($indexed) {
			$sql_string = preg_replace('/\?/', $v, $sql_string, 1);
			}
			else {
			if ($k[0] != ':') $k = ':'.$k; //add leading colon if it was left out
			$sql_string = str_replace($k,$v,$sql_string);
			}
			}
			}
			return $sql_string;
			}
	}
?>