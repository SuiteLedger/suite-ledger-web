<?php

function show($stuff) {
	echo "<pre>";
	print_r($stuff);
	echo "</pre>";
}

function getInputValue($key) {
    if(!empty($_POST[$key])) {
        return $_POST[$key];
    }
    return '';
}

function redirect($link) {
    header("Location: " . ROOT_DIRECTORY . $link);
    die;
}

function setPageMessage($messageType, $message) {
    $_SESSION['pageMessage'] = [
        'messageType' => $messageType,
        'message' => $message,
        'cssClass' => getToastMessageCssClass($messageType)
    ];
}

function getPageMessage($deletePageMessage = false) {
    $pageMessage = false;
    if(isset($_SESSION['pageMessage'])) {
        $pageMessage = $_SESSION['pageMessage'];
        if($deletePageMessage) {
            unset($_SESSION['pageMessage']);
        }
    }
    return $pageMessage;
}

function getToastMessageCssClass($messageType) {
    switch ($messageType) {
        case MESSAGE_TYPE_SUCCESS :
            return 'success';
        case MESSAGE_TYPE_ERROR:
            return 'danger';
        default:
            return 'info';
    }
}

function getLoggedInUser() {
    return Authentication::getLoggedInUser();
}

function getUserTypes() {
    return array (
        new UserType('ENTITY', "Entity"),
        new UserType('CLIENT', "Client")
    );
}