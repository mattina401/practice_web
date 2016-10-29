<?php
session_start();
include "../include/db.php";

if (isset($_GET['signupEmail'])) {
    $signupEmail = $_GET['signupEmail'];
    $signupPassword = $_GET['signupPassword'];
    $encodedPass = sha1($signupPassword);


    $query = "INSERT INTO user(email,password)  VALUES ('$signupEmail','$encodedPass')";
    $result = $dbhandle->query($query) or die($dbhandle->error . __LINE__);

    $result = $dbhandle->affected_rows;

    echo $json_response = json_encode($result);
}
?>