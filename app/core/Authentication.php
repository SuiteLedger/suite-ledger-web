<?php

class Authentication
{

    public static function setLoggedInUser($data) {
        $_SESSION['LOGGED_IN_USER'] = $data;
    }

    public static function getLoggedInUser() {
        return $_SESSION['LOGGED_IN_USER'];
    }

    public static function setUserPermissions($userPermissions) {
        return $_SESSION['USER_PERMISSIONS'] = $userPermissions;
    }

    public static function userHasPermission($permission) {
        return in_array($permission, $_SESSION['USER_PERMISSIONS']);
    }

    public static function hasLoggedIn() {
        if(!isset($_SESSION['LOGGED_IN_USER'])){
            redirect(PAGE_URL_LOGIN);
        }
    }

    public static function logout() {
        session_unset();
        session_destroy();
    }

}