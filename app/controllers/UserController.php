<?php

class UserController extends Controller
{
    public function index()
    {
        $this->view('list-user');
    }

    public function add() {

        $data['errors'] = [];

        $user = new User();

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            if($user->validate($_POST)) {
                $_POST['created_date'] = date("Y=m-d H:i:s");
                $_POST['password'] = password_hash($_POST['password'], PASSWORD_BCRYPT);
                $user->insert($_POST);
                setPageMessage(MESSAGE_TYPE_SUCCESS,
                    "User account \"" . $_POST['full_name'] . "\" created successfully.");
                redirect(PAGE_URL_ADD_USER);
            } else {
                setPageMessage(MESSAGE_TYPE_ERROR, "Please correct the errors and resubmit.");
            }
        }

        $data['errors'] = $user->errors;
        $data['pageTitle'] = "Add User";

        $this->view('add-user', $data);
    }

    public function list()
    {
        $this->view('list-user');
    }

}
