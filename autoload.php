<?php
/**
 * Created by PhpStorm.
 * User: Эрлан
 * Date: 18.07.2016
 * Time: 16:24
 */

set_include_path(__DIR__);

define("PROJECT_PATH", __DIR__);
define("CONTROLLERS_PATH", PROJECT_PATH.'/Controller/');
define('URL_PREFIX', '/Toolpar');

//Assets
define("IMAGES_PATH", URL_PREFIX.'/Public/IMAGES');
define('STYLE_PATH', URL_PREFIX.'/Public/CSS/style.css');
define('BOOTSTRAP_CSS_PATH', URL_PREFIX.'/Public/CSS/bootstrap.css');
define('FAVICON_PATH', URL_PREFIX.'/Public/IMAGES/favicon.ico');
define('JQUERY_PATH', URL_PREFIX.'/Public/JS/jquery-3.1.0.min.js');
define('BOOTSTRAP_JS_PATH', URL_PREFIX.'/Public/JS/bootstrap.js');

require_once(PROJECT_PATH.'/Defines/Defines.php');
require_once(PROJECT_PATH.'/Database/Database.php');
require_once(PROJECT_PATH.'/Lib/Routing.php');
require_once(PROJECT_PATH.'/Lib/ErrorHandler.php');
require_once(PROJECT_PATH.'/Lib/View.php');


$rout = Routing::getInstance();

echo $rout->proccessRoute();