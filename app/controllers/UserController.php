<?php

class UserController extends Controller
{
    public function index()
    {
        $this->notFound();
    }

    public function add($apartmentComplexId='') {

        $data['pageTitle'] = "Add Entity User";
        $clientUser = false;

        if (!empty($apartmentComplexId) && !is_numeric($apartmentComplexId)) {
            $this->notFound();
        }

        if(isClientUser()) {
            $data['pageTitle'] = "Add User";
            $clientUser = true;
            $apartmentComplexId = getLoggedInUser()->apartment_complex;
        }

        $data['pageUrl'] = PAGE_URL_ADD_USER . "/" . $apartmentComplexId;

        if($clientUser) {
            $apartmentComplexModel = new ApartmentComplex();
            $apartmentComplex = $apartmentComplexModel->selectOne(['id' => $apartmentComplexId]);
            $data['apartmentComplex'] = $apartmentComplex;
            $data['pageTitle'] = "Add User | " . $apartmentComplex->name;
        }

        $userRole = new UserRole();
        $data['userRoles'] = $userRole->selectAll([
            "status" => STATUS_ACTIVE,
            "user_type" => $clientUser ? USER_TYPE_CLIENT : USER_TYPE_ENTITY
        ]);

        $data['clientUser'] = $clientUser;

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user = new User();
            if ($user->validate($_POST)) {
                if($clientUser) {
                    $_POST['user_type'] = USER_TYPE_CLIENT;
                } else {
                    $_POST['user_type'] = USER_TYPE_ENTITY;
                }

                $_POST['password'] = password_hash($_POST['password'], PASSWORD_BCRYPT);

                $result = $user->insert($_POST);
                $_POST['create_date'] = date("Y=m-d H:i:s");

                setPageMessage(MESSAGE_TYPE_SUCCESS,
                    "User \"" . $_POST['full_name'] . "\" Created successfully.");
                redirect(PAGE_URL_ADD_USER);

            }

        }

        $data['errors'] = $user->errors;

        $this->view('add-user', $data);

    }

    public function edit($id= '') {
        $this->manageUser($id);
    }

    public function list($apartmentComplexId='')
    {
        $data['pageTitle'] = "Users";

        $clientUser = false;
        if(!empty($apartmentComplexId)) {
            $clientUser = true;

            if (!is_numeric($apartmentComplexId)) {
                $this->notFound();
            }
        } else {
            $data['pageTitle'] = "List Entity User";
        }

        $user = new User();
        if($clientUser) {
            $data['users'] = $user->selectAll(['user_type' => USER_TYPE_CLIENT,
                'apartment_complex' => $apartmentComplexId]);
        } else {
            $data['users'] = $user->selectAll(['user_type' => USER_TYPE_ENTITY]);
        }

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
                    $_POST['updated_date'] = getCurrentDateTime();
                    $user->update($itemId, $_POST);
                    $result = $itemId;
                } else {
                    $result = $user->insert($_POST);
                    $_POST['create_date'] = getCurrentDateTime();
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