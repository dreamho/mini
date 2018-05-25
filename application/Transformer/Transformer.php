<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 25.5.18.
 * Time: 14.43
 */

namespace App\Transformer;

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
    function transformer($data)
    {
        return new JsonResponse($data);
    }
}