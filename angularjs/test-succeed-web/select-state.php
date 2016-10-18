<?php
/**
 * Created by PhpStorm.
 * User: kim
 * Date: 2016-10-14
 * Time: 오전 12:12
 */

include "connectdb.php";


$query = "SELECT STATE_ABBREVIATION FROM states";
$rs = $dbhandle->query($query);

while ($row = $rs->fetch_assoc()) {
    $data[] = $row;
}
print json_encode($data);


?>