<?php

const APP_NAME = 'SuiteLedger';

// Page URLs
const PAGE_URL_ADD_USER = '/user/add';
const PAGE_URL_DASHBOARD = '/dashboard';
const PAGE_URL_LOGIN = '/login';

// MESSAGE types
const MESSAGE_TYPE_SUCCESS = "SUCCESS";
const MESSAGE_TYPE_ERROR = "ERROR";


if ($_SERVER['SERVER_NAME'] == 'localhost') {

    define('ROOT_DIRECTORY', 'http://localhost/suite-ledger-web/public');

    // database
    define('DBHOST', '');
    define('DBNAME', '');
    define('DBUSER', '');
    define('DBPASSWORD', '');
    define('DBDRIVER', 'mysql');

} else {

    define('ROOT_DIRECTORY', 'http://localhost/suite-ledger-web/public');

    define('DBHOST', '');
    define('DBNAME', '');
    define('DBUSER', '');
    define('DBPASSWORD', '');
    define('DBDRIVER', 'mysql');

}
