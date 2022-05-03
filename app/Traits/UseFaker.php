<?php

namespace App\Traits;

use Exception;
use Faker\Factory;

trait UseFaker {
    protected static $static_faker;
    protected $faker;

    private static function static_faker(){
        if (self::$static_faker){
            return self::$static_faker;
        }
        self::$static_faker = Factory::create();
        return self::$static_faker;
    }

    public static function __callStatic($method, $args){
        if ($method === 'faker'){
            return self::static_faker();
        }
        throw new Exception('Unkown method called');
    }

    public function __call($method, $args){
        if ($method === 'faker'){
            return $this->non_static_faker();
        }
        throw new Exception('Unkown method called');
    }

    private function non_static_faker(){
        if ($this->faker){
            return $this->faker;
        }
        $this->faker = Factory::create();
        return $this->faker;
    }
}
