<?php
# recupérre le foncionnement systèmes
include_once "header.php";

$GLOBALS['ROOTER']->__GETrooter();

function _header_()
{
	global $GLOBALS;
	
	include_once DIR_TEMPS._TEMPLATE_ . '/header.php';
}

function _footer_()
{
	global $GLOBALS;
	
	include_once DIR_TEMPS._TEMPLATE_ . '/footer.php';
}
?>