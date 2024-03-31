<?php

class ApartmentComplex extends Model {

    public $errors = [];
    protected $table = "apartment_complex";
    protected $allowedColumns = [
        'name',
        'address',
        'contact_person',
        'contact_number',
        'email',
        'no_of_buildings',
        'no_of_units',
        'status'
        ];

    public function validate($data, $editItem) {

        $this->errors = [];

        if(empty($data["no_of_units"])) {
            $this->errors['full_name'] = "Name is required";
        }

        if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $this->errors['email'] = "Please enter a valid email.";
        }

        if(empty($this->errors)) {
            return true;
        }

        return false;

    }
}
