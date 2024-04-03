<?php

class UserRole extends Model {

    public $errors = [];
    protected $table = "role";
    protected $allowedColumns = [
        'user_type',
        'name',
        'description',
        'status'
    ];

    public function validate($data, $userPermissions) {

        $this->errors = [];

        if(empty($data['name']) || strlen($data['name']) < 1) {
            $this->errors['name'] = "Please enter a valid name for the role.";
        }

        if(empty($this->errors)) {
            return true;
        }

        return false;

    }
}