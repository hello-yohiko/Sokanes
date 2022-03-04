<?php
$GLOBALS['PAGER']->upMetaTITLE("page de plugin");
$GLOBALS['PAGER']->upMetaSUBTITLE("tes con");

$getSYS = $GLOBALS['ROOTER']->pageGET;


include_once "plug/plug.forum.php";


/* tempory script UI/UX */
/*
 */

/* END tempory script UI/UX */



/* temporay script */
function plug_header_()
{
	global $GLOBALS;
	
	include_once dirname(__FILE__) . "/../".DIR_TEMPS._TEMPLATE_."/plug/header.php";
}

function plug_footer_()
{
	global $GLOBALS;
	
	include_once dirname(__FILE__) . "/../".DIR_TEMPS._TEMPLATE_."/plug/footer.php";
}




function getThreadFeeds(string $str)
{
	global $GLOBALS;

	if(!$a = $GLOBALS['SQL']->_getPrepare(
		"SELECT * FROM plug_thread WHERE th_name = ?",
		"s",
		[$str]
	))
	{
		die("ddd");
	}

	if(count($a['data']) <= 0)
		return false;

	if(!$op = json_decode(htmlspecialchars_decode($a['data'][0]['th_content']), true))
		return false;

	$a['data'][0]['th_content'] = $op;

	return $a['data'][0];
}
?>