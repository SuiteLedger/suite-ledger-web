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
        'message' => $message
    ];
}

function getPageMessage($deletePageMessage = false) {
    $pageMessage = false;
    if(isset($_SESSION['pageMessage'])) {
        $pageMessage = $_SESSION['pageMessage'];
        if($deletePageMessage) {
            unset($pageMessage);
        }
    }
    return $pageMessage;
}
