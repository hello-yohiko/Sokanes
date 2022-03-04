<?php
//$GLOBALS['USER']->setSubUser('dddd');

if(isset($_POST['submit']))
{
	if(!empty($_POST['subUser']))
	{
		$str = htmlspecialchars($_POST['subUser']);
		$GLOBALS['USER']->setSubUser($str);
	}
}

include_once "use/html.user_profil.php";