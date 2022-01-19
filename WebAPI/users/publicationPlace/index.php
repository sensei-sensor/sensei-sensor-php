<?php

use ReCaptcha\RequestMethod;

require_once(__DIR__ . "/../../../../config/Config.php");

$requestMethod=strtolower($_SERVER["REQUEST_METHOD"]);

if ($requestMethod === "get") {
    require(__DIR__ . "/getViewPlace.php");
} elseif ($requestMethod ==="put") {
    require(__DIR__ . "/changePubPlace.php");
}