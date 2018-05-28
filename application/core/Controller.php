<?php
namespace App\core;
use PDO;
//use App\model\Model;
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
    function __construct()
    {
        $this->blade = new Blade(ROOT.'application/view/', ROOT.'application/cache');
    }

    /**
     * Including a view and passing data with blade
     * @param $view
     * @param null $parameters
     */
    public function view($view, $parameters = null)
    {
        if($parameters){
            echo $this->blade->make($view, $parameters);
        }else{
            echo $this->blade->make($view);
        }
    }
    public function response(){
        $response = $this->item = new Response();
        $response = $this->collection = new Response();
        return $response;
    }

}
