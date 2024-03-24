<?php

class ApartmentComplexController extends Controller
{

    public function index()
    {
        $this->view('list-apartment-complex');
    }

    public function add()
    {
        $this->view('add-apartment-complex');
    }

    public function list()
    {
        $this->view('list-apartment-complex');
    }

}
