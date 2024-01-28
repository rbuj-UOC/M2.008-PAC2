<?
class TagCloudDBManager extends DBManager {
	
	const DB_HOST = 'localhost';
	const DB_NAME = 'tagcloud';
	const DB_USER = 'tagcloud';
	const DB_PASS = 'tagcloud';
	
	public function __construct() {
		parent::__construct(self::DB_HOST,self::DB_USER,self::DB_PASS,self::DB_NAME);
	}
}
?>