<?php

require_once(__DIR__ . "/../../../lib/JwtAuth.php");
require_once(__DIR__ . "/../../../lib/UserInfo.php");
$JWT = new JwtAuth($loginInfo);
$UserInfo = new UserInfo($loginInfo);
$userId = $JWT->auth();


if ($userId !== false) {
    $json = file_get_contents("php://input");
    $pubPlaceInfo = json_decode($json, true);
    $UserInfo->beginTransaction();

    foreach ($pubPlaceInfo["private"] as $config) {
        if (!$UserInfo->setPubPlaceCfg($userId, $config["roomId"], false)) {
            $UserInfo->rollBack();
            $UserInfo->Systemlog(__FILE__, ROLLBACK_Message);
            http_response_code(500);
            exit();
        }
    }
    foreach ($pubPlaceInfo["public"] as $config) {
        if (!$UserInfo->setPubPlaceCfg($userId, $config["roomId"], true)) {
            $UserInfo->rollBack();
            $UserInfo->Systemlog(__FILE__, ROLLBACK_Message);
            http_response_code(500);
            exit();
        }
    }
    $UserInfo->commit();
    http_response_code(200);
}
