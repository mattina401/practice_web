<?php
/**
 * Created by PhpStorm.
 * User: kim
 * Date: 2016-10-12
 * Time: 오후 4:06
 */

include "connectdb.php";

$data=json_decode(file_get_contents("php://input"));
$id = $data->id;



$query ="DELETE FROM student WHERE studid=".$id;

$dbhandle -> query($query);

?>