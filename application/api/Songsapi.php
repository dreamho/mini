<?php
namespace App\api;
use App\core\Controller;
use App\model\Model;
class Songsapi extends Controller {

    public function getSongs(){
        $songs = Model::all();

        echo json_encode($songs);
        //echo "hello from controller";
        //$this->view('home/example_one');
    }

}