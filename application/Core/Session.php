<?php
namespace App\Core;

/**
 * Class Session
 * @package App\core
 */
class Session
{
    /**
     * Starting a session if neccessary and setting  key and value in $_SESSION
     * @param $k - Session key
     * @param $v - Session value
     */
    public static function set($k, $v)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION[$k] = $v;
    }

    /**
     * Starting a session if neccessary and getting a value from $_SESSION
     * @param $k - Session key
     * @param null $default - returns null if key does not exists
     */
    public static function get($k, $default = null)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION[$k])) {
            return $default;
        }
        return $_SESSION[$k];
    }

    /**
     * Starting a session if necessary and deleting a value from $_SESSION
     * @param $k - Session key
     */
    public static function destroy($k)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        unset($_SESSION[$k]);
    }
}