<?php
include('header.php');
if(isset($_COOKIE['user_ID_to_connect']))
{
	setcookie("user_ID_to_connect", "NaN", time() + 0, "/", USE_COOK, false, true);
	echo "attente de redirection...";
	echo '<script language="Javascript">document.location.replace("/");</script>';
}
?>