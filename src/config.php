<?php
function myAutoLoader($aClassName)
{
  include_once $aClassName . ".php";
}

spl_autoload_register('myAutoLoader');
