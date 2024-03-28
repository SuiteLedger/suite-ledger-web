<?php

class UserRoleController extends Controller
{

    public function index()
    {
        $this->view('list-user-roles');
    }

    public function add()
    {
        $this->view('add-user-roles');
    }

    public function list()
    {
        $this->view('list-user-roles');
    }

}
