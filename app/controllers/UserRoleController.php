<?php

class UserRoleController extends Controller
{

    public function index()
    {
        $this->view('list-user-roles');
    }

    public function add()
    {
        $data['pageTitle'] = "Add User Role";

        $userPermission = new UserPermission();
        $data['userTypes'] = getUserTypes();
        $data['permissions'] = $userPermission->selectAll([
            "entity_only" => 1
        ]);

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $userRole = new UserRole();
            if($userRole->validate($_POST, $data['permissions'])) {
                $result = $userRole->insert($_POST);

                if($result && $result > 0) {
                    $rolePermission = new RolePermissionModel();
                    foreach ($_POST['permissions'] as $permission) {
                        $rolePermission->insert([
                            'role' => $result,
                            'permission' => $permission
                        ]);
                    }
                }

                setPageMessage(MESSAGE_TYPE_SUCCESS,
                    "Roe \"" . $_POST['name'] . "\" Created successfully.");
                redirect(PAGE_URL_ADD_USER_ROLE);
            }

            $data['errors'] = $userRole->errors;

        }

        $this->view('add-user-roles', $data);

    }

    public function list()
    {
        $this->view('list-user-roles');
    }

}
