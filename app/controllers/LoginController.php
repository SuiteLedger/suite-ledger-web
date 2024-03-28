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

            if($row && $row->password === $_POST['password']) {
                $_SESSION['LOGGED_IN_USER'] = $row;
                redirect(PAGE_URL_DASHBOARD);

            }

            setPageMessage(MESSAGE_TYPE_ERROR, "Invalid email or password!");

        }


        $this->view('login', $data);
    }

}
