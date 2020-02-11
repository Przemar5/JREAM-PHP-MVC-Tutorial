<?php


require_once 'config/paths.php';
require_once 'config/database.php';
require_once 'config/constants.php';

function __autoload($class) {
	require_once LIBS . $class . '.php';
}

//require_once 'libs/Bootstrap.php';
//require_once 'libs/Controller.php';
//require_once 'libs/Model.php';
//require_once 'libs/View.php';
//
//require_once 'libs/Database.php';
//require_once 'libs/Session.php';
//require_once 'libs/Hash.php';



$app = new Bootstrap();