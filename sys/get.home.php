<?php
function FirstPublication()
{
	global $GLOBALS;
	$a = $GLOBALS['SQL']->PostView();
	for($i=0;$i<2;$i++)
	{
		$b = $a[$i];
	}
	return 0;
}

// FirstPublication();
include_once dirname(__FILE__) . "/../".DIR_TEMPS._TEMPLATE_."/home.php";
?>