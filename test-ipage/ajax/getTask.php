<?php
session_start();
include "../include/db.php";
$status = '%';
if (isset($_GET['status'])) {
    $status = $_GET['status'];
}

$listId = $_SESSION['listId'];

$query = "select itemId, itemName, status, updatedTime from item where listId= '$listId' AND status like '$status' order by status,itemId desc";
$result = $dbhandle->query($query) or die($dbhandle->error . __LINE__);

$arr = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $arr[] = $row;
    }
}

# JSON-encode the response
echo $json_response = json_encode($arr);
?>