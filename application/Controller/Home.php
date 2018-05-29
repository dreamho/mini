<?php
namespace App\Controller;
use App\Core\Controller;
/**
 * Class Home
 *
 */
class Home extends Controller
{
    /**
     *
     * Home page
     */
    public function index()
    {

        $this->view('home/index');
    }

    /**
     * Exampleone page
     */
    public function exampleOne()
    {
        $this->view('home/example_one');
    }

    /**
     * Exampletwo page
     */
    public function exampleTwo()
    {
        $this->view('home/example_two');
    }
}
