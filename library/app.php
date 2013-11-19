<?php

if (class_exists("Theme\Theme")) {
    die("Theme already loaded.");
}

define("APP_DIR", __DIR__ . "/Theme");

require(APP_DIR . "/Theme.php");

$client = new Theme\Theme();