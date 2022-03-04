<?php
include_once "header.php";

$uri_get = "profil";
if(isset($_GET['uri_get']) && $_GET['uri_get'] != "")
	$uri_get = $_GET['uri_get'];

$READ_URL_TAB = explode("/", $uri_get);

include_once "get.header.php"; // TMP
include_once "get.{$READ_URL_TAB[0]}.php"; // TMP
include_once "get.footer.php"; // TMP