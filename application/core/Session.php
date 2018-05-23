<?php
namespace App\core;
class Session {
    public static function set($k, $v){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION[$k] = $v;
    }
    public static function get($k, $default=null){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(!isset($_SESSION[$k])){
            return null;
        }
        return $_SESSION[$k];
    }
    public static function destroy($k){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        unset($_SESSION[$k]);
    }
}