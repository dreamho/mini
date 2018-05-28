<?php

namespace App\api;

use App\controller\Validator;
use App\core\Controller;
use App\model\Model;
use App\model\Song;
use App\Transformer\SongTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\Translation\Exception\InvalidResourceException;

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
        return $this->response()->collection($songs, new SongTransformer());
        //return new JsonResponse($songs, 200);
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
        if (count($errors) > 0) {
            return new JsonResponse($errors);
        }

        try {
            $model = new Song;
            $model->artist = $request->artist;
            $model->track = $request->track;
            $model->link = $request->link;
            $model->save();
            $song = Song::find($model->id);
            $message = "Saved";
            return $this->response()->item($song, new SongTransformer(), $message);
            //return new JsonResponse("Song has been saved successfully");
        } catch (\Exception $exception) {
            // throw new InvalidResourceException($exception->getMessage(), $exception->getCode());
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
        if (isset($id)) {
            Song::destroy($id);
            $data = "Song has been deleted successfully.";
            return new JsonResponse($data);

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
            return $this->response()->item($song, new SongTransformer());
        }
        //return new JsonResponse($song);
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
            return new JsonResponse($errors);
        }

        try {
            $model = Song::find($song->id);
            $model->artist = $song->artist;
            $model->track = $song->track;
            $model->link = $song->link;
            $model->save();
            $song = Song::find($model->id);
            $message = "Updated";
            return $this->response()->item($song, new SongTransformer(), $message);
            //return new JsonResponse("Song has been updated successfully.");
        } catch (\Exception $exception) {
            return new JsonResponse("Something goes wrong");
        }
    }
}