<?php

use ReCaptcha\RequestMethod;

require_once(__DIR__."/../../../lib/UserGroup.php");
require_once(__DIR__."/../../../config/Config.php");
$UserGroup = new UserGroup($loginInfo);


preg_match('|' . dirname($_SERVER["SCRIPT_NAME"]) . '/([\w%/]*)|', $_SERVER["REQUEST_URI"], $matches);
$paths = explode('/', $matches[1]);


$requestMethod=strtolower($_SERVER["REQUEST_METHOD"]);
$json = file_get_contents("php://input");

if ($RequestMethod === "put"){

}