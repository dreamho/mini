<?php
use App\Core\Route;

/**
 * MINI - an extremely simple naked PHP application
 *
 * @package mini
 * @author Panique
 * @link https://github.com/panique/mini/
 * @license http://opensource.org/licenses/MIT MIT License
 */


// set a constant that holds the project's folder path, like "/var/www/".
define('ROOT', dirname(__DIR__) . DIRECTORY_SEPARATOR);
// set a constant that holds the project's "application" folder, like "/var/www/application".
define('APP', ROOT . 'application' . DIRECTORY_SEPARATOR);

if (file_exists(ROOT . 'vendor/autoload.php')) {
    require ROOT . 'vendor/autoload.php';
}

require ROOT . 'config/config.php';

Route::set();
