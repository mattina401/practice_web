
<?php
session_start();
include "../include/db.php";
if (isset($_GET['newListName'])) {
    $newListName = $_GET['newListName'];
    $userId = $_SESSION['userId'];

    $query = "INSERT INTO list (listName, userId) VALUES ('$newListName','$userId')";
    $result = $dbhandle->query($query) or die($dbhandle->error . __LINE__);

    $result = $dbhandle->affected_rows;

    echo $json_response = json_encode($result);
}
?>

