<?php

class ApartmentUnit extends Model {

    public $errors = [];
    protected $table = "apartment_unit";
    protected $allowedColumns = [
        'apartment_complex',
        'building',
        'floor',
        'unit_no',
        'unit_name',
        'monthly_fee',
        'owner_name',
        'owner_contact_no_1',
        'owner_contact_no_2',
        'owner_email',
        'status',
        'created_by',
        'created_date',
        'updated_by',
        'updated_date'
        ];

    public function validate($data, $editItem) {

        $this->errors = [];

        if(!filter_var($data['owner_email'], FILTER_VALIDATE_EMAIL)) {
            $this->errors['owner_email'] = "Please enter a valid email.";
        }

        if(empty($this->errors)) {
            return true;
        }

        return false;

    }
}
