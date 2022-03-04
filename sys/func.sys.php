<?php
function RandCaract($length, $a)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    if($a == "_number_")
        $characters = '0123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}


function raiduct($chaine, $lg_max, $delim='[...]') {
  	if (strlen($chaine) > $lg_max)
    {
	    $chaine = substr($chaine, 0, $lg_max);
	    $last_space = strrpos($chaine, " ");
	    $chaine = substr($chaine, 0, $last_space).$delim;
	    return $chaine;
    }

    return $chaine;
}

function upDate($data)
{
    //original date is in format YYYY-mm-dd
    $timestamp = strtotime($data); 
    return date("D. d M., Y", $timestamp );
}