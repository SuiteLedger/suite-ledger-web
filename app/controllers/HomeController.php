<?php

class HomeController extends Controller
{

    public function index()
    {
        $data['var'] = 'text from controller.';
        $this->view('home', $data);
    }

}
