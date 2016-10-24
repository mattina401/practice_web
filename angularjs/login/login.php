<?php

include("dbconnect.php");

$data = json_decode(file_get_contents("php://input"));
$username = $db->real_escape_string($data->username);
$password = $db->real_escape_string($data->password);


$query = "SELECT uid FROM user WHERE uid ='" . $username . "' AND password = '" . $password . "'";

$userInfo = $db->query($query) or die($mysqli->error . __LINE__);

$userInfo = $userInfo->fetch_all();

echo json_encode($userInfo);


