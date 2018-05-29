<?php
use App\Core\Application;
use App\Controller\Home;
use App\Core\Route;
use App\Controller\Validator;
/**
 * MINI - an extremely simple naked PHP application
 *
 * @package mini
 * @author Panique
 * @link https://github.com/panique/mini/
 * @license http://opensource.org/licenses/MIT MIT License
 */

// TODO get rid of this and work with namespaces + composer's autoloader

// set a constant that holds the project's folder path, like "/var/www/".
// DIRECTORY_SEPARATOR adds a slash to the end of the path
define('ROOT', dirname(__DIR__) . DIRECTORY_SEPARATOR);
// set a constant that holds the project's "application" folder, like "/var/www/application".
define('APP', ROOT . 'application' . DIRECTORY_SEPARATOR);
//echo ROOT . "<br>";
//echo APP . "<br>";
//echo dirname(__DIR__);
// This is the (totally optional) auto-loader for Composer-dependencies (to load tools into your project).
// If you have no idea what this means: Don't worry, you don't need it, simply leave it like it is.
if (file_exists(ROOT . 'vendor/autoload.php')) {
    require ROOT . 'vendor/autoload.php';
}

//spl_autoload_register(function ($class) {
//
//    // project-specific namespace prefix
//    $prefix = 'App\\';
//
//    // base directory for the namespace prefix
//    $base_dir = APP;
//
//    // does the class use the namespace prefix?
//    $len = strlen($prefix);
//    if (strncmp($prefix, $class, $len) !== 0) {
//        // no, move to the next registered autoloader
//        return;
//    }
//
//    // get the relative class name
//    $relative_class = substr($class, $len);
//
//    // replace the namespace prefix with the base directory, replace namespace
//    // separators with directory separators in the relative class name, append
//    // with .php
//    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
//
//    // if the file exists, require it
//    if (file_exists($file)) {
//        require $file;
//    }
//});
// load application config (error reporting etc.)
require ROOT . 'config/config.php';
//echo URL;
//echo ROOT;
// FOR DEVELOPMENT: this loads PDO-debug, a simple function that shows the SQL query (when using PDO).
// If you want to load pdoDebug via Composer, then have a look here: https://github.com/panique/pdo-debug
//require APP . 'libs/helper.php';

// load application class
//require APP . 'core/application.php';
//require APP . 'core/controller.php';



// start the application
//$app = new Application();
Route::set();
