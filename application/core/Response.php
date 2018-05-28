<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 28.5.18.
 * Time: 09.38
 */

namespace App\core;


class Response
{
    public function returnJson($data)
    {
        header("Content-type: application/json");
        return json_encode($data);
    }

    public function item($model, $transformer, $message = null)
    {
        return $this->returnJson([
            'data' => $transformer->transformer($model),
            'message' => $message
        ]);

    }

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