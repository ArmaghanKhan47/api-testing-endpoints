<?php

namespace App\Services;

class FakerServices {

    private $methods = [
        // Person
        'title' => 'title',
        'title_male' => 'titleMale',
        'title_female' => 'titleFemale',
        'name' => 'name',
        'first_name' => 'firstName',
        'first_name_male' => 'firstNameMale',
        'first_name_female' => 'firstNameFemale',
        'last_name' => 'lastName',

        // Address
        'city_prefix' => 'cityPrefix',
        'state' => 'state',
        'city' => 'city',
        'country' => 'country',

        // Phone Number
        'phone_number' => 'phoneNumber',

        // Company
        'company' => 'company',
        'job_title' => 'jobTitle'
    ];

    public function getAvailableFunctions(){
        return $this->methods;
    }
}
