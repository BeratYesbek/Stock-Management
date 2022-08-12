<?php
require_once("ApiConfig.php");
require_once("Service/AuthManager.php");

$inputJSON = file_get_contents('php://input');
$input = json_decode($inputJSON, TRUE); //convert JSON

$username = $input["username"];
$password = $input["password"];
$authManager = new AuthManager();
$result = $authManager->login($username,$password);
if ($result->success)
{
    http_response_code(200);
    echo json_encode($result);
    return;
}
http_response_code(400);
echo json_encode($result);
return;

?>