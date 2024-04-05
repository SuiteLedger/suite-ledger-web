<?php

class UserController extends Controller
{
    public function index()
    {
        $this->list();
    }

    public function add() {
        $this->manageUser();
    }

    public function edit($id= '') {
        $this->manageUser($id);
    }

    public function list()
    {
        $data['pageTitle'] = "Users";
        $user = new User();
        $data['users'] = $user->selectAll();
        $userRole = new UserRole();
        $data['userRoles'] = $userRole->selectAll(['status' => STATUS_ACTIVE]);
        $this->view('list-user', $data);
    }

    public function manageUser($id= '')
    {
        $editItem = false;
        $data['pageTitle'] = "Add User";
        $data['pageUrl'] = PAGE_URL_ADD_USER;
        $data['userTypes'] = getUserTypes();
        $user = new User();
        $userRole = new UserRole();
        $data['userRoles'] = $userRole->selectAll([
            "status" => STATUS_ACTIVE
        ]);

        if(!empty($id)) {
            if (!is_numeric($id)) {
                $this->notFound();
                die;
            }

            $editItem = true;
            $data['pageTitle'] = "Edit User";
            $data['pageUrl'] = PAGE_URL_EDIT_USER . "/" . $id;
        }

        if($_SERVER['REQUEST_METHOD'] == 'GET') {

            if($editItem) {

                $userToEdit = $user->selectOne(["id"=>$id]);
                unset($userToEdit->password);

                if(!$userToEdit) {
                    $this->notFound();
                    die;
                }

                foreach ($userToEdit as $key => $value) {
                    $_POST[$key] = $value;
                }
            }
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $itemId = 0;
            if(!empty($_POST['id'])) {
                $editItem = true;
                $itemId = $_POST['id'];
            }

            if ($user->validate($_POST, $editItem)) {

                if($editItem && empty($_POST['password'])) {
                    unset($_POST['password']);
                } else {
                    $_POST['password'] = password_hash($_POST['password'], PASSWORD_BCRYPT);
                }

                if($editItem) {
                    $_POST['updated_date'] = date("Y=m-d H:i:s");
                    $user->update($itemId, $_POST);
                    $result = $itemId;
                } else {
                    $result = $user->insert($_POST);
                    $_POST['create_date'] = date("Y=m-d H:i:s");
                }

                if($editItem) {
                    setPageMessage(MESSAGE_TYPE_SUCCESS,
                        "User \"" . $_POST['full_name'] . "\" Updated successfully.");
                } else {
                    setPageMessage(MESSAGE_TYPE_SUCCESS,
                        "User \"" . $_POST['full_name'] . "\" Created successfully.");
                    redirect(PAGE_URL_ADD_USER);
                }

            }

        }

        $data['errors'] = $user->errors;

        $this->view('add-user', $data);

    }

}