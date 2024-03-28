<?php

class LogOutController extends Controller
{

    public function index()
    {
//        session_unset();
//        session_destroy();
        Authentication::logout();
        redirect(PAGE_URL_LOGIN);
    }

}
