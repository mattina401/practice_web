<?php
/**
 * Created by PhpStorm.
 * User: kim
 * Date: 2016-10-14
 * Time: 오전 1:24
 */
include "connectdb.php";

if (isset($_GET['selectedItem'])) {
    $state = $_GET['selectedItem'];


    $query = "SELECT DISTINCT CITY_NAME FROM city WHERE CITY_STATE = '$state'";
    $rs = $dbhandle->query($query);

    while ($row = $rs->fetch_assoc()) {
        set_time_limit(0);
        $data[] = $row;
    }
    print json_encode($data);
}
?>