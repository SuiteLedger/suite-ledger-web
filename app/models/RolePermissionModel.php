<?php

class RolePermissionModel extends Model {

    public $errors = [];
    protected $table = "role_permission";
    protected $allowedColumns = [
        'role',
        'permission',
        ];

    public function delete($id) {
        $query = "DELETE FROM " . $this->table . " WHERE role=:id";
        $this->query($query, ['id'=>$id]);
        return true;
    }


}
