<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 25.5.18.
 * Time: 14.45
 */

namespace App\Transformer;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SongTransformer
 * @package App\Transformer
 */
class SongTransformer implements TransformerInterface
{
    /**
     * Transform data from the Model Song in appropriate format
     * @param Model $song
     * @return array
     */
    public function transformer(Model $song)
    {
        return [
            'id' => $song->id,
            'artist' => $song->artist,
            'track' => $song->track,
            'link' => $song->link
        ];
    }
}