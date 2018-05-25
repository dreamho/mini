<?php

namespace App\model;

use Illuminate\Database\Capsule\Manager as Capsule;

/**
 * Class Database
 * @package App\model
 */
class Database
{
    private static $conn;

    /**
     * return an instance of DB connection
     */
    public static function getConnection()
    {

        if (!self::$conn) {
            $capsule = new Capsule;

            $capsule->addConnection([

                'driver' => 'mysql',
                'host' => '127.0.0.1',
                'database' => 'mini',
                'username' => 'root',
                'password' => 'root',
                'charset' => 'utf8',
                'collation' => 'utf8_unicode_ci',
                'prefix' => ''
            ]);

// Make this Capsule instance available globally via static methods
            // $capsule->setAsGlobal();

// Setup the Eloquent ORM
            self::$conn = $capsule->bootEloquent();
        }

        return self::$conn;

    }
}