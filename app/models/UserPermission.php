<?php

class UserPermission extends Model {

    public $errors = [];
    protected $table = "permission";
    protected $allowedColumns = [
        'permission',
        'name',
        'description'
        ];




}
