<?php

require_once(__DIR__ . "/../../../config/Config.php");

use ReCaptcha\RequestMethod;

header("Content-Type: application/json; charset=utf-8");


preg_match('|' . dirname($_SERVER["SCRIPT_NAME"]) . '/([\w%/]*)|', $_SERVER["REQUEST_URI"], $matches);
$paths = explode('/', $matches[1]);


$requestMethod = strtolower($_SERVER["REQUEST_METHOD"]);

if ($requestMethod === "options") {
    exit();
} elseif ($requestMethod === "get") {
    require "./getGroupList.php";
} elseif ($requestMethod == "post") {
    require "./addGroup.php";
}
