<?php

class ApartmentUnitController extends Controller
{

    public function index()
    {
        $this->view('list-apartment-units');
    }

    public function add()
    {
        $this->view('add-apartment-unit');
    }

    public function list()
    {
        $this->view('list-apartment-units');
    }

}
