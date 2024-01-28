<?php
require_once("DBManagerException.php");
class DBManager {
	private $aConnection;
		
	/**
	 * 
	 * Creates an instance of the object
	 * @param String $aHost DB host name
	 * @param String $aUser DB user name
	 * @param String $aPass DB user password
	 * @param String $aDb DB name (schema name)
	 */
	public function __construct($aHost,$aUser,$aPass,$aDb) {
		$this->aConnection = mysql_pconnect($aHost,$aUser,$aPass);
		if (!$this->aConnection) {
			throw new DBManagerException("Failed to connect to database host");
		}				
		mysql_select_db($aDb,$this->aConnection);
	}	
	
	/**
	 * Executes a query to database
	 * @param $aSql Query string
	 * @return Rows returned from query, if any
	 */
	public function execute($aSql) {
		if (($aResult = mysql_query($aSql,$this->aConnection))===false) {
			throw new DBManagerException("Database operation error");
		}
		
		$aRows = array();
		// For INSERT and UPDATE mysql_query returnr true
		if ($aResult!==true) {
			while ($aRow = mysql_fetch_assoc($aResult)) {
				$aRows[] = $aRow;
			}
			mysql_free_result($aResult);			
		}
		return $aRows;		
	}
	
}
?>