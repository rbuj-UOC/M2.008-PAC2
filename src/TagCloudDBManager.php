<?
class TagCloudDBManager extends DBManager {
	
	const DB_HOST = '';
	const DB_NAME = '';
	const DB_USER = '';
	const DB_PASS = '';
	
	public function __construct() {
		parent::__construct(self::DB_HOST,self::DB_USER,self::DB_PASS,self::DB_NAME);
	}
}
?>