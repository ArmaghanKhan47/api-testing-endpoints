<?php

namespace App\Services;

use App\Models\Api;

class RequestMethodValidator {

    public static function validate(Api $api, $method){
        if ($api->method === $method){
            return true;
        }
        return false;
    }
}
