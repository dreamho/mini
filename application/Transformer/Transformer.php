<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 25.5.18.
 * Time: 14.43
 */

namespace App\Transformer;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Transformer
 * @package App\Transformer
 */
abstract class Transformer implements TransformerInterface
{
    /**
     * Transform data from the Model
     * @param Model $model
     */
    public function transformer(Model $model)
    {
    }
}