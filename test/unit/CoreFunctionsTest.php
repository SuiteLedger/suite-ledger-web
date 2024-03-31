<?php

require_once 'app/core/config.php';
require_once 'app/core/functions.php';

use PHPUnit\Framework\Attributes\TestWith;
use \PHPUnit\Framework\TestCase;

class CoreFunctionsTest extends TestCase
{

    #[TestWith([MESSAGE_TYPE_SUCCESS, 'Success message'])]
    #[TestWith([MESSAGE_TYPE_ERROR, 'Error message'])]
    public function test_set_page_message($messageType, $message) {
        setPageMessage($messageType, $message);
        self::assertSame($messageType, $_SESSION['pageMessage']['messageType']);
        self::assertSame($message, $_SESSION['pageMessage']['message']);
    }

    #[TestWith([MESSAGE_TYPE_SUCCESS, 'Success message', 'success'])]
    #[TestWith([MESSAGE_TYPE_ERROR, 'Error message', 'danger'])]
    public function test_get_page_message($messageType, $message, $cssClass) {
        setPageMessage($messageType, $message);
        $pageMessage = getPageMessage();
        self::assertSame($messageType, $pageMessage['messageType']);
        self::assertSame($message, $pageMessage['message']);
        self::assertSame($cssClass, $pageMessage['cssClass']);
    }

}
