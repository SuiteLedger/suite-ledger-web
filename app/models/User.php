<?php

class User extends Model {

    public $errors = [];
    protected $table = "user";
    protected $allowedColumns = [
        'full_name',
        'email',
        'password'
        ];

    public function validate($data) {

        $this->errors = [];

        if(empty($data["full_name"])) {
            $this->errors['full_name'] = "Name is required";
        }

        if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $this->errors['email'] = "Please enter a valid email.";
        } else if ($this->selectOne(['email' => $data['email']]) ) {
            $this->errors['email'] = "Email already exists.";
        }

        if(empty($this->errors)) {
            return true;
        }

        return false;

    }
}
