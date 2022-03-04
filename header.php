<?php
/*
 *
 *
 *
 *
 */
define("SQL_IP", "127.0.0.1"); // souvnet utilisé sur tout les sites
define("SQL_NAME_DATA", "sokanes_db");
define("SQL_USERNAME", "root");
define("SQL_PASSWORD", "");

define('USE_COOK', "127.0.0.1");

# repertoire
define("DIR_CLASS", "sys/class/class.");
define("DIR_FUNC", "sys/func");

define("DIR_PLUGINS", "use/plug/");
define("DIR_PLUGIN", "use/plug/plug.");

# fichier utilisateur
define("DIR_USE", "use");
define("DIR_TEMPS", "use/template/"); // à pas

define("_TEMPLATE_", "soka"); // nom du themes et dossier

define("__DIRUP__", "/0/");
define("__UPLOAD__", "/0/account/use/files/img/post/");
define("__UND_UPLOAD__", "/log.png");

include_once DIR_CLASS . "sql.php";
include_once DIR_CLASS . "rooter.php";
include_once DIR_CLASS . "pager.php";
include_once DIR_CLASS . "user.php";
include_once DIR_CLASS . "plug.php";

include_once dirname(__FILE__) . "/sys/func.sys.php";

# execute class Data/Base
$GLOBALS['SQL'] = new __sql__(SQL_IP, SQL_NAME_DATA, SQL_USERNAME, SQL_PASSWORD);
$GLOBALS['ROOTER'] = new __root_racine__("uri_get");
$GLOBALS['PAGER'] = new __pager__();
$GLOBALS['USER'] = new __user__();
$GLOBALS['PLUG'] = new __plugin__();
?>
<script>document.write('<script src="http://' + (location.host || '127.0.0.1').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>