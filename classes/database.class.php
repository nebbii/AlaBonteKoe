<?php 
class Database
{
	private $_host;
	private $_user;
	private $_pass;
	private $_dbName;
	
	private static $_instance;
	
	private $_connection;
	private $_results;
	private $_numRows;
	
	private function __construct()
	{
		
	}
	
	static function getInstance()
	{
		if(!self::$_instance) //als er geen instantie is aangemaakt, moet er een instantie worden aangemaakt. (eigen constructor)
		{
			self::$_instance = new self();
		}
		
		return self::$_instance;	//als er al een instantie van de database classe is aangemaakt, dan wordt deze instantie zelf teruggeven (zodat er maar 1 databaseconnectie is).		
	}
	
	function connect($host, $user, $pass, $dbName)
	{
		$this->_host = $host;
		$this->_user = $user;
		$this->_pass = $pass;
		$this->_dbName = $dbName;
		
		$this->_connection = new mysqli($this->_host, $this->_user, $this->_pass, $this->_dbName);
	} 
	
	public function doQuery($sql)
	{
		$this->_results = mysqli_query($this->_connection, $sql);
	} 
	
	public function loadObjectList()
	{
		$obj = "No Results";
		if ($this->_results)
		{
			$obj = mysqli_fetch_assoc($this->_results);
		}
		return $obj;
	}
}

?>