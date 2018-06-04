<?php

/**
 * Class Songs
 * This is a demo class.
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
namespace App\Controller;
use App\Core\Controller;
use App\Core\Session;
use App\Model\Song;

/**
 * Class Songs
 * @package App\controller
 */
class Songs extends Controller
{
    /**
     *
     * Displaying all songs
     */
    public function index()
    {
        $amount_of_songs = Song::count();
        $songs = Song::all();
        $name = Session::get('name');
        $status = Session::get('status');

        echo $this->blade->make('songs/index', ['amount_of_songs'=>$amount_of_songs, 'songs'=>$songs, 'name' => $name, 'status' => $status]);

    }

    /**
     *
     */
    public function ajaxGetStats()
    {
        $amount_of_songs = Song::count();

        echo $amount_of_songs;
    }

}
