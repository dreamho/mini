<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 25.5.18.
 * Time: 14.44
 */

namespace App\Transformer;
use Illuminate\Database\Eloquent\Model;

interface TransformerInterface
{
    function transformer(Model $model);
}