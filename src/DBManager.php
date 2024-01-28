<?php

require_once "DBManagerException.php";

class DBManager
{
  private $aConnection;

  /**
   *
   * Creates an instance of the object
   * @param String $aHost DB host name
   * @param String $aUser DB user name
   * @param String $aPass DB user password
   * @param String $aDb DB name (schema name)
   */
  public function __construct($aHost, $aUser, $aPass, $aDb)
  {
    try {
      $this->aConnection = mysqli_connect($aHost, $aUser, $aPass, $aDb);
      if (!$this->aConnection) {
        throw new DBManagerException("Failed to connect to database host");
      }
    } catch (mysqli_sql_exception $e) {
      throw new DBManagerException("Failed to connect to database host: " . $e->getMessage());
    }
  }

  /**
   * Executes a query to database
   * @param $aSql Query string
   * @return Rows returned from query, if any
   */
  public function execute($aSql)
  {
    if (($aResult = mysqli_query($this->aConnection, $aSql)) === false) {
      throw new DBManagerException("Database operation error");
    }

    $aRows = array();
    // For INSERT and UPDATE mysql_query return true
    if ($aResult !== true) {
      while ($aRow = mysqli_fetch_assoc($aResult)) {
        $aRows[] = $aRow;
      }
      mysqli_free_result($aResult);
    }
    return $aRows;
  }
}
