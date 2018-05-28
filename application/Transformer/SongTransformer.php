<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 25.5.18.
 * Time: 14.45
 */

namespace App\Transformer;

use App\Transformer\Transformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\Eloquent\Model;
use App\model\Song;

class SongTransformer extends Transformer
{
    function transformer(Model $song)
    {
        return [
            'id' => $song->id,
            'artist' => $song->artist,
            'track' => $song->track,
            'link' => $song->link
        ];
    }
}