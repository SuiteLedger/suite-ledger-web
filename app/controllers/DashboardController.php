<?php

class DashboardController extends Controller
{

    public function index()
    {
        $data = [];
        $this->view('dashboard', $data);
    }

}
