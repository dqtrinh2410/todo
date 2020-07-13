<?php

namespace AHT\Webroot;

use AHT\Dispatcher;

define('WEBROOT', str_replace("Webroot/index.php", "", $_SERVER["SCRIPT_NAME"]));
define('ROOT', str_replace("Webroot/index.php", "", $_SERVER["SCRIPT_FILENAME"]));

require('../vendor/autoload.php');
require(ROOT . 'Config/core.php');

require(ROOT . 'router.php');
require(ROOT . 'request.php');
$dispatch = new Dispatcher();
$dispatch->dispatch();

?>