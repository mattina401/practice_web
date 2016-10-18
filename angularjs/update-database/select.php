<?php
/**
 * Created by PhpStorm.
 * User: kim
 * Date: 2016-10-12
 * Time: 오후 3:57
 */
include "connectdb.php";


$query ="SELECT * FROM student";
$rs=$dbhandle->query($query);

while($row=$rs->fetch_assoc()){
$data[]=$row;
}
print json_encode($data);

?>