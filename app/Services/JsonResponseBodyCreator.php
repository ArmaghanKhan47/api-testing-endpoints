<?php

namespace App\Services;

use App\Models\Api;
use App\Traits\UseFaker;

class JsonResponseBodyCreator {

    use UseFaker;

    public static function create(Api $api){
        $structure = json_decode($api->structure);
        $body = [];

        foreach($structure as $attr => $function){
            $body[$attr] = self::faker()->$function();
        }
        return $body;
    }
}
