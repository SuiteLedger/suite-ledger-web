<?php

class EmailNotification extends Model {

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

        if(empty($this->errors)) {
            return true;
        }

        return false;

    }
}
