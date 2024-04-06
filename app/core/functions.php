<?php

function show($stuff)
{
    echo "<pre>";
    print_r($stuff);
    echo "</pre>";
}

function redirect($link)
{
    header("Location: " . ROOT_DIRECTORY . $link);
    die;
}

function setPageMessage($messageType, $message)
{
    $_SESSION['pageMessage'] = [
        'messageType' => $messageType,
        'message' => $message,
        'cssClass' => getToastMessageCssClass($messageType)
    ];
}

function getPageMessage($deletePageMessage = false)
{
    $pageMessage = false;
    if (isset($_SESSION['pageMessage'])) {
        $pageMessage = $_SESSION['pageMessage'];
        if ($deletePageMessage) {
            unset($_SESSION['pageMessage']);
        }
    }
    return $pageMessage;
}

function getToastMessageCssClass($messageType)
{
    switch ($messageType) {
        case MESSAGE_TYPE_SUCCESS :
            return 'success';
        case MESSAGE_TYPE_ERROR:
            return 'danger';
        default:
            return 'info';
    }
}

function getLoggedInUser()
{
    return Authentication::getLoggedInUser();
}

function isClientUser() {
    return Authentication::getLoggedInUser()->user_type == USER_TYPE_CLIENT;
}

function isEntityUser() {
    return Authentication::getLoggedInUser()->user_type == USER_TYPE_ENTITY;
}

function getCurrentDate() {
    date_default_timezone_set('Asia/Colombo');
    return date('Y-m-d');
}

function getCurrentDateTime() {
    date_default_timezone_set('Asia/Colombo');
    return date('Y-m-d H:i:s');
}

function isValidDateFormat($date) {

    if (preg_match(REGEX_DATE, $date, $matches)) {
        $year = (int)$matches[1];
        $month = (int)$matches[2];
        $day = (int)$matches[3];

        if (checkdate($month, $day, $year)) {
            return true;
        }
    }

    return false;

}