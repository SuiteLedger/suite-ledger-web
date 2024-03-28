<?php

spl_autoload_register(function ($className) {
    require "../app/models/" . $className . ".php";
});

require 'config.php';
require 'Authentication.php';
require 'functions.php';
require 'database.php';
require 'Model.php';
require 'app.php';
require 'controller.php';
