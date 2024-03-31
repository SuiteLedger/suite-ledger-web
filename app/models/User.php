<?php

class User extends Model {

    public $errors = [];
    protected $table = "user";
    protected $allowedColumns = [
        'email',
        'password',
        'full_name',
        'role',
        'user_type',
        'apartment_complex',
        'status',
        'created_by',
        'created_date'
    ];

    public function validate($data, $editItem = false) {

        $this->errors = [];

        if(empty($data["full_name"])) {
            $this->errors['full_name'] = "Name is required";
        }

        if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $this->errors['email'] = "Please enter a valid email.";
        }

        if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $this->errors['email'] = "Please enter a valid email.";
        } else {
            $result = $this->selectOne(['email' => $data['email']]);
            if($result) {
                if(!$editItem || $data["id"] != $result->id) {
                    $this->errors['email'] = "Email already exists.";
                }

            }

        }

        if(empty($this->errors)) {
            return true;
        }

        return false;

    }
}