<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 25.5.18.
 * Time: 14.44
 */

namespace App\Transformer;

use Illuminate\Database\Eloquent\Model;

/**
 * Interface TransformerInterface
 * @package App\Transformer
 */
interface TransformerInterface
{
    public function transformer(Model $model);
}