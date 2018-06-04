<?php

namespace App\Controller;

/**
 * Class Validator
 * @package App\controller
 */
class Validator
{
    //public $validator;

    /**
     * Validates data and returns an array of errors
     * @param $data
     * @param $rules
     * @return array
     */
    public function check($data, $rules)
    {
        $this->validator = new \JeffOchoa\ValidatorFactory();
        return $this->validator->make($data, $rules);
    }
}