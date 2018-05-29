<?php

/**
 * Class Problem
 * Formerly named "Error", but as PHP 7 does not allow Error as class name anymore (as there's a Error class in the
 * PHP core itself) it's now called "Problem"
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
namespace App\Controller;
use App\Core\Controller;

/**
 * Class Problem
 * @package App\controller
 */
class Problem extends Controller
{
    /**
     * Error page if route does not exists
     */
    public function index()
    {
        $this->view('problem/index');
    }
}
