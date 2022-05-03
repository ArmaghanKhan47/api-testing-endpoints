<?php

namespace App\Services;

class FakerServices {

    private $methods = [
        'title' => 'title',
        'title_male' => 'titleMale',
        'title_female' => 'titleFemale',
        'name' => 'name',
        'first_name' => 'firstName',
        'first_name_male' => 'firstNameMale',
        'first_name_female' => 'firstNameFemale',
        'last_name' => 'lastName'
    ];

    public function getAvailableFunctions(){
        return $this->methods;
    }
}
