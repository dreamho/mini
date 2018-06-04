<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 4.6.18.
 * Time: 15.06
 */

namespace App\Requests;

/**
 * Class SongRequest
 * @package App\Requests
 */
class SongRequest
{
    public $rules = [
            'artist' => 'required',
            'track' => 'required',
            'link' => 'required',
        ];
    public $data = [];
    public function __construct()
    {
      $this->validator = new \JeffOchoa\ValidatorFactory();
    }

    /**
     * Data Validation
     * @param $request
     * @return mixed
     */
    public function check($request){
        $this->data = [
            'artist' => $request->artist,
            'track' => $request->track,
            'link' => $request->link
        ];
        return $this->validator->make($this->data, $this->rules);
    }
}