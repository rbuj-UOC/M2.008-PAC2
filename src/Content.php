<?
class Content {
	private $TITLE;
	private $ABSTRACT;
	private $BODY;
	private $LABELS;
	
	public function __construct() {
		
	}
	
	public function setVars($aVars) {
		// TODO: update object attributes with $aVars
	}
	
	public function getLabels() {
		return $this->LABELS;
	}
	
	public static function getContents() {
		// TODO: get content data from database
		$aContents = array();
		foreach ($aResults as $aRes) {
			$aContent = new Content();
			$aContent->setVars($aRes);
			$aContents[] = $aContent;
		}
		return $aContents;
	}
	
	public static function getTags() {
		// TODO: get content tags from contents in database
		return $aLabels;
	}
}
?>
