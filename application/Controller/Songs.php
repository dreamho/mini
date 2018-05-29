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

        $this->view('songs/index', ['amount_of_songs'=>$amount_of_songs, 'songs'=>$songs, 'name' => $name, 'status' => $status]);

    }

//    /**
//     * ACTION: addSong
//     * This method handles what happens when you move to http://yourproject/songs/addsong
//     * IMPORTANT: This is not a normal page, it's an ACTION. This is where the "add a song" form on songs/index
//     * directs the user after the form submit. This method handles all the POST data from the form and then redirects
//     * the user back to songs/index via the last line: header(...)
//     * This is an example of how to handle a POST request.
//     */
//    public function addSong()
//    {
//        // if we have POST data to create a new song entry
//        if (isset($_POST["submit_add_song"])) {
//
//            $model = new Song;
//            $model->artist = $_POST["artist"];
//            $model->track = $_POST["track"];
//            $model->link = $_POST["link"];
//            $model->save();
//        }
//        redirect('songs');
//    }
//
//    /**
//     * ACTION: deleteSong
//     * This method handles what happens when you move to http://yourproject/songs/deletesong
//     * IMPORTANT: This is not a normal page, it's an ACTION. This is where the "delete a song" button on songs/index
//     * directs the user after the click. This method handles all the data from the GET request (in the URL!) and then
//     * redirects the user back to songs/index via the last line: header(...)
//     * This is an example of how to handle a GET request.
//     * @param int $song_id Id of the to-delete song
//     */
//    public function deleteSong($song_id)
//    {
//        // if we have an id of a song that should be deleted
//        if (isset($song_id)) {
//            // do deleteSong() in model/model.php
//            //$this->model->deleteSong($song_id);
//
//            //Database::getConnection();
//            Song::destroy($song_id);
//            //Capsule::table('song')->where('id', $song_id)->delete();
//        }
//
//        // where to go after song has been deleted
////        header('location: ' . URL . 'songs/index');
//        redirect('songs');
//    }
//
//     /**
//     * ACTION: editSong
//     * This method handles what happens when you move to http://yourproject/songs/editsong
//     * @param int $song_id Id of the to-edit song
//     */
//    public function editSong($song_id)
//    {
//        // if we have an id of a song that should be edited
//        if (isset($song_id)) {
//
//            //Database::getConnection();
//            $song = Song::find($song_id);
//
//            // load views. within the views we can echo out $song easily
//
//            $this->view('songs/edit', ['song'=>$song]);
////            require APP . 'view/_templates/header.php';
////            require APP . 'view/songs/edit.php';
////            require APP . 'view/_templates/footer.php';
//        } else {
//            // redirect user to songs index page (as we don't have a song_id)
//            //header('location: ' . URL . 'songs/index');
//            redirect('songs/index');
//        }
//    }
//
//    /**
//     * ACTION: updateSong
//     * This method handles what happens when you move to http://yourproject/songs/updatesong
//     * IMPORTANT: This is not a normal page, it's an ACTION. This is where the "update a song" form on songs/edit
//     * directs the user after the form submit. This method handles all the POST data from the form and then redirects
//     * the user back to songs/index via the last line: header(...)
//     * This is an example of how to handle a POST request.
//     */
//    public function updateSong()
//    {
//
//        if (isset($_POST["submit_update_song"])) {
//            // do updateSong() from model/model.php
//            //Database::getConnection();
//            $song = Song::find($_POST['song_id']);
//            $song->artist = $_POST["artist"];
//            $song->track = $_POST["track"];
//            $song->link = $_POST["link"];
//            $song->save();
//
//
//        }
//
//        // where to go after song has been added
//        //header('location: ' . URL . 'songs/index');
//
//        redirect('songs');
//    }
//
//    /**
//     * AJAX-ACTION: ajaxGetStats
//     * TODO documentation
//     */
    public function ajaxGetStats()
    {
        $amount_of_songs = Song::count();

        echo $amount_of_songs;
    }

}