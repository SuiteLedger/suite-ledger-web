<?php

spl_autoload_register(function ($className) {
    require "../app/models/" . $className . ".php";
});

require 'configx.php';
require 'Authentication.php';
require 'functions.php';
require 'data-functions.php';
require 'ui-functions.php';
require 'database.php';
require 'Model.php';
require 'app.php';
require 'controller.php';
