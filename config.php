<?php 
spl_autoload_register();
define("_ROOT_", __DIR__);
define('BASE_URL', 'http://localhost/ECF/');

define('INDEX', BASE_URL);
define('CSS_PATH', BASE_URL. 'asset/');
define('TEMPLATES_PATH', BASE_URL. 'templates/');

function generateLink($path)
{
    return BASE_URL . $path;
}

