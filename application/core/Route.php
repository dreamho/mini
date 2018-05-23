<?php
namespace App\core;
use Illuminate\Routing\Router;
use Illuminate\Events\Dispatcher;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Route {
    public static function set(){
        $dispatcher = new Dispatcher;
        $router = new Router($dispatcher);

        // Home Controller Routes
        try {
            $router->get('/', 'App\controller\Home@index');
            $router->get('home', 'App\controller\Home@index');
            $router->get('home/exampleone', 'App\controller\Home@exampleone');
            $router->get('home/exampletwo', 'App\controller\Home@exampletwo');

            // Problem Controller Routes
            $router->get('problem', 'App\controller\Problem@index');

            // Songs Controller Routes
            $router->get('songs', 'App\controller\Songs@index');
            $router->get('songs/editsong/{song_id}', 'App\controller\Songs@editSong');
            $router->post('songs/updatesong/', 'App\controller\Songs@updateSong');
            $router->post('songs/addsong/', 'App\controller\Songs@addSong');
            $router->get('songs/deletesong/{song_id}', 'App\controller\Songs@deleteSong');
            $router->get('songs/ajaxGetStats', 'App\controller\Songs@ajaxGetStats');

            // Auth Controller Routes
            $router->get('auth/registerform', 'App\controller\Auth@registerForm');
            $router->post('auth/register', 'App\controller\Auth@register');
            $router->get('auth/loginform', 'App\controller\Auth@loginForm');
            $router->post('auth/login', 'App\controller\Auth@login');
            $router->get('auth/logout', 'App\controller\Auth@logout');

            // Api Controller Routes
            $router->get('api/getsongs', 'App\api\Songsapi@getSongs');

            $request = Request::createFromGlobals();
            $response = $router->dispatch($request);
            $response->send();

        } catch(\Exception $e){
           //echo $e->getMessage();
            redirect('problem');
        }
    }
}