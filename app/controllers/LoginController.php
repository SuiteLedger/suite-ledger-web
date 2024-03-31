<?php

class LoginController extends Controller
{

    public function index()
    {
        $data['pageTitle'] = "Login";
        $user = new User();

        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            $row = $user->selectOne([
                'email' => $_POST['email']
            ]);

            if(password_verify($_POST['password'], $row->password)) {
                unset($row->password);
                Authentication::setLoggedInUser($row);

                $rolePermissionModel = new RolePermissionModel();
                $userPermissionsResult = $rolePermissionModel->selectAll(["role"=>$row->role]);
                $userPermissions = [];
                foreach($userPermissionsResult as $userPermission) {
                    $userPermissions[] = $userPermission->permission;
                }
                Authentication::setUserPermissions($userPermissions);

                redirect(PAGE_URL_DASHBOARD);
                die;
            }

            setPageMessage(MESSAGE_TYPE_ERROR, "Invalid email or password!");

        }

        $this->view('login', $data);
    }

}