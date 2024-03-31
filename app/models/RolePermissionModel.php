<?php

class RolePermissionModel extends Model {

    public $errors = [];
    protected $table = "role_permission";
    protected $allowedColumns = [
        'role',
        'permission',
        ];


}
