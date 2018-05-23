<?php
namespace App\controller;
use JeffOchoa\ValidatorFactory;

class Validator {

    /**
     * @var ValidatorFactory
     */
    private $factory;
    public $validator;
//    public function __construct($data, $rules){
//        $this->validator = new \JeffOchoa\ValidatorFactory();
//        return $this->validator->make($data, $rules);
//    }
//    public function checkUser($data, $rules){
//        $this->factory = new ValidatorFactory();
//
//        return $this->validator = $this->factory->make($data = [], $rules);
//    }
    public function check($data, $rules){
        $this->validator = new \JeffOchoa\ValidatorFactory();
        return $this->validator->make($data, $rules);
    }
}