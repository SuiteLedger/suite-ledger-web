<?php

class UserRoleController extends Controller
{

    public function index()
    {
        $this->list();
    }

    public function add() {
        $this->manageUserRole();
    }

    public function edit($id= '') {
        $this->manageUserRole($id);
    }

    public function delete($id) {
        try {
            $userRole = new UserRole();
            $userRole->update($id, ['status' => STATUS_DELETED]);
            setPageMessage(MESSAGE_TYPE_SUCCESS, "Role deleted successfully!");
        } catch (Exception $e) {
            setPageMessage(MESSAGE_TYPE_ERROR, "Failed to delete the role. Please try again!");
        }

    }

    public function manageUserRole($id= '')
    {
        $editRole = false;
        $data['pageTitle'] = "Add User Role";
        $data['pageUrl'] = PAGE_URL_ADD_USER_ROLE;
        $data['userTypes'] = getUserTypes();
        $userPermission = new UserPermission();
        $data['permissions'] = $userPermission->selectAll([
            "entity_only" => 1
        ]);

        if(!empty($id)) {
            if (!is_numeric($id)) {
                $this->notFound();
                die;
            }

            $editRole = true;
            $data['pageTitle'] = "Edit User Role";
            $data['pageUrl'] = PAGE_URL_EDIT_USER_ROLE . "/" . $id;
        }

        $userRole = new UserRole();
        $rolePermissionModel = new RolePermissionModel();

        if($_SERVER['REQUEST_METHOD'] == 'GET') {
            if($editRole) {

                $userRoleToEdit = $userRole->selectOne(["id"=>$id]);

                if(!$userRoleToEdit) {
                    $this->notFound();
                    die;
                }

                foreach ($userRoleToEdit as $key => $value) {
                    $_POST[$key] = $value;
                }

                $userPermissionsToEdit = $rolePermissionModel->selectAll(["role" => $id]);

                $selectedPermissions = [];
                foreach ($userPermissionsToEdit as $userPermission) {
                    $selectedPermissions[] = $userPermission->permission;
                }
                $_POST['permissions'] = $selectedPermissions;
            }
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($userRole->validate($_POST, $data['permissions'])) {
                $roleId = 0;
                if(!empty($_POST['id'])) {
                    $editRole = true;
                    $roleId = $_POST['id'];
                }


                if($editRole) {
                    $userRole->update($roleId, $_POST);
                    $rolePermissionModel->delete($roleId);
                    $result = $roleId;
                } else {
                    $_POST['status'] = STATUS_ACTIVE;
                    $result = $userRole->insert($_POST);
                }

                if ($result && $result > 0) {
                    $rolePermission = new RolePermissionModel();
                    foreach ($_POST['permissions'] as $permission) {
                        $rolePermission->insert([
                            'role' => $result,
                            'permission' => $permission
                        ]);
                    }
                }

                if($editRole) {
                    setPageMessage(MESSAGE_TYPE_SUCCESS,
                        "Role \"" . $_POST['name'] . "\" Updated successfully.");
                } else {
                    setPageMessage(MESSAGE_TYPE_SUCCESS,
                        "Role \"" . $_POST['name'] . "\" Created successfully.");
                    redirect(PAGE_URL_ADD_USER_ROLE);
                }

            }

            $data['errors'] = $userRole->errors;

        }

        $this->view('add-user-roles', $data);

    }

    public function list()
    {
        $data['pageTitle'] = "User Roles";
        $userRole = new UserRole();
        $data['userRoles'] = $userRole->selectAll(['status' => STATUS_ACTIVE]);
        $this->view('list-user-roles', $data);
    }

}