<?php

class Content
{
  private $TITLE;
  private $ABSTRACT;
  private $BODY;
  private $LABELS;

  public function __construct()
  {
  }

  public function setVars($aVars)
  {
    $this->TITLE = $aVars['TITLE'];
    $this->ABSTRACT = $aVars['ABSTRACT'];
    $this->BODY = $aVars['BODY'];
    $this->LABELS = $aVars['LABELS'];
  }

  public function getLabels()
  {
    return $this->LABELS;
  }

  public static function getContents()
  {
    $aDBMan = new TagCloudDBManager();
    $aSql = "SELECT * FROM CONTENT ORDER BY CREATION_DATE";
    $aResults = $aDBMan->execute($aSql);
    $aContents = array();
    foreach ($aResults as $aRes) {
      $aContent = new Content();
      $aContent->setVars($aRes);
      $aContents[] = $aContent;
    }
    return $aContents;
  }

  public static function getTags()
  {
    $aContents = self::getContents();
    $aLabels = array();
    foreach ($aContents as $aContent) {
      $aLabels = array_merge($aLabels, explode(',', $aContent->getLabels()));
    }
    return $aLabels;
  }
}
