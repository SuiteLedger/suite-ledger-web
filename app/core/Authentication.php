<?php

class Authentication
{

    public static function setLoggedInUser($data) {
        $_SESSION['LOGGED_IN_USER'] = $data;
    }

    public static function getLoggedInUser() {
        return $_SESSION['LOGGED_IN_USER'];
    }

    public static function logout() {
        session_unset();
        session_destroy();
    }

}
