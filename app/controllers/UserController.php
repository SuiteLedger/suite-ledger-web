<?php

class UserController extends Controller
{

    public function index()
    {
        $this->view('list-user');
    }

    public function add()
    {
        $this->view('add-user');
    }

    public function list()
    {
        $this->view('list-user');
    }

}
