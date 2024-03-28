<?php

class PackageController extends Controller
{

    public function index()
    {
        $this->view('list-packages');

    }

    public function list()
    {
        $this->view('list-packages');

    }

    public function add()
    {
        $this->view('add-package');

    }

}
