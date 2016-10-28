<?php
session_start();
include "./db.php";

if (isset($_GET['email'])) {
    $email = $_GET['email'];
    $encodedPass = sha1('1111');


    $query = "INSERT INTO user(email,password)  VALUES ('$email','$encodedPass')";
    $result = $dbhandle->query($query) or die($dbhandle->error . __LINE__);

    $result = $dbhandle->affected_rows;

    echo $json_response = json_encode($result);
}
?>