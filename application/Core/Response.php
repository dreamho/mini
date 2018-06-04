<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 28.5.18.
 * Time: 09.38
 */

namespace App\Core;

/**
 * Class Response
 * @package App\Core
 */
class Response
{
    /**
     * Returns data in json format
     * @param $data
     * @return string
     */
    public function returnJson($data)
    {
        header("Content-type: application/json");
        return json_encode($data);
    }

    /**
     * Defines model that would be transformed through Transformer class and returned in json format
     * @param $model
     * @param $transformer
     * @param null $message
     * @return string
     */
    public function item($model, $transformer, $message = null)
    {
        return $this->returnJson([
            'data' => $transformer->transformer($model),
            'message' => $message
        ]);

    }

    /**
     * Defines collection of models that would be transformed through Transformer class and returned in json format
     * @param $models
     * @param $transformer
     * @param null $message
     * @return string
     */
    public function collection($models, $transformer, $message = null)
    {
        $data = [];
        foreach ($models as $model) {
            $data[] = $transformer->transformer($model);
        }
        return $this->returnJson([
            'data' => $data
        ]);
    }

}