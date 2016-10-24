<?php
/**
 * Created by PhpStorm.
 * User: kim
 * Date: 2016-10-22
 * Time: 오전 3:13
 */

include("dbconnect.php");

$data = json_decode(file_get_contents("php://input"));
$username = $db->real_escape_string($data->username);
$password = $db->real_escape_string($data->password);


$query = "INSERT INTO user (uid, password) VALUES ('" . $username . "', '" . $password . "')";

$db->query($query) or die($mysqli->error . __LINE__);

$result = $mysqli->affected_rows;

echo json_encode($username);


?>