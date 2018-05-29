<?php

namespace App\Core;

use Illuminate\Routing\Router;
use Illuminate\Events\Dispatcher;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class Route
 * @package App\core
 */
class Route
{
    /**
     * Setting routes and redirecting if route does not exists
     */
    public static function set()
    {
        $dispatcher = new Dispatcher;
        $router = new Router($dispatcher);

        try {
            // Home Controller Routes
            $router->get('/', 'App\Controller\Home@index');
            $router->get('home', 'App\Controller\Home@index');
            $router->get('home/exampleone', 'App\Controller\Home@exampleone');
            $router->get('home/exampletwo', 'App\Controller\Home@exampletwo');

            // Problem Controller Routes
            $router->get('problem', 'App\Controller\Problem@index');

            // Songs Controller Routes
            $router->get('songs', 'App\Controller\Songs@index');
            $router->get('songs/editsong/{song_id}', 'App\Controller\Songs@editSong');
            $router->post('songs/updatesong/', 'App\Controller\Songs@updateSong');
            $router->post('songs/addsong/', 'App\Controller\Songs@addSong');
            $router->get('songs/deletesong/{song_id}', 'App\Controller\Songs@deleteSong');
            $router->get('songs/ajaxGetStats', 'App\Controller\Songs@ajaxGetStats');

            // Auth Controller Routes
            $router->get('auth/registerform', 'App\Controller\Auth@registerForm');
            $router->post('auth/register', 'App\Controller\Auth@register');
            $router->get('auth/loginform', 'App\Controller\Auth@loginForm');
            $router->post('auth/login', 'App\Controller\Auth@login');
            $router->get('auth/logout', 'App\Controller\Auth@logout');

            // Api Controller Routes
            $router->get('songsapi/getsongs', 'App\Api\Songsapi@getSongs');
            $router->post('songsapi/savesong', 'App\Api\Songsapi@saveSong');
            $router->get('songsapi/deletesong/{id}', 'App\Api\Songsapi@deleteSong');
            $router->get('songsapi/getbyid/{id}', 'App\Api\Songsapi@getById');
            $router->post('songsapi/editsong', 'App\Api\Songsapi@editSong');

            $request = Request::createFromGlobals();
            $response = $router->dispatch($request);
            $response->send();

        } catch (\Exception $e) {
            $request = $router->getCurrentRequest();
            $router->redirect($request->getRequestUri(), URL . 'problem');
            $response = $router->dispatch($request);
            $response->send();
        }
    }
}