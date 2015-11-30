<?php 

class Table
{
	protected $_id= null;
	public $table = null;
	
	function __construct()
	{
		
	}
	
	function bind($data)
	{
		foreach($data as $key=>$value)
		{
			$this->$key = $value;
		}
	}
	
	function load($id)
	{
		$this->_id = $id;
		$dbo = Database::getInstance();
		$sql = $this->buildQuery('load');
		
		$dbo->doQuery($sql);
		$row = $dbo->loadObjectList();
				
		foreach($row as $key=>$value)
		{
			if($key == "_id")
			{
				continue;
			}
			
			$this->$key = $value;
		}	
	}
	
	function store()
	{
		$dbo = Database::getInstance();
		$sql = $this->buildQuery('store');
		$dbo->doQuery($sql);
	}
	
	protected function buildQuery($task)
	{
		$sql = "";
		if($task == 'store')
		{
			if($this->_id =="")
			{
				$keys = "";
				$values = "";
				$classVars = get_class_vars(get_class($this));
				$sql .= "Insert into {$this->table}";
				foreach($classVars as $key=>$value)
				{
					if($key == "_id" || $key == "table")
					{
						continue;
					}
					
					$keys .= "{$key},";
					$values .= "'{$this->$key}',";
				}
				$sql .="(".substr($keys, 0, -1).") Values(".substr($values, 0, -1).")";
				
				echo $sql;
			}
			else 
			{
				$classVars = get_class_vars(get_class($this));
				$sql .= "Update {$this->table} set ";
				foreach($classVars as $key=>$value)
				{
					if($key == "_id" || $key == "table")
					{
						continue;
					}

					$sql .= "{$key} = '{$this->$key}', ";
				}
				$sql = substr($sql, 0, -2). " where id = {$this->_id}";
			}
		}
		elseif($task == 'load')
		{
			$sql = "select * from {$this->table} where id = '{$this->_id}'";
		}
		return $sql;
	}
}
	


?>