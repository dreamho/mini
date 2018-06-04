<?php

namespace App\Core;

use Jenssegers\Blade\Blade;

/**
 * Class Controller
 * @package App\core
 */
class Controller
{

    /**
     * Whenever controller is created create a new instance of blade".
     */
    public function __construct()
    {
        $this->blade = new Blade(ROOT . 'view/', ROOT . 'view/cache');
        $this->response = new Response();
    }

    /**
     * Including a view and passing data with blade
     * @param $view
     * @param null $parameters
     */
    public function view($view, $parameters = null)
    {
        if ($parameters) {
            echo $this->blade->make($view, $parameters);
        } else {
            echo $this->blade->make($view);
        }
    }

}
