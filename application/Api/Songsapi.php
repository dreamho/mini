<?php

namespace App\Api;

use App\Controller\Validator;
use App\Core\Controller;
use App\Model\Song;
use App\Transformer\SongTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;


/**
 * Class Songsapi
 * @package App\api
 */
class Songsapi extends Controller
{
    /**
     * Get all songs
     * @return JsonResponse
     */
    public function getSongs()
    {
        $songs = Song::all();
        return $this->response->collection($songs, new SongTransformer());
    }

    /**
     * Input validation and saving a new song
     * @return JsonResponse
     */
    public function saveSong()
    {
        $request = Request::capture();

        $data = [];
        $data['artist'] = $request->artist;
        $data['track'] = $request->track;
        $data['link'] = $request->link;

        $rules = [
            'artist' => 'required',
            'track' => 'required',
            'link' => 'required',
        ];
        $validator = new Validator();
        $res = $validator->check($data, $rules);
        $errors = $res->errors()->toArray();
        $messages = [];
        if (count($errors) > 0) {
            foreach ($errors as $error) {
                foreach ($error as $value) {
                    $messages[] = $value;
                }
            }
            $errors = ['message'=>$messages];
            return new JsonResponse($errors);
        }

        try {
            $model = new Song;
            $model->artist = $request->artist;
            $model->track = $request->track;
            $model->link = $request->link;
            $model->save();
            $song = Song::find($model->id);
            $message = "Song has been saved successfully";
            return $this->response->item($song, new SongTransformer(), $message);
        } catch (\Exception $exception) {
            return new JsonResponse("Something goes wrong", 400);
        }
    }

    /**
     * Deleting a song by id
     * @param  int $id
     * @return JsonResponse
     */
    public function deleteSong($id)
    {
        if (!is_numeric($id)) {
            return new JsonResponse('Invalid ID');
        }
        try {
            Song::destroy($id);
            $message = "Song has been deleted successfully.";
            return new JsonResponse($message);
        } catch (\Exception $exception) {
            $message = 'Something goes wrong';
            return new JsonResponse($message);
        }
    }

    /**
     * Getting a song by id
     * @param int $id
     * @return JsonResponse
     */
    public function getById($id)
    {
        if (isset($id)) {
            $song = Song::find($id);
            return $this->response->item($song, new SongTransformer());
        }
    }

    /**
     * Input validation and updating a song
     * @return JsonResponse
     */
    public function editSong()
    {
        $song = Request::capture();

        $data = [];
        $data['artist'] = $song->artist;
        $data['track'] = $song->track;
        $data['link'] = $song->link;

        $rules = [
            'artist' => 'required',
            'track' => 'required',
            'link' => 'required',
        ];
        $validator = new Validator();
        $res = $validator->check($data, $rules);
        $errors = $res->errors()->toArray();
        if (count($errors) > 0) {
            foreach ($errors as $error) {
                foreach ($error as $value) {
                    $messages[] = $value;
                }
                $errors = ['message' => $messages];
                return new JsonResponse($errors);
            }
        }
        try {
            $model = Song::find($song->id);
            $model->artist = $song->artist;
            $model->track = $song->track;
            $model->link = $song->link;
            $model->save();
            $song = Song::find($model->id);
            $message = "Song has been updated successfully";
            return $this->response->item($song, new SongTransformer(), $message);
        } catch (\Exception $exception) {
            return new JsonResponse("Something goes wrong");
        }
    }
}