<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 25.5.18.
 * Time: 14.43
 */

namespace App\Transformer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
/**
 * Class Transformer
 * @package App\Transformer
 */
abstract class Transformer implements TransformerInterface
{
    /**
     *
     * @param $data
     * @return JsonResponse
     */
    function transformer(Model $model)
    {
        //return new JsonResponse(['data' => $data]);
    }
}